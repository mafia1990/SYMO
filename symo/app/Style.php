<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    public function styles()
    {
        return $this->belongsToMany(Style::class);
    }
}
