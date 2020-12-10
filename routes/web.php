<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PDFController;

Route::get('/login', function () {
    return view('login');
});

Route::get('/logout', function () {
    Session::forget('user');
    return redirect('login');
});

Route::post("/login", [UserController::class,'login']);

Route::get("/", [RentalController::class,'index']);
Route::get("/rental/{id}", [RentalController::class,'rental']);
Route::get("search", [RentalController::class,'search']);
Route::post("add", [RentalController::class,'addCart']);
Route::get("cart", [RentalController::class,'cart']);
Route::get("remove/{id}", [RentalController::class,'remove']);
Route::get("order/", [RentalController::class,'order']);
Route::post("submitorder/", [RentalController::class,'submitOrder']);
Route::get("submitorder/", [RentalController::class,'submitOrder']);
Route::get("myorders", [RentalController::class,'myOrders']);
Route::get("admin", [RentalController::class,'admin']);

Route::view('/register', 'register');
Route::post("/register", [UserController::class,'register']);

//pdf route
Route::get('generate-pdf', [PDFController::class, 'generatePDF']);