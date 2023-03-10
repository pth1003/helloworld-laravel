<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DataDemo extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {
//         \App\Models\User::factory(10)->create();
//        for ($i = 11; $i <= 20; $i++) {
//            \App\Models\User::factory()->create([
//                'name' => 'Pham trung hau' . $i,
//                'email' => 'user' . $i . '@ninepoints.com',
//                'password' => Hash::make('admin1234'),
//            ]);
//        }

        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
