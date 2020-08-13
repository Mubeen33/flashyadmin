<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin_User extends Model
{
    protected $connection = 'mysql';
    protected $table = 'admin_users';
	
    protected $fillable = [
        'id', 'name', 'email', 'address', 'mobile', 'role_id', 'visibility', 'created_at', 'updated_at'
    ];
}