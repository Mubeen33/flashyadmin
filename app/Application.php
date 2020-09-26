<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
    	'type',
    	'active_mood',
    	'live_at'
    ];
}
