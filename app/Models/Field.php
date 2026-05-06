<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $fillable = ['name', 'price_per_hour', 'description', 'image'];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}