<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_date',
        'end_date',
        'total_harga',
        'status_pembayaran',
        'status_booking',
        'member_id',
        'room_id',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
