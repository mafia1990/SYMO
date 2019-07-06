<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    public function users()
    {
       return $this->belongsToMany(User::class);
    }

    public function clothes()
    {
        return $this->hasMany(Cloth::class);
    }

    public function getPhotoAttribute($value)
    {
        if($value)
        return '/images/shops/'.$value;
        return $value;
    }
}
