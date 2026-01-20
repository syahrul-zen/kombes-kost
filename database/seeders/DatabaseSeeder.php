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

        \App\Models\Owner::create([
            'name' => 'Owner Kombes Kost',
            'email' => 'owner@gmail.com',
            'password' => bcrypt('password'),
        ]);

        \App\Models\Room::create([
            'nama' => 'Kamar 1',
            'tipe' => 'A',
            'harga_per_6_bulan' => 6000000,
            'gambar_sampul' => 'A1.png',
            'gambar_2' => 'A2.png',
            'gambar_3' => 'WC.jpeg',
            'deskripsi' => '-',
        ]);

        \App\Models\Room::create([
            'nama' => 'Kamar 2',
            'tipe' => 'B',
            'harga_per_6_bulan' => 4500000,
            'gambar_sampul' => 'B1.jpeg',
            'gambar_2' => 'B2.jpeg',
            'gambar_3' => 'WC.jpeg',
            'deskripsi' => '-',
        ]);

        \App\Models\Room::create([
            'nama' => 'Kamar 3',
            'tipe' => 'C',
            'harga_per_6_bulan' => 3500000,
            'gambar_sampul' => 'C1.jpeg',
            'gambar_2' => 'C2.jpeg',
            'gambar_3' => 'WC.jpeg',
            'deskripsi' => '-',
        ]);

        // ==========================================

    }
}
