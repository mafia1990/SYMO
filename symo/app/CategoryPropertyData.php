<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryPropertyData extends Model
{

    public function cloths()
    {
        return $this->belongsToMany(Cloth::class,'cloth_category_property_data');
    }
    public function categoryproperties()
    {
        return $this->belongsTo(CategoryProperty::class);
    }
}
