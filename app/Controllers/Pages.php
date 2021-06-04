<?php

namespace App\Controllers;

use App\Models\MovieModel;

class Pages extends BaseController
{
    public function index()
    {
        $movieModel = new MovieModel();
        $data = [];
        $data['movieNowShowing'] = $movieModel->getNowShowing();
        $data['movieComingSoon'] = $movieModel->getComingSoon();
        echo view('templates/header', $data);
        echo view('pages/home');
        echo view('templates/footer');
    }

    function showme($page = 'home')
    {

        if (!is_file(APPPATH . '/Views/pages/' . $page . '.php')) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }
        $movieModel = new MovieModel();
        $data['movieNowShowing'] = $movieModel->getNowShowing();
        $data['movieComingSoon'] = $movieModel->getComingSoon();
        echo view('templates/header', $data);
        echo view('pages/' . $page);
        echo view('templates/footer');
    }
    function handleAjax()
    {
        if ($_POST['action'] == 'call_this') {
            session()->set('valid', 1);
        }
    }
}
