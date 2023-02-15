<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class CustomerController extends Controller
{
    function  index() {
//        $customer = new Customer();
//        $customerList = $customer->getCustomer();
        return view('index',[
            'customer'=>DB::table('customer')->paginate(10)
        ]);
    }

    function addCustomer() {
        return view('addCustomer');
    }

    function postCustomer(Request $request) {
//        $dataInsert = [
//            $request->fullname,
//            $request->cus_username,
//            $request->password,
//            $request->email,
//            $request->address,
//            date('Y-m-d H:i:s')
//        ];
//        $addCustomer = DB::insert('INSERT INTO customer(fullname,cus_username, password, email, address, created_at)
////                        VALUES (?, ?, ?, ?, ?, ?)', $dataInsert);

        DB::table('customer')
            ->insert([
                'fullname' => $request->fullname,
                'password' => $request->password,
                'email' => $request->email,
                'address' => $request->address,
                'cus_username' => $request->cus_username,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        return redirect()->route('index');
    }

    function updateCustomer($id) {
        $dataUpdate = DB::select('SELECT * FROM customer WHERE id=? ORDER BY  id DESC', [$id]);
        return view('/update', compact('dataUpdate'));
    }

    function postUpdateCus($id, Request $request) {
        DB::table('customer')->where('id', $id)
            ->update([
                'fullname'=>$request->fullname,
                'cus_username'=>$request->cus_username,
                'email'=>$request->email,
                'password'=>$request->password,
                'address'=>$request->address
            ]);
        return redirect()->route('index');
    }

    function deleteCustomer($id) {
        DB::table('customer')->where('id', '=', $id)->delete();
        return redirect()->route('index');
    }
}
