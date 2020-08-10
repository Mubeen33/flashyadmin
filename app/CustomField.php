<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomField extends Model
{
    protected $connection = 'mysql';
    protected $table = 'custom_fields';
	
    protected $fillable = [
        'category_id', 'sub_category_1', 'sub_category_2', 'name_eng', 'name_dus', 'field_width', 'required', 'field_order', 'field_type', 'create_at', 'updated_at', 'status', 'user_id'
    ];
}