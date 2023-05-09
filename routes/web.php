<?php

use App\Http\Controllers\auth\AuthController;
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

Route::post("login_form" , [AuthController::class , 'login'])->name("login.function");
Route::post("register_form" , [AuthController::class , 'register'])->name("register.function");
Route::get("logout" , [AuthController::class , 'logout'])->name("logout");

Route::prefix('admin')->name("admin.")->middleware(["AdminAuthRedirection",'role:admin'])->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    });
});

