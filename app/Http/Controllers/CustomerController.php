<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class CustomerController extends Controller
{
    /**
     * Customer page list
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function  index() {
        return view('index',[
            'customer'=>DB::table('customer')->paginate(10)
        ]);
    }

    /**
     * Add customer
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function addCustomer() {
        return view('addCustomer');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postCustomer(Request $request) {
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

    public function updateCustomer($id) {
        /** @var  $dataUpdate */
        $dataUpdate = DB::select('SELECT * FROM customer WHERE id=? ORDER BY  id DESC', [$id]);
        return view('/update', compact('dataUpdate'));
    }

    public function postUpdateCus($id, Request $request) {
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
