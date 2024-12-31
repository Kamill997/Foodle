<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
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
    return view('home');
});

Route::get("/login", [AuthController::class, 'login'])->name('login');
Route::post("/login", [AuthController::class, 'checklogin']);
Route::get("login/photo", [AuthController::class, 'pick']);

Route::get("/logout", [AuthController::class, 'logout'])->name('logout');

Route::get("/registration", [AuthController::class, 'check'])->name('registration');
Route::post("/registration", [AuthController::class, 'register']);
Route::get("registration/photo", [AuthController::class, 'pick']);
Route::get("registration/Username/{q}", [AuthController::class, 'checkUsername']);
Route::get("registration/Email/{q}", [AuthController::class, 'checkEmail']);

Route::get("/home", [HomeController::class, 'index'])->name('home');
Route::get("home/photo", [HomeController::class, 'pick']);

Route::get("/profile", [HomeController::class, 'check'])->name('profile');
Route::get("profile/photo", [HomeController::class, 'pick']);
Route::get("profile/user", [HomeController::class, 'user']);
Route::post("profile/upload", [HomeController::class, 'upload']);
Route::post("profile/reset", [HomeController::class, 'reset']);

Route::get("/menu", [MenuController::class, 'index'])->name('menu');
Route::get("menu/photo", [MenuController::class, 'pick']);
Route::get("menu/header", [MenuController::class, 'header']);
Route::get("menu/showMenu/{q}", [MenuController::class, 'showMenu']);
Route::post("menu/add", [MenuController::class, 'addItem']);

Route::get("/cart", [CartController::class, 'index'])->name('cart');
Route::get("cart/photo", [CartController::class, 'pick']);
Route::get("cart/item", [CartController::class, 'itemCart']);
Route::post("cart/update", [CartController::class, 'updateItem']);
Route::get("cart/delete/{q}", [CartController::class, 'delete']);
Route::get("cart/deleteAll", [CartController::class, 'deleteAll']);

Route::get("/checkout", [CheckoutController::class, 'index'])->name('checkout');
Route::get("checkout/photo", [CheckoutController::class, 'pick']);
Route::get("checkout/item", [CheckoutController::class, 'itemCart']);
Route::post("/checkout", [CheckoutController::class, 'addCheck']);

Route::get("/contact", [ContactController::class, 'index'])->name('contact');
Route::get("contact/photo", [ContactController::class, 'pick']);
Route::post("contact/request", [ContactController::class, 'addRequest']);
