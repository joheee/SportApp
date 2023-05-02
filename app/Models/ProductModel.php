<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table            = 'products';
    protected $allowedFields    = ['name','image','price','ammount'];

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
        var_dump($data);
        $this->insert($data);
        return true;
    }
}