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
            'address_name' =>  'Hà Nội',
            'customer_id' => '63',
            'typeAddress_id' => '2',
            'default_address' => 0
        ]);


        DB::table('address')->insert([
            'address_name' =>  'Cà Mau',
            'customer_id' => '66',
            'typeAddress_id' => '2',
            'default_address' => 0
        ]);
    }
}
