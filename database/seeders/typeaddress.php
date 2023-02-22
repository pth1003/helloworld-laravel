<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class typeaddress extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('typeAddress')->insert([
                'name_type' => 'DefaultAddress'
            ]);

            DB::table('typeAddress')->insert([
                'name_type' => 'WorkAddress'
            ]);

            DB::table('typeAddress')->insert([
                'name_type' => 'HomeAddress'
            ]);
    }
}
