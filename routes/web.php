<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\TicketTurnoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
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

Route::get('/', [AuthenticatedSessionController::class, 'create'])
->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/admin', [adminController::class,"index"] )->name('admin.index');

Route::get('viewTicketTurno', [TicketTurnoController::class, 'index'])->name('viewTicketTurno');
// Route::resource([
//     'ticketTurno' => TicketTurnoController::class,
// ]);


require __DIR__.'/auth.php';
