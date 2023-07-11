<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\SubCategoriesController;
use App\Http\Controllers\Admin\TimesSlotController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\HomeCotroller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home.index');
});

Route::get('/login', function () {
    if (Auth::check()) {
        return redirect('/');
    }
    return view('home.auth.login');
})->name("login");
Route::get('/register', function () {
    return view('home.auth.register');
})->name("login");

Route::get('/admin/login', function () {
    return view('admin.auth.login');
})->name("admin.login");

Route::post('cart/store', [CartController::class, 'addToCart'])->name('cart.store')->middleware("auth");
Route::get('cart', [CartController::class, 'cartlist'])->name('cart.list')->middleware("auth");
Route::post('add_order', [OrdersController::class, 'add_new_order'])->name('add_new_order')->middleware("auth");
Route::post('cart/remove', [CartController::class, 'removeCart'])->name('cart.remove.item');

Route::get('products', [HomeCotroller::class, 'ProductList'])->name('ProductList');

Route::post("login_form" , [AuthController::class , 'login'])->name("login.function");
Route::post("register_form" , [AuthController::class , 'register'])->name("register.function");
Route::get("logout" , [AuthController::class , 'logout'])->name("logout");

Route::prefix('admin')->name("admin.")->middleware(["AdminAuthRedirection",'role:admin'])->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    });
    Route::get('/timeslot', function () {
        return view('admin.content.timeslot.index');
    });
    Route::resource("categories" , CategoriesController::class );
    Route::resource("SubCategories" , SubCategoriesController::class );
    Route::resource("products" , ProductsController::class );
    Route::resource("TimeSlot" , TimesSlotController::class );
    Route::get('orders', [OrdersController::class, 'OrdersList'])->name('OrdersList');
    Route::get('updateActiveTimeSlot/{id}', [HomeController::class, 'SwitchActiveModeForTimeSlot'])->name('SwitchActiveModeForTimeSlot');
});

