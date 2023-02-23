<?php

namespace App\Http\Controllers;
use App\Models\Address;
use App\Models\Comment;
use App\Models\TypeAddress;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Order;
use App\Models\Post;
use function Sodium\add;

class OrmCustomerController extends Controller
{
    /**
     * index Action
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index() {
        $listCustomer = Customer::orderBy('id', 'DESC')->paginate(10);;
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
        $customer = Customer::find(64)->order;
        dd($customer);
        return view('order.index', compact('customer'));
    }


    /**
     * Insert customer
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function inserCustomer(Request $request) {
        $typeAddress = TypeAddress::all();
        if($request->method() == 'GET'){
            return view('customer.add', compact('typeAddress'));
        }else{
            $dataInsert = [
                'fullname'=>$request->fullname,
                'password'=>$request->password,
                'email'=>$request->email,
                'cus_username'=>$request->cus_username,
                'id_customer'=>$request->id,
            ];
        $customer = Customer::create($dataInsert);
        $typeAdds = $request->typeAdd;
        foreach ($typeAdds as $typeAdd){
            Address::create([
                'address_name'=>$request->address,
                'typeAddress_id'=> $typeAdd,
                'customer_id'=>$customer->id
            ]);
        }
        return redirect()->route('customer.index');
        }
    }

    /**
     * Get id customer
     * @param $id
     *
     * Delete customer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteCustomer($id) {
        Customer::find($id)->delete();
        return redirect()->route('customer.index');
    }

    /**
     * Get id customer
     * @param $id
     *
     * Get request from POST
     * @param Request $request
     *
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function updateCustomer($id, Request $request) {
        if($request->method() == 'GET'){
            $customer = Customer::find($id);
            $address  = $customer->address;
            return view('customer.update', compact('customer', 'address'));
        }else{
            $dataUpdate = [
                'fullname'=>$request->fullname,
                'email'=>$request->email,
                'cus_username'=>$request->cus_username,
            ];
            Customer::find($id)->update($dataUpdate);
            $address = Address::where('customer_id', $id)->get();
            foreach($address as $add){
                $idType = $add->typeAddress_id;
                $nameAddress = $request->$idType;
                Address::where(['customer_id'=>$id, 'typeAddress_id'=>$idType])->update(['address_name'=> $nameAddress]);
            };
            return redirect()->route('customer.index');
        }
    }

    /**
     * Get address of customer
     * @param $id
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getAddress($id) {
        $customers = Customer::find($id)->address;
        //tu bang dia chi lay id = 3 -> kiem tra typeaddress_id = bao nhiu => ten type address
        //$address = address::find(3)->typeAddress;
       return view('customer.address', compact('customers'));
    }

}
