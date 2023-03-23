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
use Hash;
use Auth;
//use AuthenticatesUsers;

class OrmCustomerController extends Controller
{
    /**
     * index Action
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $listCustomer = Customer::with(['address' => function ($query) {
            $query->where('typeAddress_id', 1);
        }])->orderBy('id', 'DESC')->paginate(5);
        return view('customer.index', compact('listCustomer'));
    }

    /**
     * Get list product
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getProduct()
    {
        $listProduct = Product::orderBy('id', 'DESC')->paginate(10);
        return view('product.index', compact('listProduct'));
    }

    /**
     * Git list order
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getOrder()
    {
        $orders = Order::with(['customer', 'product'])->get();
        return view('order.index', compact('orders'));
    }

    /**
     * Insert customer
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function inserCustomer(Request $request)
    {
        $typeAddress = TypeAddress::all();
        if ($request->method() == 'GET') {
            return view('customer.add', compact('typeAddress'));
        } else {
                $request->validate([
                'fullname' => 'required',
                'cus_username' => 'required',
                'password' => 'required|min:6',
                'address' => 'required',
                'email' => 'required',
            ], [
                    'fullname.required' => 'Vui lòng nhập tên đầy đủ',
                    'cus_username.required' => 'Vui lòng nhập username',
                    'password.required' => 'Vui lòng nhập passwork',
                    'password.min' => 'Passwork phải có ít nhất 6 kí tự',
                    'address.required' => 'Vui lòng nhập địa chỉ',
                    'email.required' => 'Vui lòng nhập email',
                ]
            );

            $dataInsert = [
                'fullname' => $request->fullname,
                'password' => Hash::make($request->password),
                'email' => $request->email,
                'cus_username' => $request->cus_username,
                'id_customer' => $request->id,
            ];
            $customer = Customer::create($dataInsert);
            Address::create([
                'address_name' => $request->address,
                'typeAddress_id' => 1,
                'customer_id' => $customer->id
            ]);
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
    public function deleteCustomer($id)
    {
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
    public function updateCustomer($id, Request $request)
    {
        if ($request->method() == 'GET') {
            $customer = Customer::find($id);
            $address = $customer->address;
            return view('customer.update', compact('customer', 'address'));
        } else {
            $dataUpdate = [
                'fullname' => $request->fullname,
                'email' => $request->email,
                'cus_username' => $request->cus_username,
            ];
            Customer::find($id)->update($dataUpdate);
            $address = Address::where('customer_id', $id)->get();
            foreach ($address as $add) {
                $idType = $add->typeAddress_id;
                $nameAddress = $request->$idType;
                Address::where(['customer_id' => $id, 'typeAddress_id' => $idType])->update(['address_name' => $nameAddress]);
            };
            return redirect()->route('customer.index');
        }
    }

    /**
     * Get address of customer
     * @param $id
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getAddress($id)
    {
        $customers = Customer::find($id)->address;
        return view('customer.address', compact('customers', 'id'));
    }

    public function addAddress($id, Request $request)
    {
        if ($request->method() == 'GET') {
            return view('customer.addAdr');
        } else {
            $idTypes = $request->type;
            foreach ($idTypes as $idType) {
                Address::create(['address_name' => $request->address, 'customer_id' => $id, 'typeAddress_id' => $idType]);
            }
            return redirect()->route('customer.index');
        }
    }

    /**
     * Login customer
     * @param Request $request
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        if ($request->method() == 'GET') {
            return view('customer.login');
        } else {
            $infoLogin = [
                'cus_username' => $request->cus_username,
                'password' => $request->password
            ];
            $login = Auth::guard('customer')->attempt($infoLogin);
            if ($login) {
                $fullName = Auth::guard('customer')->user()->fullname;
                return redirect()->route('customer.index');
            }
            return redirect()->route('customer.login')->with('error', 'Dang nhap khong thanh cong');
        }
    }

    /**
     * Logout customer
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::guard('customer')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('customer.login');
    }
}
