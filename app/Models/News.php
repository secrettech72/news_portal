<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $fillable = ['title','description','categories_id','news_images','is_featured','status'];

    public function category(){
        return $this->belongsTo('App\Models\Category','categories_id');
    }
}
