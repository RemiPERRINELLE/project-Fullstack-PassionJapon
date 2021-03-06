<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ban', 'pseudo', 'avatar', 'name', 'firstname', 'sexe', 'email', 'password', 'adress', 'postal_code', 'city', 'country', 'phone',
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

    public function reactions() 
    { 
        return $this->hasMany(Reaction::class); 
    }

    public function media() 
    { 
        return $this->belongsToMany(Media::class); 
    }

    public function travels() 
    { 
        return $this->belongsToMany(Travel::class); 
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
