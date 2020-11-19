<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Popup extends Model
{
    protected $fillable = [
    	'name',
    	'title',
    	'description',
    	'button_text',
    	'button_background',
    	'button_text_color',
    	'button_link',
    	'popup_background_image',
    	'start_time',
    	'end_time',
    	'url_list'
    ];
}
