<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cloth extends Model
{


    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class);
    }

    public function category_property_data()
    {
        return $this->belongsToMany(CategoryPropertyData::class,'cloth_category_property_data','cloth_id','category_property_data_id');
    }
    public function sets()
    {
        return $this->belongsToMany(Set::class);
    }
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
