<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = [];
    public function articleType()
    {
        return $this->belongsTo('App\ArticleType');
    }

   
}