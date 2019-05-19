<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pointable extends Model
{
    public function points()
    {
        return $this->morphToMany(Point::class,'pointable');
    }

    public function users()
    {
        return $this->morphToMany(User::class,'pointable');
    }

    public function sets()
    {
        return $this->morphToMany(Set::class, 'pointable');
    }
}
