<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class comment extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
            DB::table('comment')->insert([
                'title' =>  'Comment bai blog 2 +',
                'content' => 'Cooment bai blog 2 +',
                'post_id' => 2
            ]);
    }
}
