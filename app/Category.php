<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = ['title', 'image'];

    public function travels()
    {
        return $this->hasMany(Travel::class);
    }
}
