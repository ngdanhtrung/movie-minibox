<?php

namespace App\Controllers;

use App\Models\AccountModel;
use App\Models\PaymentModel;


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
                'email' => 'required|valid_email',
                'password' => 'required|validateUser[email, password]',
            ];

            $errors = [
                'email' => [
                    'required' => 'Vui lòng nhập Email.',
                    'valid_email' => 'Email phải hợp lệ.'
                ],
                'password' => [
                    'validateUser' => 'Sai Email hoặc mật khẩu.',
                    'required' => 'Vui lòng nhập Mật khẩu.'
                ]
            ];


            if (!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            } else {
                $model = new AccountModel();

                $user = $model->where('email', $this->request->getVar('email'))->first();

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

            $errors = [
                'email' => [
                    'required' => 'Vui lòng nhập Email.',
                    'min_length' => 'Email phải có ít nhất {param} ký tự.',
                    'max_length' => 'Email chỉ tối đa {param} ký tự.',
                    'valid_email' => 'Email phải hợp lệ.',
                    'is_unique' => 'Email đã có người sử dụng.',
                ],
                'phoneNumber' => [
                    'required' => 'Vui lòng nhập Số điện thoại.',
                    'exact_length' => 'Số điện thoại phải có {param} số.',
                    'numeric' => 'Ký tự phải là số.'
                ],
                'username' => [
                    'required' => 'Vui lòng nhập Tên đăng nhập.',
                    'min_length' => 'Tên đăng nhập phải có ít nhất {param} ký tự.',
                    'max_length' => 'Tên đăng nhập chỉ tối đa {param} ký tự.',
                ],
                'password' => [
                    'required' => 'Vui lòng nhập Mật khẩu.',
                    'min_length' => 'Mật khẩu phải có ít nhất {param} ký tự.',
                    'max_length' => 'Mật khẩu chỉ tối đa {param} ký tự.',
                ],
                'password_confirm' => [
                    'matches' => 'Mật khẩu xác nhận không trùng khớp'
                ]
            ];


            if (!$this->validate($rules, $errors)) {
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
                $session->setFlashdata('success', 'Đăng ký thành công!');
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
    function user()
    {
        if (!session()->has('isLoggedIn')) {
            return redirect()->to('/account/login');
        } else {
            $accountModel = new AccountModel();
            $data['user'] = $accountModel->where('id', session()->get('id'))->first();
            echo view('templates/header', $data);
            echo view('pages/user');
            echo view('templates/footer');
        }
    }
    function update()
    {
        if (!session()->has('isLoggedIn')) {
            return redirect()->to('/account/login');
        } else {
            $accountModel = new AccountModel();
            helper(['form']);

            if ($this->request->getMethod() == 'post') {
                $rules = [
                    'phoneNumber' => 'required|exact_length[10]|numeric',
                    'username' => 'required|min_length[3]|max_length[20]',
                ];

                if ($this->request->getPost('password') != '') {
                    $rules['password'] = 'required|min_length[8]|max_length[50]';
                    $rules['password_confirm'] = 'matches[password]';
                }

                $errors = [
                    'email' => [
                        'required' => 'Vui lòng nhập Email.',
                        'min_length' => 'Email phải có ít nhất {param} ký tự.',
                        'max_length' => 'Email chỉ tối đa {param} ký tự.',
                        'valid_email' => 'Email phải hợp lệ.',
                        'is_unique' => 'Email đã có người sử dụng.',
                    ],
                    'phoneNumber' => [
                        'required' => 'Vui lòng nhập Số điện thoại.',
                        'exact_length' => 'Số điện thoại phải có {param} số.',
                        'numeric' => 'Ký tự phải là số.'
                    ],
                    'username' => [
                        'required' => 'Vui lòng nhập Tên đăng nhập.',
                        'min_length' => 'Tên đăng nhập phải có ít nhất {param} ký tự.',
                        'max_length' => 'Tên đăng nhập chỉ tối đa {param} ký tự.',
                    ],
                    'password' => [
                        'required' => 'Vui lòng nhập Mật khẩu.',
                        'min_length' => 'Mật khẩu phải có ít nhất {param} ký tự.',
                        'max_length' => 'Mật khẩu chỉ tối đa {param} ký tự.',
                    ],
                    'password_confirm' => [
                        'matches' => 'Mật khẩu xác nhận không trùng khớp'
                    ]
                ];


                if (!$this->validate($rules, $errors)) {
                    $data['validation'] = $this->validator;
                } else {
                    $model = new AccountModel();
                    $newData = [
                        'id' => session()->get('id'),
                        'username' => $this->request->getVar('username'),
                        'dob' => $this->request->getVar('dob'),
                        'phoneNumber' => $this->request->getVar('phoneNumber'),
                    ];
                    if ($this->request->getPost('password') != '') {
                        $newData['passwordHash'] = $this->request->getVar('password');
                    }
                    $model->save($newData);
                    $session = session();
                    $session->setFlashdata('success', 'Cập nhật thông tin thành công');
                    return redirect()->to('/account/user');
                }
            }
            $data['user'] = $accountModel->where('id', session()->get('id'))->first();
            echo view('templates/header', $data);
            echo view('pages/update');
            echo view('templates/footer');
        }
    }
    function history()
    {
        if (!session()->has('isLoggedIn')) {
            return redirect()->to('/account/login');
        } else {
            $model = new PaymentModel();
            $data['history'] = $model->getPaymentByUser(session()->get('id'));
            echo view('templates/header', $data);
            echo view('pages/history');
            echo view('templates/footer');
        }
    }
}
