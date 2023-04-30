<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $allowedFields    = ['name','email','password'];

    public function handleLogin($email,$password) {
        $user = $this->where('email', $email)->first();

        if ($user && $password == $user['password']) {
            return true;
        } else {
            return false;
        }
    }
}
