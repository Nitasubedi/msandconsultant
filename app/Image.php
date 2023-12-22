<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['image_path', 'caption'];

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }
}