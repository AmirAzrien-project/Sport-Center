<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $primaryKey = 'user_id';

    protected $fillable =
     ['name', 'email', 'court', 'date', 'approval', 'start_booking_time', 'end_booking_time', 'user_id' ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sportsCenter()
    {
        return $this->belongsTo(SportsCenter::class);
    }

    public function bookings()
    {
        return $this->belongsTo(Booking::class);
    }

    public function sports()
    {
        return $this->belongsTo(Sport::class);
    }
}
