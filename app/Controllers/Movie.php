<?php

namespace App\Controllers;

use App\Models\ShowingModel;
use App\Models\MovieModel;
use App\Models\PaymentModel;

class Movie extends BaseController
{
    public function post($movie)
    {
        echo view('templates/header');
        echo view('movie/post');
        echo view('templates/footer');
    }

    public function create()
    {
        helper('form');
        $model = new MovieModel();
        if (!$this->validate([
            'movieName' => 'required',
            'director' => 'required',
            'actors' => 'required',
            'genre' => 'required',
            'duration' => 'required',
            'premiereDate' => 'required',
            'language' => 'required',
            'image' => 'required'

        ])) {
            echo view('templates/header');
            echo view('movie/create');
            echo view('templates/footer');
        } else {
            $model->save([
                'movieName' => $this->request->getVar('movieName'),
                'director' =>  $this->request->getVar('director'),
                'actors' =>  $this->request->getVar('actors'),
                'genre' =>  $this->request->getVar('genre'),
                'duration' =>  $this->request->getVar('duration'),
                'premiereDate' =>  $this->request->getVar('premiereDate'),
                'language' => $this->request->getVar('language'),
                'image' => $this->request->getVar('image')
            ]);
            return redirect()->to('/');
        }
    }
    public function view($id = NULL)
    {
        $model = new MovieModel();
        $data['movie'] = $model->getMovie($id);
        echo view('templates/header', $data);
        echo view('pages/movie');
        echo view('templates/footer');
    }
    public function getDate($id = NULL, $date = NULL)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $showingModel = new ShowingModel();
        $datePlayed = date('Y-m-d', $date);
        $showTime = date('Y-m-d H:i:s', time());
        $data['showing'] = $showingModel->getShowing($id, $datePlayed, $showTime);
        echo view('ajax/getDate', $data);
    }
    public function booking($id = NULL)
    {
        if (!session()->has('isLoggedIn')) return redirect()->to('/account/login'); {
            $showingModel = new ShowingModel();
            $paymentModel = new PaymentModel();
            $data['showing'] = $showingModel->select('showing.id, showing.movieId, cinemaName, movieName, showtime, room')
                ->join('movie', 'movie.id = showing.movieId')
                ->join('cinema', 'cinema.id = showing.cinemaId')->where('showing.id', $id)->first();
            $data['bookedSeats'] = $paymentModel->getBookedSeats($id);
            if (date('Y-m-d H:i:s') >= $data['showing']['showtime']) return redirect()->to('/default/' . $data['showing']['movieId']);
            echo view('templates/header', $data);
            echo view('pages/booking');
            echo view('templates/footer');
        }
    }
    public function getSeats($id = NULL)
    {
        $showingModel = new ShowingModel(); //still missing join ppayment
        $data['showing'] = $showingModel->select('showing.id, price')->join('movie', 'movie.id = showing.movieId')->where('showing.id', $id)->first();
        $uri = $this->request->uri->getSegments();
        $data['seats'] = $uri;
        for ($i = 0; $i < 3; $i++) {
            array_shift($data['seats']);
        }
        echo view('ajax/getSeat', $data);
    }
    public function confirm()
    {
        if (!session()->has('isLoggedIn')) return redirect()->to('/account/login'); {
            $showId = session()->get('showId');
            $data['seats'] = session()->get('seats');
            $data['price'] = session()->get('price');

            if (!session()->has('isLoggedIn')) return redirect()->to('/account/login');
            if (!session()->has('seats') || !session()->has('price') || !session()->has('showId')) return redirect()->to('/');
            $showingModel = new ShowingModel();
            $data['showing'] = $showingModel->select('showing.id, cinemaName, movieName, showtime, room')
                ->join('movie', 'movie.id = showing.movieId')
                ->join('cinema', 'cinema.id = showing.cinemaId')->where('showing.id', $showId)->first();

            //if (session()->get('showId') != $data['showing']['id']) session()->remove($sessionData);
            echo view('templates/header', $data);
            echo view('pages/confirm');
            echo view('templates/footer');
        }
    }
}
