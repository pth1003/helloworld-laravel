<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Product;
class OrmCustomerController extends Controller
{
    function index() {
        $listCustomer = Customer::paginate(10);
        return view('customer.index', compact('listCustomer'));
    }


    function getProduct() {
        $listProduct = Product::paginate(10);
        return view('customer.product', compact('listProduct'));
    }


    function getOrder() {
        return view('customer.order');
    }

    function addCustomer() {
        return view('customer.addCustomer');
    }
}
