<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Seat extends Model
{
    use HasFactory;
    protected $fillable=['studio_id', 'seat_row', 'seat_number'];

    public function studio(): BelongsTo
    {
        return $this->belongsTo(Studio::class);
    }

    public function bookings(): BelongsToMany
    {
        // Pastikan Anda mengimpor BelongsToMany di atas
        return $this->belongsToMany(Booking::class, 'booking_seats')
                    ->withTimestamps() 
                    ->withPivot('price_at_booking');
    }
}