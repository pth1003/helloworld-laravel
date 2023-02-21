<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class post extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
            DB::table('post')->insert([
                'title' =>  'Bai log thu 2',
                'content' => 'Noi dung bai blog thu 2'
            ]);
    }
}
