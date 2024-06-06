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




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::group(['prefix' => 'traveling'], function () {


    Route::get('/about/{id}', [App\Http\Controllers\Traveling\TravelingController::class, 'about'])->name('traveling.about');


    //booking
    Route::get('traveling/Reservation/{id}', [App\Http\Controllers\Traveling\TravelingController::class, 'makeReservations'])->name('traveling.reservation');
    Route::post('traveling/Reservation', [App\Http\Controllers\Traveling\TravelingController::class, 'storeReservations'])->name('traveling.reservation.store');


    // paying
    Route::get('traveling/pay', [App\Http\Controllers\Traveling\TravelingController::class, 'payWithPaypal'])->name('traveling.pay')->middleware('check.for.price');
    Route::get('traveling/success', [App\Http\Controllers\Traveling\TravelingController::class, 'success'])->name('traveling.success')->middleware('check.for.price');

    // deals
    Route::get('traveling/deals', [App\Http\Controllers\Traveling\TravelingController::class, 'deals'])->name('traveling.deals');
    Route::any('traveling/search-deals', [App\Http\Controllers\Traveling\TravelingController::class, 'searchDeals'])->name('traveling.deals.search');
    Route::get('/about/{id}', [App\Http\Controllers\Traveling\TravelingController::class, 'about'])->name('traveling.about');


    //booking
    Route::get('traveling/Reservation/{id}', [App\Http\Controllers\Traveling\TravelingController::class, 'makeReservations'])->name('traveling.reservation');
    Route::post('traveling/Reservation', [App\Http\Controllers\Traveling\TravelingController::class, 'storeReservations'])->name('traveling.reservation.store');


    // paying
    Route::get('traveling/pay', [App\Http\Controllers\Traveling\TravelingController::class, 'payWithPaypal'])->name('traveling.pay')->middleware('check.for.price');
    Route::get('traveling/success', [App\Http\Controllers\Traveling\TravelingController::class, 'success'])->name('traveling.success')->middleware('check.for.price');

    // deals
    Route::get('traveling/deals', [App\Http\Controllers\Traveling\TravelingController::class, 'deals'])->name('traveling.deals');
    Route::any('traveling/search-deals', [App\Http\Controllers\Traveling\TravelingController::class, 'searchDeals'])->name('traveling.deals.search');
});



//users pages 
Route::get('users/my-bookings', [App\Http\Controllers\Users\UsersController::class, 'bookings'])->name('users.bookings')->middleware('auth:web');

// admin panel  routes
Route::get('admin/login', [App\Http\Controllers\Admins\AdminController::class, 'viewLogin'])->name('view.login')->middleware('check.for.auth');
Route::post('admin/login', [App\Http\Controllers\Admins\AdminController::class, 'checkLogin'])->name('check.login');
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    Route::get('/index', [App\Http\Controllers\Admins\AdminController::class, 'index'])->name('admins.dashboard');


    // admins 
    Route::get('/all-admins', [App\Http\Controllers\Admins\AdminController::class, 'allAdmins'])->name('admins.all.admins');
    Route::get('/create-admins', [App\Http\Controllers\Admins\AdminController::class, 'createAdmins'])->name('admins.create');
    Route::post('/create-admins', [App\Http\Controllers\Admins\AdminController::class, 'storeAdmins'])->name('admins.store');


    //cities routes
    Route::get('/all-cities', [App\Http\Controllers\Admins\AdminController::class, 'allCities'])->name('all.cities');
    Route::get('/create-cities', [App\Http\Controllers\Admins\AdminController::class, 'createCities'])->name('create.cities');
    Route::post('/create-cities', [App\Http\Controllers\Admins\AdminController::class, 'storeCities'])->name('store.cities');
    Route::get('/edit-cities/{id}', [App\Http\Controllers\Admins\AdminController::class, 'editcity'])->name('edit.cities');
    Route::put('/update-cities/{id}', [App\Http\Controllers\Admins\AdminController::class, 'updatecity'])->name('update.cities');
    Route::get('/delete-cities/{id}', [App\Http\Controllers\Admins\AdminController::class, 'deleteCities'])->name('delete.cities');

    //spots
    Route::get('/all-spots', [App\Http\Controllers\Admins\AdminController::class, 'allSpots'])->name('all.spots');
    Route::get('/create-spots', [App\Http\Controllers\Admins\AdminController::class, 'createSpots'])->name('create.spots');
    Route::post('/create-spots', [App\Http\Controllers\Admins\AdminController::class, 'storeSpots'])->name('store.spots');
    Route::get('/edit-spots/{id}', [App\Http\Controllers\Admins\AdminController::class, 'editspot'])->name('edit.spots');
    Route::put('/update-spots/{id}', [App\Http\Controllers\Admins\AdminController::class, 'updatespot'])->name('update.spots');
    Route::get('/delete-spots/{id}', [App\Http\Controllers\Admins\AdminController::class, 'deleteSpots'])->name('delete.spots');

    //bookings:
    Route::get('/all-bookings', [App\Http\Controllers\Admins\AdminController::class, 'allBookings'])->name('all.bookings');
    Route::get('/edit-bookings/{id}', [App\Http\Controllers\Admins\AdminController::class, 'editBookings'])->name('edit.booking');
    Route::post('/update-bookings/{id}', [App\Http\Controllers\Admins\AdminController::class, 'updateBookings'])->name('update.booking');
    Route::get('/delete-bookings/{id}', [App\Http\Controllers\Admins\AdminController::class, 'deleteBookings'])->name('delete.booking');

});

