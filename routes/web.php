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

Route::get('/', [TicketTurnoController::class, 'index'])->name('viewTicketTurno');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware([
    'auth', 'verified'
])->name('dashboard');

//al ultimo agregar el middleware de auth y verified a la ruta admin
Route::get('/admin', [adminController::class, "index"])->name('admin.index');

//ruta que trae todos los tickets de la bd
Route::get('/getTickets', [TicketTurnoController::class, 'getTickets'])->name('getTickets');
//ruta eliminar tickets
Route::delete('/ticket/{id}', [TicketTurnoController::class, 'destroy'])->name('ticket.destroy');
//vista para editar tickets
Route::get('/ticket/{id}/edit', [TicketTurnoController::class, 'edit'])->name('ticket.edit');
//ruta actualizar tickets
Route::put('/ticket/{id}', [TicketTurnoController::class, 'update'])->name('ticket.update');

Route::get('viewTicketTurno', [TicketTurnoController::class, 'index'])->name('viewTicketTurno');

// Ruta para el obtener el folio segun el municipio
Route::get('getFolioByMunicipio/{municipio}', [TicketTurnoController::class, 'getFolioSegunMunicipio'])->name('folioMunicipio');

// Ruta para generar pdf Ticket
Route::get("generarTicket/{id}", [TicketTurnoController::class, 'generarTicket'])->name('generarTicket');

Route::get('/graficas',[TicketTurnoController::class,'graficas'])->name('ticket.graficas');

Route::resources([
    'ticketTurno' => TicketTurnoController::class
]);


require __DIR__ . '/auth.php';
