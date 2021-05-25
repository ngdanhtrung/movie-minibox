<?php

namespace App\Controllers;

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
}
