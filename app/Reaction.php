<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    protected $fillable = ['comment', 'note', 'user_id', 'idea_id', 'travel_id'];

    public function user()
    { 
        return $this->belongsTo(User::class); 
    }
    public function idea()
    { 
        return $this->belongsTo(Ideas::class); 
    }
    public function travel()
    { 
        return $this->belongsTo(Travel::class); 
    }
}
