<?php

namespace App\Http\Controllers;
use App\Models\Comment;
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
//        $listOrder = Order::paginate(10);
        $arrName = [];
        $arrPro  = [];
        $arrOrder = [];
        $order = Order::all();
        $countOrder = count($order);
        for($i=1; $i<=$countOrder; $i++){
            $order = Order::find($i);
            $fullName = $order->customer->fullname;
            $namePro  = $order->product->name;
            array_push($arrName, $fullName);
            array_push($arrPro, $namePro);
        }
        array_push($arrOrder, $arrName, $arrPro);
//        dd($arrOrder[0]);
        return view('order.index', compact('arrOrder'));

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
        $post = Customer::create($dataInsert);
        return redirect()->route('customer.index');
    }

    public function addCustomer() {
        return view('customer.addCustomer');
    }

    public function getCmt() {
//        $post = Post::where('id',2)->get();
//        dd($post);
        $comment = Post::find(1)->comments;
        return view('comment.index', compact('comment'));
    }

    public function getPost(){
        $comment = Comment::find(3); //tim id cua bang comment
        return $comment->post;
    }

    public function deleteCustomer($id) {
        Customer::where('id', $id)->delete();
        return redirect()->route('customer.index');
    }

}
