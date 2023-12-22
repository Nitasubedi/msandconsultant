<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $guarded = [];
    public function serviceType()
    {
        return $this->belongsTo('App\ServiceType');
    }
}
