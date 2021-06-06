<?php

namespace App\Controllers;

use App\Models\CinemaModel;

class Cinema extends BaseController
{
    public function cinemas()
    {
        $cinemaModel = new CinemaModel();
        $data['cinemas'] = $cinemaModel->getCinemas();
        echo view('templates/header', $data);
        echo view('pages/cinemas');
        echo view('templates/footer');
    }
}
