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

        // ==========================================

    }
}
