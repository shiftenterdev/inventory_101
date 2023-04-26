<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Repo\CoreTrait;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    use CoreTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('categories', 'brand')->get();

        return view('admin.product.index')
            ->with(compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::with('parent')->get();
        $brands = Brand::get(['id', 'title']);

        return view('admin.product.create')
            ->with(compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $request->merge(['code' => self::productCode()]);
            Product::create($request->except('_token', 'category_id'))->categories()->sync($request->category_id);
            return response('Product Added Successfully', 200);
        }
        $request->merge(['code' => self::productCode()]);
        $product = Product::create($request->except('_token', 'category_id'));
        Product::find($product)->categoties()->sync($request->category_id);
        return redirect('product');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::with('parent')->get();
        foreach ($categories as $c) {
            if ($c->parent) {
                $c->full_category = $c->parent->title.' > '.$c->title;
            } else {
                $c->full_category = $c->title;
            }
        }
        $brands = Brand::get(['id', 'title']);

        return view('admin.product.edit')
            ->with(compact('categories', 'product', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
