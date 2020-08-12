<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Images extends Model
{
    protected $table = 'images';
    protected $fillable = [
        'id', 'language', 'title', 'description','link', 'order', 'botton_text', 'text_color', 'botton_color', 'botton_text_color', 'animation_title', 'animation_description', 'animation_button', 'desktop_image','desktop_source','mobile_image','mobile_source','visibility', 'created_at', 'updated_at', 'user_id']
    ;
}