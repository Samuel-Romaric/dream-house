<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'room_number',
        'description',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'room_id');
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'room_id');
    }

    public function total_room()
    {
        return $this->count();
    }

    public function room_state()
    {
        if ($this->status == 0) {
            return "Libre";
        } else {
            return "Occupé";
        }
    }
}
