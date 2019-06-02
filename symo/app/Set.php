<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Set extends Model
{
    public function seasons()
    {
        return $this->belongsToMany(Season::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cloths()
    {
        return $this->belongsToMany(Cloth::class);
    }
    public function styles()
    {
        return $this->belongsToMany(Style::class);
    }
    public function point()
    {
        return $this->hasMany(Point::class);
    }
}
