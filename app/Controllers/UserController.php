<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
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
}