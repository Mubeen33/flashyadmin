<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Images extends Model
{
    protected $table = 'images';
    protected $fillable = [
        'id', 'language', 'title', 'description','link', 'order', 'botton_text', 'text_color', 'botton_color', 'botton_text_color', 'animation_title', 'animation_description', 'animation_button', 'desktop_image', 'mobile_image', 'visibility', 'created_at', 'updated_at', 'user_id']
    ;
}