<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Apartment extends Model
{
    use HasFactory;
    protected $fillable = [
        'address',
        'image',
        'rooms',
        'price',
        'user_id',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function bookings(){
        return $this->hasMany(Booking::class);
    }

}
