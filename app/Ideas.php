<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ideas extends Model
{
    protected $fillable = ['title', 'description', 'image'];

    public function reactions() 
    { 
        return $this->hasMany(Reaction::class); 
    }

    public function articles()
    {
        return $this->belongsToMany(Articles::class);
    }

    public function media()
    {
        return $this->belongsToMany(Media::class);
    }
}
