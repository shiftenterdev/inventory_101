<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Food;
use App\Models\Product;
use App\Models\Table;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::count();
        $brands = Brand::count();
        $categories = Category::count();
        $customers = Customer::count();
        $users = User::count();
        return view('admin.dashboard')->with([
            'products' => $products,
            'brands' => $brands,
            'users' => $users,
            'categories' => $categories,
            'customers' => $customers,
            'tables' => Table::count(),
            'foods' => Food::count()
        ]);
    }
}
