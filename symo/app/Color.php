<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    public function cloths()
    {
        return $this->belongsToMany(Cloth::class);
    }

    public function getCodeAttribute($value)
    {
        return '#'.$value;
    }
}
