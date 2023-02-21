<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DataCustomer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       for($i = 1; $i <= 20; $i++) {
           DB::table('customer')->insert([
            'fullname' => 'Customer '.$i,
            'password' => Hash::make('password'),
            'email' =>'Customer'.$i.'@ninepoints.vn',
            'address' => 'Can Tho City '.$i ,
            'cus_username'=> 'username_customer'.$i,
               
        ]);
       }
    }
}
