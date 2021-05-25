<?php

namespace App\Controllers;

class User extends BaseController
{
    public function post()
    {
        echo view('templates/header');
        echo view('user/signup');
        echo view('templates/footer');
    }
}
