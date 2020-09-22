<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomField extends Model
{
	protected $fillable = [
		'category_id',
		'options',
		'active'
	];
	public function get_category(){
		return $this->belongsTo('App\Category', 'category_id','id');
	}
}
