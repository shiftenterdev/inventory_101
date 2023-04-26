<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Refund;
use Illuminate\Http\Request;

class RefundController extends Controller
{

    public function index()
    {
        $products = Refund::all();

        return view('admin.refund.index')
            ->with(compact('products'));
    }


    public function create()
    {
        $customer = Customer::get(['id', 'name']);
        $products = Product::get(['code', 'title']);

        return view('admin.refund.create')
            ->with(compact('customer', 'products'));
    }


    public function store()
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update($id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
