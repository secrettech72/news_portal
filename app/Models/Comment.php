<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = ['comments','users_id','news_id','status'];

    public function news(){
        return $this->belongsTo('App\Models\News','news_id');
    }
}
