<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Categories extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'id', 'parent_id', 'name', 'slug', 'title_meta_tag', 'description', 'keywords', 'category_order', 'homepage_order', 'commission', 'visibility', 'show_on_homepage', 'show_image_nav', 'image', 'created_at', 'updated_at']
    ;
}