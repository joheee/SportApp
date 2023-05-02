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
            return redirect()->to(route_to('guest.register'));
        } else {
            $data['error'] = 'Invalid credentials!';
        }
        echo view('auth/login', $data);
    }

    public function handleRegister() {
        $model = new UserModel();
        $rules = [
            'name' => 'required|min_length[4]|max_length[50]',
            'email' => 'required|valid_email',
            'password' => 'required|min_length[4]'
        ];

        if($this->validate($rules)){
            $name = $this->request->getPost('name');
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $model->handleRegister($name, $email, $password);
            echo view('auth/register');
        } else {
            $getError = $this->validator;
            $errors = $getError->getErrors();
            $data['error'] = reset($errors);
    
            echo view('auth/register', $data);
        }
    }

    public function handleLogout() {
        $model = new UserModel();
        $model->handleLogout();
        return redirect()->route('guest.login');
    }   
}