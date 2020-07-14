<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = ['image'];

    public function ideas()
    {
        return $this->belongsToMany(Ideas::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
