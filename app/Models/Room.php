<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms';

    protected $fillable = [
        'nama',
        'tipe',
        'harga_per_3_bulan',
        'gambar_sampul',
        'gambar_2',
        'gambar_3',
        'deskripsi',
    ];

    public function booking()
    {
        return $this->hasMany(Booking::class);
    }
}
