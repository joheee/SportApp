<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table            = 'products';
    protected $primaryKey = 'product_id';
    protected $allowedFields    = ['name','image','price','ammount'];

    public function transaction()
    {
        return $this->hasMany(TransactionModel::class);
    }

    public function getAllProduct(){
        return $this->findAll();
    }

    public function handleInsert($name,$image,$price,$ammount) {
        $data = [
            'name' => $name,
            'image' => $image,
            'price' => $price,
            'ammount' => $ammount
        ];
        $this->insert($data);
        return true;
    }
}
