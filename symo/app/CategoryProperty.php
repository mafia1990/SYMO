<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryProperty extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function categorypropertiesdata()
    {
        return $this->hasMany(CategoryPropertyData::class);
    }
}
