<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    
    protected $fillable = ['date_start', 'date_end', 'stock', 'price', 'description', 'date_closure', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reactions() 
    { 
        return $this->hasMany(Reaction::class); 
    }

    public function users() 
    { 
        return $this->belongsToMany(User::class); 
    }
}
