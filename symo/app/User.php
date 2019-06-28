<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

/**
 * Post
 *
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','gender','address','status','phone','mobile','avatar','id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function  roles()
    {
        return $this->belongsToMany(Role::class);
    }
    public function  sets()
    {
        return $this->hasMany(Set::class);
    }
    /*adding image path */
    function getAvatarAttribute($value){
        if($value!=""){

            if($this->attributes['type']==2)
                return '/images/users/operators/'.$value;
            if($this->attributes['type']==3)
                return '/images/users/designers/'.$value;
            if($this->attributes['type']==4)
                return '/images/users/'.$value;
            if($this->attributes['type']==5)
                return '/images/users/selers/'.$value;

                return '/images/users/'.$value;
        }
        else return $value;
    }
}
