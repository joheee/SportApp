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
            $session = session();
            $session->set([
                'logged_user' => $user,
            ]);
            return true;
        } else {
            return false;
        }
    }

    public function handleRegister($name,$email,$password) {
        if(empty($name) && empty($email) && empty($password)) return false;
        
        $data = [
            'name' => $name,
            'email' => $email,
            'password' => $password
        ];

        $user = $this->insert($data);
        $session = session();
        $session->set([
            'logged_user' => $user
        ]);
        return true;
    }

    public function handleLogout() {
        $session = session();
        $session->remove('logged_user');
    }
}
