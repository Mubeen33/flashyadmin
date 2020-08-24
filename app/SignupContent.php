<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SignupContent extends Model
{
    protected $fillable = [
    	'heading',
    	'description',
    	'text_lines'
    ];
}
