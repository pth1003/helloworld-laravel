<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class product extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 40; $i++) {
            DB::table('products')->insert([
                'name' => 'products '.$i,
                'quantity' => '100'.$i,
                'price' =>$i
            ]);
        }
    }
}
