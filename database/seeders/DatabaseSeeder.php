<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // \App\Models\Member::create(['name' => 'Alice']);
        // \App\Models\Member::create(['name' => 'Bob']);

        // \App\Models\Room::create(['nama' => 'Room A', 'tipe' => 'A', 'harga_per_3_bulan' => 100000]);
        // \App\Models\Room::create(['nama' => 'Room B', 'tipe' => 'B', 'harga_per_3_bulan' => 200000]);

        // \App\Models\Booking::create([
        //     'start_date' => '2025-10-01',
        //     'end_date' => '2025-11-01',
        //     'member_id' => 1,
        //     'room_id' => 1,
        // ]);

        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'no_wa' => '082387120434',
        ]);

        // ==========================================

        \App\Models\Room::create([
            'nama' => 'Kamar 1',
            'tipe' => 'A',
            'harga_per_3_bulan' => 3000000,
            'gambar_sampul' => 'gambar_1.jpeg',
            'deskripsi' => 'Aman dan Nyaman'
        ]);

        \App\Models\Room::create([
            'nama' => 'Kamar 2',
            'tipe' => 'A',
            'harga_per_3_bulan' => 3000000,
            'gambar_sampul' => 'gambar_2.jpeg',
            'deskripsi' => 'Aman dan Nyaman'
        ]);

        \App\Models\Room::create([
            'nama' => 'Kamar 3',
            'tipe' => 'B',
            'harga_per_3_bulan' => 6000000,
            'gambar_sampul' => 'gambar_3.jpeg',
            'deskripsi' => 'Aman dan Nyaman'
        ]);

        \App\Models\Room::create([
            'nama' => 'Kamar 4',
            'tipe' => 'B',
            'harga_per_3_bulan' => 6000000,
            'gambar_sampul' => 'gambar_4.jpeg',
            'deskripsi' => 'Aman dan Nyaman'
        ]);

        \App\Models\Room::create([
            'nama' => 'Kamar 5',
            'tipe' => 'B',
            'harga_per_3_bulan' => 12000000,
            'gambar_sampul' => 'gambar_5.jpeg',
            'deskripsi' => 'Aman dan Nyaman'
        ]);

        \App\Models\Room::create([
            'nama' => 'Kamar 6',
            'tipe' => 'B',
            'harga_per_3_bulan' => 12000000,
            'gambar_sampul' => 'gambar_7.jpeg',
            'deskripsi' => 'Aman dan Nyaman'
        ]);
    }
}