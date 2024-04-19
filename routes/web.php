<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth:web');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::get('traveling/about/{id}', [App\Http\Controllers\Traveling\TravelingController::class, 'about'])->name('traveling.about');


//booking
Route::get('traveling/Reservation/{id}', [App\Http\Controllers\Traveling\TravelingController::class, 'makeReservations'])->name('traveling.reservation');
Route::post('traveling/Reservation/{id}', [App\Http\Controllers\Traveling\TravelingController::class, 'storeReservations'])->name('traveling.reservation.store');





 










































// admin panel  routes
Route::get('admin/login', [App\Http\Controllers\Admins\AdminController::class, 'viewLogin'])->name('view.login')->middleware('check.for.auth');
Route::post('admin/login', [App\Http\Controllers\Admins\AdminController::class, 'checkLogin'])->name('check.login');


Route::group(['prefix' => 'admin', 'middleware' => 'auth.admin'], function() {

    Route::get('/index', [App\Http\Controllers\Admins\AdminController::class, 'index'])->name('admins.dashboard');

});


