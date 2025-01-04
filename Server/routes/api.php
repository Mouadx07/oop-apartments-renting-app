<?php

use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', function () {
    return ['data' => 'testing get api'];
});
Route::post('/test', function () {
    return ['data' => 'post data test'];
});
//User auth routes
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', action: [UserController::class, 'login']);
Route::post('/logout', action: [UserController::class, 'logout']);

Route::get('/user/{id}/profile', action: [UserController::class, 'profile']);
// Route::get('/user/{id}/apartments', action: [UserController::class, 'apartments']);
// Route::get('/user/{id}/bookings', action: [UserController::class, 'bookings']);

//Apartment routes  
Route::get('/apartments/all', action: [ApartmentController::class, 'index']); //show all apartments in database
Route::get('/apartments/{id}', action: [ApartmentController::class, 'show']); //show  apartment by id in database
Route::post('/apartments/store', action: [ApartmentController::class, 'store']); 
Route::post(uri: '/apartments/update', action: [ApartmentController::class, 'update']);
Route::post(uri: '/apartments/delete', action: [ApartmentController::class, 'delete']);
//Booking routes
Route::post('book', action:[BookingController::class, 'store']);
