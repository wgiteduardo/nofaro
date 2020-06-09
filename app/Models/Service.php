<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function pet()
    {
        return $this->belongsTo('App\Models\Pet');
    }
}
