<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Room;
use App\Models\Seat;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // AdminUser::factory(1)->create([
        //     'name' => 'Admin',
        //     'email' => 'test@example.com',
        //     'password' => '12345',

        // ]);

        // Room::factory()->count(1)->hasSeats(5)->create();
        // Room::factory()->count(1)->create();
        DB::table('admin_users')->insert([
            "name" => "Admin",
             "email" => "heisaloosershesad@gmail.com",
             "password" =>  Hash::make("12345"),
         ]);
    }
}
