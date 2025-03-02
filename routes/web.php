<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.register');
});
     
Route::prefix('admin')->middleware("auth")->name('admin.')->group(function(){
    Route::get('/', [AdminController::class, 'index'])->name('homepage');
    Route::get('/roomManagement', [AdminController::class, 'roomManagement'])->name('roomManagement');
    Route::post('/roomManagement', [AdminController::class, 'createRoom'])->name('createRoom');
    Route::get('/rooms/{room}/delete', [AdminController::class, 'deleteRoom'])->name('deleteRoom');
    Route::get('/rooms/config', [AdminController::class, 'roomsConfiguration'])->name('roomsConfiguration');
    Route::get('/rooms/{room}/config', [AdminController::class, 'roomConfiguration'])->name('roomConfiguration');
    Route::get('/rooms/{room}/seats/{seat}/update', [AdminController::class, 'roomSeatUpdate'])->name('updateSeatType');
    Route::put('/rooms/{room}/update', [AdminController::class, 'roomUpdate'])->name('updateRoom');
    Route::get('/rooms/update_price', [AdminController::class, 'roomsPricesConfiguration'])->name('roomsPricesConfiguration');
    Route::get('/rooms/{room}/update_price', [AdminController::class, 'roomPricesConfiguration'])->name('roomPricesConfiguration');
    Route::put('/rooms/{room}/update_price', [AdminController::class, 'seatsPricesUpdate'])->name('seatsPricesUpdate');
    Route::post('/movie/create', [AdminController::class, 'createMovie'])->name('createMovie');

    Route::get('/sessions', [AdminController::class, 'sessionsList'])->name('sessionsList');
    Route::get('/sessions/create/{movie_id}', [AdminController::class, 'createSession'])->name('createSessionForMovie');;   
    Route::post('/sessions/create/{movie_id}', [AdminController::class, 'storeSession'])->name('storeSession');

    Route::get('/admin/sales_start',  [AdminController::class, 'linkToClient'])->name('linkToClient');
});


Route::prefix('client')->name('client.')->group(function(){
    Route::get('/sessions/{date}', [ClientController::class, 'index'])->name('SessionsList');
    Route::get('/sessions/{seans}/tickets', [ClientController::class, 'show'])->name('SessionShow');
    Route::get('/tickets/{ticket}/update', [ClientController::class, 'update'])->name('seatSelect');
    Route::get('/sessions/{seans}/final_tickets/create', [ClientController::class, 'create'])->name('GetFinalTicket');
    Route::get('/sessions/{seans}/final_tickets/{final_ticket}/showQr', [ClientController::class, 'showQr'])->name('GetFinalTicketQr');
});


Route::get('/dashboard', function () {
    return view('dashboard');   
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dbconn', function(){ return view('dbconn');});

require __DIR__.'/auth.php';
