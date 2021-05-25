<?php

namespace App\Controllers;

use App\Models\MovieModel;

class Pages extends BaseController
{
    public function index()
    {
        $movieModel = new MovieModel();
        $data['movie'] = $movieModel->getPosts();

        echo view('templates/header');
        echo view('pages/home', $data);
        echo view('templates/footer');
    }

    function showme($page = 'home')
    {

        if (!is_file(APPPATH . '/Views/pages/' . $page . '.php')) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }

        echo view('templates/header');
        echo view('pages/' . $page);
        echo view('templates/footer');
    }
}
