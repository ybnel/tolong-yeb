<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable=['film_id', 'studio_id', 'show_time', 'price'];

    public function film(){
        return $this->belongsTo(Film::class);
    }

    public function studio(){
        return $this->belongsTo(Studio::class);
    }

    public function bookings(){
        return $this->hasMany(Booking::class);
    }
}
