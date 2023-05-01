<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
    protected $validation;
    protected $userModel;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
    }

    public function handleLogin() {
        $data = [];
        $model = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        if ($model->handleLogin($email, $password)) {
            echo view('auth/register');
        } else {
            $data['error'] = 'Invalid credentials!';
        }
        echo view('auth/login', $data);
    }

    public function handleRegister() {
        $data = [];
        $model = new UserModel();

        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
                
        $this->validation->setRules(
            [
                'name' => 'required|min_length[5]|max_length[50]',
                'email' => 'required|valid_email',
                'password' => 'required|min_length[4]'
            ]
        );

        if ($this->validation->withRequest($this->request)->run()) {
            $model->handleRegister($name, $email, $password);
            echo view('auth/register');
            return;
        }
        $data['errors'] = $this->validation->getErrors();
        echo view('auth/register', $data);
    }

    public function handleLogout() {
        $model = new UserModel();
        $model->handleLogout();
        echo view('auth/login');
    }   
}