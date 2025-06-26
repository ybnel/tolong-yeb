<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail; // <-- Pastikan ini tidak di-komen
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail // <-- Pastikan ini
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        // 'phone', 'date_of_birth', 'gender', // Jika nanti ditambahkan
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at'=>'datetime', 
        'password' =>'hashed'
    ];

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function bookings(){
        return $this->hasMany(Booking::class);
    }
}