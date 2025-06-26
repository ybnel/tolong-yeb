<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;
    protected $fillable=['studio_id', 'seat_row', 'seat_number'];

    public function studio(){
        return $this->belongsTo(Studio::class);
    }

    public function bookings(){
        return $this->belongsToMany(Booking::class, 'booking_seats');
    }
}
