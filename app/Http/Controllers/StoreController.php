<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public $customer;

    public function index()
    {
        return view('welcome',[
            'data' => Customer::orderBy('id', 'DESC')->get(),
        ]);
    }
    public function Store(Request $request)
    {
        return response()->json(Customer::newCustomer($request));
    }
    public function manage_customer()
    {
        return response()->json(Customer::orderBy('id', 'DESC')->get());
    }
    public function customer_delete(Request $request)
    {
        Customer::where('id',$request->id)->first()->delete();
        return response()->json('Customer info delete successful');
    }
}
