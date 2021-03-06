<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailTemplate extends Model
{
    protected $fillable =[
    	'subject_line',
        'about_template',
        'template',
    	'top_banner',
    	'text_line_one',
    	'button_text',
    	'button_link',
    	'text_line_two',
    	'facebook_url',
    	'twitter_url',
    	'linkedin_url',
    	'pinterest_url',
    	'youtube_url',
        'instagram_url',
    	'footer_banner',
    	'footer_text'
    ];
}
