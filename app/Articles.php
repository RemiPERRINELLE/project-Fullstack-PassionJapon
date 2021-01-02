<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $fillable = ['title', 'introduction', 'description', 'conclusion', 'image'];

    public function ideas()
    {
        return $this->belongsToMany(Ideas::class);
    }
}
