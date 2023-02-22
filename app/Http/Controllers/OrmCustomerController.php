<?php

namespace App\Http\Controllers;
use App\Models\Address;
use App\Models\Comment;
use App\Models\typeAddress;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Order;
use App\Models\Post;

class OrmCustomerController extends Controller
{
    /**
     * index Action
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index() {
        $listCustomer = Customer::orderBy('id', 'DESC')->paginate(10);
        return view('customer.index', compact('listCustomer'));
    }


    /**
     * Get list product
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getProduct() {
        $listProduct = Product::orderBy('id', 'DESC')->paginate(10);
        return view('product.index', compact('listProduct'));
    }

    /**
     * Git list order
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getOrder() {
//        $orderFullname = Order::find(1)->with('customer', 'product')->get();
//        $orderProduct = Order::find(2)->product->toArray();
//        $orderProduct_ = Order::find(2)->customer->toArray();
//        $order = Order::all();
//        dd($order);
//        $arr = [];
//        array_push($arr, $orderProduct, $orderProduct_);
//        $order = Order::all();
//        $order->load('customer', 'product');
//        dd($order, $orderProduct);

        $customer = Customer::find(64)->order;
        dd($customer);
        return view('order.index', compact('customer'));

    }

    public function inserCustomer(Request $request) {
        $dataInsert  = [
            'fullname'=>$request->fullname,
            'password'=>$request->password,
            'email'=>$request->email,
//            'address'=>$request->address,
            'cus_username'=>$request->cus_username
        ];
//        return dd($dataInsert);
        Customer::create($dataInsert);
        return redirect()->route('customer.index');
    }

    public function addCustomer() {
        return view('customer.addCustomer');
    }

    public function deleteCustomer($id) {
        Customer::find($id)->delete();
        return redirect()->route('customer.index');
    }

    public function getAddress($id) {
        $customer = Customer::find($id)->address;


        //tu bang dia chi lay id = 3 -> kiem tra typeaddress_id = bao nhiu => ten type address
        //$address = address::find(3)->typeAddress;
       return view('customer.address', compact('customer'));
    }

}
