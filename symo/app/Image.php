<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function cloth()
    {
        return $this->belongsTo(Cloth::claa );
    }

    public function getPathAttribute($value)
    {
        if($value!="")
            return '/images/clothes/'.$value;
        else return $value;
    }
}
