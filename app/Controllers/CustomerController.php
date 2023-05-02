<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;

class CustomerController extends BaseController
{
    public function index(){
        $model = new ProductModel();
        $data['products'] = $model->findAll();
        return view('customer/dashboard', $data);   
    }
}
