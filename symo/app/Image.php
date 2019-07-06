<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

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
    public function delete()
    {
        if(file_exists(@public_path().'/images/clothes/'.$this->attributes['path'])){
            unlink(@public_path().'/images/clothes/'.$this->attributes['path']);
        }

        parent::delete();
    }
}
