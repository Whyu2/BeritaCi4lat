<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table = 'tbl_user';
    protected $useTimestamps = true;
    protected $allowedFields = ['name', 'email', 'password', 'level', 'status'];

    public function login($email, $password)
    {
        return $this->db->table('tbl_user')->where([
            'email' => $email,
            'password' => $password
        ])->get()->getRowArray();
    }
}
