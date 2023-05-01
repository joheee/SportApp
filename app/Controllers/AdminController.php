<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AdminController extends BaseController
{
    public function index(){
        return view('admin/dashboard');   
    }
    public function transaction(){
        return view('admin/transaction');
    }
}
