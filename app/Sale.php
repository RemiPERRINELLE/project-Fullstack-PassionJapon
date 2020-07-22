<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['numberPlaces', 'travel_id', 'user_id'];

    public function travel()
    {
        return $this->belongsTo(Travel::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
