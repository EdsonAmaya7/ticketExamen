<?php

use App\Http\Controllers\TicketTurnoController;
use Illuminate\Support\Facades\Route;

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
    return view('login');
});

Route::get('viewTicketTurno', [TicketTurnoController::class, 'index'])->name('viewTicketTurno');

// Route::resource([
//     'ticketTurno' => TicketTurnoController::class,
// ]);
