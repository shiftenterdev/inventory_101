<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FoodCategoryController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\RefundController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('login', [AuthController::class, 'login'])
    ->name('admin.login');

Route::post('login', [AuthController::class, 'loginPost'])
    ->name('login.post');

Route::get('forgot-password', [AuthController::class, 'forgotPassword'])
    ->name('forgot.password');

Route::post('forgotpassword', [AuthController::class, 'forgotPasswordPost'])
    ->name('forgot.password.post');

Route::get('createpassword/{token}', [AuthController::class, 'createPassword'])
    ->name('create.password');

Route::post('createpassword', [AuthController::class, 'createPasswordPost'])
    ->name('create.password.post');

Route::get('logout', [AuthController::class, 'logout'])
    ->name('logout');


Route::middleware('backend.auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])
        ->name('admin.dashboard');

    Route::get('language/{locale}', [LanguageController::class, 'index'])
        ->name('language');

    Route::resource('product', ProductController::class);
    Route::resource('sales', SalesController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('brand', BrandController::class);
    Route::resource('discount', DiscountController::class);
    Route::resource('table', TableController::class);
    Route::resource('slider', SliderController::class);
    Route::resource('stock', StockController::class);
    Route::resource('food', FoodController::class);
    Route::resource('food-category', FoodCategoryController::class);
    Route::resource('purchase', PurchaseController::class);
    Route::resource('payment', PaymentController::class);
    Route::resource('settings', SettingsController::class);
    Route::resource('permission', PermissionController::class);
    Route::resource('refund', RefundController::class);
    Route::resource('employee', EmployeeController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('user', UserController::class);
    Route::resource('role', RoleController::class);
    Route::resource('report', ReportController::class);
});
