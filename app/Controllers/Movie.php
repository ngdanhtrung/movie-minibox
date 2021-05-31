<?php

namespace App\Controllers;

use App\Models\ShowingModel;
use App\Models\MovieModel;

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
        $showingModel = new ShowingModel();
        $datePlayed = date('Y-m-d', $date);
        $data['showing'] = $showingModel->getShowing($id, $datePlayed);
        echo view('ajax/getDate', $data);
    }
    public function booking($id = NULL)
    {
        $showingModel = new ShowingModel();
        $data['showing'] = $showingModel->where('id', $id)->first();
        echo view('templates/header', $data);
        echo view('pages/booking');
        echo view('templates/footer');
    }
    public function getSeats($id = NULL, $s1 = NULL, $s2 = NULL, $s3 = NULL, $s4 = NULL, $s5 = NULL, $s6 = NULL, $s7 = NULL, $s8 = NULL)
    {
        $showingModel = new ShowingModel(); //still missing join ppayment
        $data['showing'] = $showingModel->where('id', $id)->first();
        $data['seats'] = [];
        for ($i = 1; $i <= 8; $i++) {
            $varName = 's' . $i;
            if (!is_null(${$varName})) array_push($data['seats'], ${$varName});
        }
        echo view('ajax/getSeat', $data);
    }
}
