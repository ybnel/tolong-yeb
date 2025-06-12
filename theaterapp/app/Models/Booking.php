<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'schedule_id',
        'booking_code',
        'total_price',
        'status',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function schedule(){
        return $this->belongsTo(Schedule::class);
    }

    public function seats(){
        return $this->belongsToMany(Seat::class, 'booking_seats')->withPivot('price_at_booking')->withTimestamps();
    }
}
