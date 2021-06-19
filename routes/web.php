<?php

// use Illuminate\Support\Facades\Route;

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

Route::namespace('App\\Http\\Controllers')->group(function () {

    Route::middleware('guest')->group(function () {

        Route::get('/', 'GuestController@index');

        Route::get('/login', 'Auth\AuthenticatedSessionController@create')->name('login');
        Route::post('/login', 'Auth\AuthenticatedSessionController@store')->name('login');

        Route::get('/register', 'Auth\RegisteredUserController@create')->name('register');
        Route::post('/register', 'Auth\RegisteredUserController@store')->name('register');
    });

    Route::middleware('auth')->group(function () {

        Route::get('/dashboard', 'ManagerController@index')->name('dashboard');

        // Route of allocation
        Route::get('/allocation/{amenitie_id}/show', 'ManagerController@showAllocation')->name('allocation.index');
        Route::post('/allocation/store', 'ManagerController@addAllocation')->name('allocation.store');

        // Route of the clients
        // Route::get('/client', 'ClientController@index')->name('client.index');
        // Route::post('/client/store', 'ClientController@store')->name('client.store');

        // Route of bookings
        Route::get('/booking', 'BookingController@index')->name('booking.index');
        Route::post('/booking/store', 'BookingController@store')->name('booking.store');

        // Route of the rooms
        Route::get('/room', 'RoomController@index')->name('room.index');
        Route::post('/room/store', 'RoomController@store')->name('room.store');
        Route::post('/room/{room_id}/update', 'RoomController@update')->name('room.update');
        Route::post('/room/{room_id}/delete', 'RoomController@delete')->name('room.delete');

        // Route of the amenities
        Route::get('/amenitie', 'AmenitieController@index')->name('amenitie.index');
        Route::post('/amenitie/store', 'AmenitieController@store')->name('amenitie.store');
        Route::post('/amenitie/{amenitie_id}/update', 'AmenitieController@update')->name('amenitie.update');
        Route::post('/amenitie/{amenitie_id}/delete', 'AmenitieController@delete')->name('amenitie.delete');

        // Route of the Types
        Route::get('/type', 'TypeController@index')->name('type.index');
        Route::post('/type/store', 'TypeController@store')->name('type.store');
        Route::post('/type/{type_id}/update', 'TypeController@update')->name('type.update');
        Route::post('/type/{type_id}/delete', 'TypeController@delete')->name('type.delete');

        // Session logout route
        Route::post('/logout', 'Auth\AuthenticatedSessionController@destroy')
            ->name('logout');
    });
});



// Route::get('/', function () {
//     return view('index');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
