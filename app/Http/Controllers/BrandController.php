<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();

        return view('admin.brand.index')
            ->with(compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        Brand::create($request->except('_token'));

        return redirect('/brand');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('admin.brand.edit')
            ->with(compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $input = $request->except('_token');
        Brand::where('id', $id)->update($input);

        return redirect('/brand')
            ->with('success', 'Brand Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function delete($id)
    {
        Brand::destroy($id);

        return redirect('/brand')
            ->with('success', 'Brand Deleted Successfully');
    }
}
