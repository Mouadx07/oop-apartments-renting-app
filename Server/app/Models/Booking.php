<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'starts',
        'ends',
        'user_id',
        'apartment_id',
        'nights',
        
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function apartment(){
        return $this->belongsTo(Apartment::class);
    }
    public function payment(){
        return $this->hasOne(Payment::class);
    }
}
