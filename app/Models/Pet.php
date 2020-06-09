<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    public function services()
    {
        return $this->hasMany('App\Models\Service');
    }
}
