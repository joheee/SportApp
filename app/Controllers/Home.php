<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(){
        $session = session();
        if($session->get('logged_user') !== null) {
            $user = $session->get('logged_user');
            if($user['role'] == 'customer') return redirect()->route('customer.dashboard');
            return redirect()->route('admin.dashboard');
        }
        return view('auth/login');
    }
    public function register() {
        $session = session();
        if($session->get('logged_user') !== null) {
            $user = $session->get('logged_user');
            if($user['role'] == 'customer') return redirect()->route('customer.dashboard');
            return redirect()->route('admin.dashboard');
        }
        return view('auth/register');
    }
}
