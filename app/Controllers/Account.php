<?php

namespace App\Controllers;

use App\Models\AccountModel;

class Account extends BaseController
{
    public function index()
    {
        echo "<h1>Account Pages</h1>";
    }
    function login()
    {
        $data = [];
        helper(['form']);

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'username' => 'required|min_length[3]|max_length[20]',
                'password' => 'required|min_length[8]|max_length[50]|validateUser[username, password]',
            ];

            $errors = [
                'password' => [
                    'validateUser' => 'Username or Password doesn\'t match'
                ]
            ];


            if (!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            } else {
                $model = new AccountModel();

                $user = $model->where('username', $this->request->getVar('username'))->first();

                $this->setUserSession($user);

                return redirect()->to('/');
            }
        }

        echo view('templates/header', $data);
        echo view('pages/login');
        echo view('templates/footer');
    }

    private function setUserSession($user)
    {
        $data = [
            'id' => $user['id'],
            'username' => $user['username'],
            'email' => $user['email'],
            'isLoggedIn' => true,
        ];

        session()->set($data);
        return true;
    }

    function register()
    {
        $data = [];
        helper(['form']);
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[user.email]',
                'phoneNumber' => 'required|exact_length[10]|numeric',
                'username' => 'required|min_length[3]|max_length[20]',
                'password' => 'required|min_length[8]|max_length[50]',
                'password_confirm' => 'matches[password]',
            ];


            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $model = new AccountModel();

                $newData = [
                    'username' => $this->request->getVar('username'),
                    'passwordHash' => $this->request->getVar('password'),
                    'email' => $this->request->getVar('email'),
                    'dob' => $this->request->getVar('dob'),
                    'phoneNumber' => $this->request->getVar('phoneNumber'),
                ];
                $model->save($newData);
                $session = session();
                $session->setFlashdata('success', 'Successful Registration');
                return redirect()->to('/account/login');
            }
        }

        echo view('templates/header', $data);
        echo view('pages/register');
        echo view('templates/footer');
    }
    function logout()
    {
        $sessionData = [
            'id',
            'username',
            'email',
            'isLoggedIn',
        ];
        session()->remove($sessionData);
        return redirect()->to(base_url());
    }
}
