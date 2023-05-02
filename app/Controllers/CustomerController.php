<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;

class CustomerController extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    
    public function index(){
        $model = new ProductModel();
        $data['products'] = $model->findAll();
        return view('customer/dashboard', $data);   
    }
    public function transaction(){
        $builder = $this->db->table('transactions t')->select("*");
        $builder->select('p.name, p.price, t.ammount, t.transaction_date');
        $builder->join('users u', 't.user_id = u.user_id');
        $builder->join('products p', 'p.product_id = t.product_id');
        $builder->where('u.user_id', 4);
        $builder->orderBy('t.transaction_date', 'DESC');
        $data['transactions'] = $builder->get()->getResult();

        return view('customer/transaction', $data);
    }
}
