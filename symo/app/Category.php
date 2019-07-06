<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{


    public function cloths()
    {
        return $this->belongsToMany('App\Cloth');
    }

    public function getImageAttribute($value)
    {
        if($value!="")
            return '/images/cats/'.$value;
        else return $value;
    }
    public function categoryproperties()
    {
        return $this->hasMany(CategoryProperty::class);
    }

}
