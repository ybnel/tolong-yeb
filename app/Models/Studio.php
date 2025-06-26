<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
    use HasFactory;
    protected $fillable=['name', 'total_seats'];

    public function seats(){
        return $this->hasMany(Seat::class);
    }

    public function schedules(){
        return $this->hasMany(Schedule::class);
    }
}
