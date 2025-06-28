<?php

namespace App\Models;

use CodeIgniter\Model;

class Login_model extends Model
{
    
    protected $table = "user";
    protected $primaryKey = "username";
    protected $returnType = "object";
    protected $useTimestamps = false;
    protected $allowedFields = ['username', 'password', 'id_user', 'jabatan', 'nama', 'reset_token', 'token_expiry'];
}