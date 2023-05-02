<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
    protected $table = 'transactions';
    protected $primaryKey = 'transaction_id';
    protected $allowedFields = ['user_id', 'product_id', 'amount', 'transaction_date'];

    protected $useTimestamps = false;

    public function user()
    {
        return $this->belongsTo(UserModel::class);
    }

    public function product()
    {
        return $this->belongsTo(ProductModel::class);
    }
}
