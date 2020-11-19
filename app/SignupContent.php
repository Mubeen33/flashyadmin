<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SignupContent extends Model
{
    protected $fillable = [
    	'heading',
    	'description',
    	'text_line_one',
    	'text_line_two',
    	'text_line_three',
    	'text_line_one_icon',
    	'text_line_two_icon',
    	'text_line_three_icon',
        'banner'
    ];
}
