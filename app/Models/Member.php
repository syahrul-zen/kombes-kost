<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap',
        'alamat',
        'no_wa',
        'status',
        'foto',
        'email',
        'password',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
