<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomField extends Model
{
    protected $connection = 'mysql';
    protected $table = 'custom_fields';
	

    protected $fillable = [
        'id', 'parent_id', 'child2_id', 'child3_id', 'name1', 'name2', 'row_width', 'is_required', 'status', 'field_order', 'field_type'
    ];

   
}