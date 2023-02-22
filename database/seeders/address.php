<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class address extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('address')->insert([
            'address_name' =>  'Trà Vinh',
            'customer_id' => '42'
        ]);


        DB::table('address')->insert([
            'address_name' =>  'Hồ Chí Minh',
            'customer_id' => '42'
        ]);
    }
}
