<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    public function sets()
    {
        return $this->belongsTo(Set::class);
    }
}
