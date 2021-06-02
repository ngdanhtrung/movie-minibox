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
        if (!session()->has('isLoggedIn')) return redirect()->to('/account/login');
        $showingModel = new ShowingModel();
        $paymentModel = new PaymentModel();
        $data['showing'] = $showingModel->select('showing.id, cinemaName, movieName, showtime, room')
            ->join('movie', 'movie.id = showing.movieId')
            ->join('cinema', 'cinema.id = showing.cinemaId')->where('showing.id', $id)->first();
        $data['bookedSeats'] = $paymentModel->getBookedSeats($id);
        echo view('templates/header', $data);
        echo view('pages/booking');
        echo view('templates/footer');
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
    public function confirm($id = NULL, $price = NULL)
    {
        $uri = $this->request->uri->getSegments();
        $data['chosenSeats'] = $uri;
        $data['price'] = $price;
        $showingModel = new ShowingModel();
        $data['showing'] = $showingModel->select('showing.id, cinemaName, movieName, showtime, room')
            ->join('movie', 'movie.id = showing.movieId')
            ->join('cinema', 'cinema.id = showing.cinemaId')->where('showing.id', $id)->first();

        for ($i = 0; $i < 5; $i++) {
            array_shift($data['chosenSeats']);
        }


        echo view('templates/header', $data);
        echo view('pages/confirm');
        echo view('templates/footer');
    }
}
