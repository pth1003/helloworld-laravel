<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
//    public function getCustomer() {
//        $customer = DB::select('SELECT * FROM customer ORDER BY  id DESC ');
//        return $customer;
//    }

//    public function addCustomer($addData) {
//        $addCustomer = DB::insert('INSERT INTO customer(fullname,cus_username, password, email, address, created_at)
//                        VALUES (?, ?, ?, ?, ?, ?)', $addData);
//    }
}
