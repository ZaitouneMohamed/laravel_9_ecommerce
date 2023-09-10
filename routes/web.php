<?php

use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PdfController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\SubCategoriesController;
use App\Http\Controllers\Admin\TimesSlotController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\auth\ForgetPasswordController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\HomeController as ControllersHomeController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\HomeCotroller;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\ShopController;
use App\Models\Categorie;
use App\Models\Product;
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

Route::controller(ControllersHomeController::class)->group(function(){
    Route::get('/',"Home")->name("home");
    Route::get('/checkout',"checkout")->name("checkout");
});




Route::get('/test', function () {
    return view('electro.blank');
});

Route::get('/login', function () {
    if (Auth::check()) {
        return redirect('/');
    }
    return view('home.auth.login');
})->name("login")->middleware("guest");

Route::get('/register', function () {
    return view('home.auth.register');
})->name("register")->middleware("guest");

Route::permanentRedirect('/home', '/');

Route::get('/admin/login', function () {
    return view('admin.auth.login');
})->name("admin.login");

Route::resource("products", ProductsController::class)->only("show");

Route::controller(CartController::class)->group(function () {
    Route::post('cart/store', 'addToCart')->name('cart.store')->middleware("auth");
    Route::get('cart', 'cartlist')->name('cart.list');
    Route::post('cart/remove', 'removeCart')->name('cart.remove.item');
    Route::get('AddToCart/{id}', 'addToCart')->name('addProdustToCart');
    Route::delete('deleteProduct',  'deleteProduct')->name('deleteProduct');
    Route::patch('updateCart',  'updateCart')->name('updateCart');
    Route::get('getCartCount',  'getCartCount')->name('getCartCount');
    Route::get('getCartContent',  'getCartContent')->name('getCartContent');
});

Route::controller(ShopController::class)->name('shop.')->group(function () {
    Route::get('Categorie/{id}', 'getProductOfCategorie')->name("categorie");
    Route::get('categorie/{id}', 'getProductOfSubCategorie')->name("subcategorie");
    Route::get('AllProduct', 'AllProduct')->name("AllProduct");
});

Route::controller(OrdersController::class)->middleware("auth")->group(function () {
    Route::post('add_order', 'add_new_order')->name('add_new_order');
    Route::get('MyOrdersList', 'MyOrdersList')->name('MyOrdersList');
});

Route::controller(ProfileController::class)->middleware("auth")->name("user.")->group(function () {
    Route::get("profile", "index")->name("profile");
    Route::post("update_profile", "UpdateProfile")->name("update.profile");
    Route::post("AddNewAdresse", "AddNewAdresse")->name("createadresse");
});

Route::controller(HomeCotroller::class)->group(function () {
    Route::get('products',  'ProductList')->name('ProductList');
});
Route::controller(HomeController::class)->group(function () {
    Route::get('getSubCategories',  'getSubCategories')->name('getSubCategories');
    Route::get('updateActiveTimeSlot/{id}', 'SwitchActiveModeForTimeSlot')->name('admin.SwitchActiveModeForTimeSlot');
});

Route::controller(AuthController::class)->group(function () {
    Route::post("login_form",  'login')->name("login.function");
    Route::post("register_form", 'register')->name("register.function");
    Route::get("logout",  'logout')->name("logout");
});


Route::controller(ForgetPasswordController::class)->group(function () {
    Route::get('forget-password', 'showForgetPasswordForm')->name('forget.password.get');
    Route::post('forget-password',  'submitForgetPasswordForm')->name('forget.password.post');
    Route::get('reset-password/{token}', 'showResetPasswordForm')->name('reset.password.get');
    Route::post('reset-password', 'submitResetPasswordForm')->name('reset.password.post');
});

Route::controller(PdfController::class)->middleware(["auth"])->group(function () {
    Route::get("pdf/{order_number}", 'GetUserOrder');
});

Route::get('/google/redirect', [GoogleController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');

Route::prefix('admin')->name("admin.")->middleware(["AdminAuthRedirection", 'role:admin'])->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    });
    Route::get('/timeslot', function () {
        return view('admin.content.timeslot.index');
    });
    Route::resource("categories", CategoriesController::class);
    Route::resource("SubCategories", SubCategoriesController::class);
    Route::resource("products", ProductsController::class)->except("show");
    Route::resource("branch", BranchController::class);
    Route::resource("TimeSlot", TimesSlotController::class);
    Route::controller(OrdersController::class)->group(function () {
        Route::get('orders', 'OrdersList')->name('OrdersList');
        Route::get('ViewOrder/{order_number}', 'ViewOrder')->name('ViewOrder');
        Route::get('ChangeStatue/{statue}/{order_number}', 'ChangeStatue')->name('ChangeStatue');
    });
});
