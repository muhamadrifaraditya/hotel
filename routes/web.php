<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

route::get('/', [AdminController::class, 'home']);
route::get('/home', [AdminController::class, 'index'])->name('home');
route::get('/create_kamar', [AdminController::class, 'create_kamar']);
route::post('/tambah_kamar', [AdminController::class, 'tambah_kamar']);
route::get('/data_kamar', [AdminController::class, 'data_kamar']);
route::get('/update_kamar/{id}', [AdminController::class, 'update_kamar']);
route::post('/edit_kamar/{id}', [AdminController::class, 'edit_kamar']);
route::get('/kamar_delete/{id}', [AdminController::class, 'kamar_delete']);
route::get('/room_detail/{id}', [HomeController::class, 'room_detail']);
route::post('/add_booking/{id}', [HomeController::class, 'add_booking']);
