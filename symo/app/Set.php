<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Set extends Model
{
    public function seasons()
    {
        return $this->belongsToMany(Season::class);
    }
}
