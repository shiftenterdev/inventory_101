<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Repo\CoreTrait;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('access:customer');
    }


    public function index()
    {
        $customers = Customer::all();

        return view('admin.customer.index')
            ->with(compact('customers'));
    }


    public function create()
    {
        return view('admin.customer.create');
    }

    public function store(Request $request)
    {
        $request->merge(['customer_no' => CoreTrait::customerId()]);
        Customer::create($request->except('_token'));

        return redirect('/customer')
            ->with('success', 'Customer Added');
    }


    public function show($id)
    {
        //
    }


    public function edit(Customer $customer)
    {
        $image = CoreTrait::imageById($customer->customer_logo_id);

        return view('admin.customer.edit')
            ->with(compact('customer', 'image'));
    }


    public function update(Customer $customer, Request $request)
    {
        $customer->update([
            'name' => $request->name,
            'address' => $request->address,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'status' => $request->status,
            'balance' => $request->balance,
        ]);

        return redirect()->route('customers.index')
            ->with('success', 'Customer Updated');
    }


//    public function delete($id)
//    {
//        Customer::destroy($id);
//
//        return redirect('/customer')
//                ->with('success', 'Customer Deleted Successfully');
//    }

    public function search(Request $request)
    {
        return Customer::where('mobile', 'LIKE', '%'.$request->term.'%')
            ->select('id', 'mobile', 'name', 'address', 'email')
            ->get()
            ->toArray();
    }
}
