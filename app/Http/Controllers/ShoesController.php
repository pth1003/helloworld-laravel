<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Comment;
use App\Models\Shoe;
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

class ShoesController extends Controller
{

    public function store(Request $request)
    {
//        $file = $request->file('image');
//        $filename = $file->getClientOriginalName();
//        $file->move(public_path('images'), $filename);

        $data = [
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'image' => $request->image
        ];
        Shoe::create($data);
        return response()->json([
            'message'=>'Insert Sucsess'
        ]);
    }

    public function index()
    {
        $shoe = Shoe::all();
        return $shoe;
    }

    public function show($id)
    {
        $shoe = Shoe::find($id);
        return $shoe;
    }

    public function edit($id)
    {
        $shoe = Shoe::find($id);
        return response()->json($shoe);
    }

    public function update($id, Request $request)
    {
        $shoe = Shoe::find($id);

        $shoe->update($request->all());

        return response()->json([
            'message' => 'Successfully updated'
        ]);
    }

    public function delete($id)
    {
        Shoe::find($id)->delete();

        return response()->json([
            'message'=>'Successfully deleted'
        ]);
    }

}
