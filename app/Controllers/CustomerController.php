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
        $data['products'] = $model->where('ammount > ', 0)->findAll();
        return view('customer/dashboard', $data);   
    }
    public function transaction(){
        $builder = $this->db->table('transactions t');
        $builder->select('p.name, p.price, t.ammount, t.transaction_date');
        $builder->join('users u', 't.user_id = u.user_id');
        $builder->join('products p', 'p.product_id = t.product_id');
        $builder->where('u.user_id', session()->get('logged_user')['user_id']);
        $builder->orderBy('t.transaction_date', 'DESC');
        $data['transactions'] = $builder->get()->getResult();

        $totalPrice = $this->db->table('transactions t')
            ->select('sum(p.price * t.ammount) as total')
            ->join('users u', 't.user_id = u.user_id')
            ->join('products p', 'p.product_id = t.product_id')
            ->where('u.user_id', session()->get('logged_user')['user_id'])
            ->get()->getResult();
        $data['total'] = $totalPrice;
        return view('customer/transaction', $data);
    }
    public function handleTransaction($product_id) {
        $user_id = session()->get('logged_user')['user_id'];
        $findTransaction = $this->db->table('transactions')->select("*")->where('user_id',$user_id)->where('product_id', $product_id)->get()->getFirstRow();
        if($findTransaction === null) {
            $query = "INSERT INTO `transactions` (`transaction_id`, `user_id`, `product_id`, `ammount`, `transaction_date`) VALUES (NULL, ?, ?, '1', current_timestamp());";
            $params = [$user_id, $product_id];
            $this->db->query($query, $params);
        } else {
            $query = "UPDATE `transactions` SET `ammount` = ammount + 1 WHERE user_id = ? and product_id = ?";
            $params = [$user_id, $product_id];
            $this->db->query($query, $params);
        }
        $query = "UPDATE `products` SET `ammount` = ammount - 1 WHERE product_id = ?";
        $params = [$product_id];
        $this->db->query($query, $params);

        return redirect()->back();
    }
}
