<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\RoomController;
use App\Models\Booking;
use illuminate\Support\Facades\Auth;
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

Route::resource('room', RoomController::class)->middleware('isAdminOwner');
Route::resource('member', MemberController::class)->middleware('isAdminOwner');
// Route::resource('booking', BookingController::class);

// Route::get('/booking/{bookingg}', [BookingController::class, 'prevBooking']);
Route::controller(BookingController::class)->group(function () {
    Route::get('/show-room/{room}', 'prevBooking')->middleware('isMember');
    Route::post('/booking', 'booking')->middleware('isMember');
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

Route::get('/dashboard', [OwnerController::class, 'dashboard'])->middleware('isAdminOwner');

Route::get('/', function () {

    if (Auth::guard('admin')->check() || Auth::guard('owner')->check()) {
        return redirect('/dashboard');
    }

    return view('Member.home');
});

Route::controller(RoomController::class)->group(function () {
    Route::get('view-a', 'viewA')->middleware('isMember');
    Route::get('view-b', 'viewB')->middleware('isMember');
    Route::get('view-c', 'viewC')->middleware('isMember');
});

Route::get('/booking', function () {
    return view('Member.booking')->middleware('isMember');
});

Route::get('/register', [MemberController::class, 'create']);

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login');
    Route::post('/login', 'authenticate');
    Route::post('/register', 'register');
    Route::post('/logout', 'logout');
});
Route::get('detail/{booking}', [BookingController::class, 'detail'])->middleware('isMember');

Route::get('/profile', [MemberController::class, 'profile'])->middleware('isMember');

Route::post('/upload-pembayaran/{booking}', [BookingController::class, 'uploadPembayaran'])->middleware('isMember');

Route::controller(BookingController::class)->group(function () {
    Route::get('/booking-admin', 'index')->middleware('isAdminOwner');
    Route::get('/booking-admin/{booking}', 'show')->middleware('isAdminOwner');
    Route::post('/set-status-pembayaran/{booking}', 'setStatusPembayaran')->middleware('isAdminOwner');
    Route::post('/set-status-pemesanan/{booking}', 'setStatusPemesanan')->middleware('isAdminOwner');
    Route::post('/laporan', 'laporan')->middleware('isAdminOwner');
});

Route::controller(MemberController::class)->group(function () {
    Route::get('/member', 'index')->middleware('isAdminOwner');
    Route::get('/member/{member}/edit', 'edit')->middleware('isAdminOwner');
    Route::put('/member/{member}', 'update')->middleware('isAdminOwner');
    Route::delete('/member/{member}', 'destroy')->middleware('isAdminOwner');
});

// Route::get('/edit-admin', [OwnerController::class, 'editAdmin'])->Middleware('isAdminOwner');
// Route::get('/edit-owner', [OwnerController::class, 'editOwner'])->Middleware('isAdminOwner');

Route::controller(OwnerController::class)->group(function () {
    Route::get('/edit-admin', 'editAdmin')->Middleware('isAdminOwner');
    Route::get('/edit-owner', 'editOwner')->Middleware('isAdminOwner');
    Route::put('/update-owner/{owner}', 'updateOwner')->Middleware('isAdminOwner');
    Route::put('/update-admin/{admin}', 'updateAdmin')->Middleware('isAdminOwner');
});
