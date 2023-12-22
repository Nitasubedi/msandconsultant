<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MediaTypes extends Model
{
    public function media()
    {
        return $this->hasMany('App\Media', 'media_type_id');
    }
}
