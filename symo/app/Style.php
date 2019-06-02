<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    public function sets()
    {
        return $this->belongsToMany(Set::class);
    }
}
