<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class Film extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'description',
        'duration_minutes',
        'release_date',
        'genre',
        'poster_image_url', 
    ];

    public function schedules(){
        return $this->hasMany(Schedule::class);
    }
}
