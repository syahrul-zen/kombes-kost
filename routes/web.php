<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\RoomController;
use App\Models\Booking;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('room', RoomController::class);
Route::resource('member', MemberController::class);
// Route::resource('booking', BookingController::class);

// Route::get('/booking/{bookingg}', [BookingController::class, 'prevBooking']);
Route::controller(BookingController::class)->group(function () {
    Route::get('/show-room/{room}', 'prevBooking');
    Route::post('/booking', 'booking');
});

Route::get('/test', function () {
    // Data dari input form anda :

    $data = [
        'start_date' => '2025-12-07',
        'end_date' => '2025-12-10',
        'member_id' => 1,
        'room_id' => 2,
    ];

    // 1. Cek pencarian booking yang bertabrakan

    $tabrakan = Booking::where('room_id', $data['room_id'])
        ->where('start_date', '<=', $data['end_date'])
        ->where('end_date', '>=', $data['start_date'])
        ->count();

    return $tabrakan;
});

Route::get('/admin', function () {
    return view('Admin.Layouts.main');
});

Route::get('/', function () {
    return view('Member.home');
});

Route::controller(RoomController::class)->group(function () {
    Route::get('view-a', 'viewA');
});

Route::get('/booking', function () {
    return view('Member.booking');
});

Route::get('/register', [MemberController::class, 'create']);

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login');
    Route::post('/login', 'authenticate');
    Route::post('/register', 'register');
    Route::post('/logout', 'logout');
});

Route::get('/test1', function () {
    return Auth::guard('admin')->user();
});

Route::get('/test2', function () {
    return Auth::guard('member')->user();
});

Route::get('detail/{booking}', [BookingController::class, 'detail']);

// Route::get('/profile', function () {
//     return view('Member.profile');
// });

Route::get('/profile', [MemberController::class, 'profile']);

Route::post('/upload-pembayaran/{booking}', [BookingController::class, 'uploadPembayaran']);
