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

        if ($model->handleLogin($email, $password) !== null) {
            $user = $model->handleLogin($email, $password);
            if($user == 'customer') return redirect()->route('customer.dashboard');
            return redirect()->route('admin.dashboard');
        }
        return redirect()->back()->with('error', 'Invalid credentials!');
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
            return redirect()->to(route_to('customer.dashboard'));
        } else {
            $getError = $this->validator;
            $errors = $getError->getErrors();
            return redirect()->back()->with('error', reset($errors));
        }
    }

    public function handleLogout() {
        $model = new UserModel();
        $model->handleLogout();
        return redirect()->route('guest.login');
    }   
}