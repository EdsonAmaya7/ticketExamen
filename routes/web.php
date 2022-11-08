<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\TicketTurnoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\NivelController;

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
Route::get('/admin', [adminController::class, "index"])->middleware([
    'auth', 'verified'
])->name('admin.index');

Route::get('/niveles', [NivelController::class, "index"])->middleware([
    'auth', 'verified'
])->name('niveles.index');

//ruta que trae todos los tickets de la bd
Route::get('/getTickets', [TicketTurnoController::class, 'getTickets'])->name('getTickets');
//ruta eliminar tickets
Route::delete('/ticket/{id}', [TicketTurnoController::class, 'destroy'])->name('ticket.destroy');
//vista para editar tickets
Route::get('/ticket/{id}/edit', [TicketTurnoController::class, 'edit'])->name('ticket.edit');
//ruta actualizar tickets
Route::put('/ticket/{id}/{bandera?}', [TicketTurnoController::class, 'update'])->name('ticket.update');

Route::get('viewTicketTurno', [TicketTurnoController::class, 'index'])->name('viewTicketTurno');

// Ruta para el obtener el folio segun el municipio
Route::get('getFolioByMunicipio/{municipio}', [TicketTurnoController::class, 'getFolioSegunMunicipio'])->name('folioMunicipio');

// Ruta para generar pdf Ticket
Route::get("generarTicket/{id}", [TicketTurnoController::class, 'generarTicket'])->name('generarTicket');

Route::get('/graficas', [TicketTurnoController::class, 'graficas'])->name('ticket.graficas');

// Editar ticket del lado del usuario
Route::get('ticketFolioCurp/{folio}/{curp}', [TicketTurnoController::class, 'datosTicketUsuarios'])->name('datosTicketUsuarios');

// Vista de editar ticket del lado del usuario
Route::get('vistaTicketEditarUsuario', [TicketTurnoController::class, 'viewEditarTicketUsuario'])->name('vistaTicketEditarUsuario');


//NIVELES

//ruta que trae todos los LVL de la bd
Route::get('/getNiveles', [NivelController::class, 'getNiveles'])->name('getNiveles');
Route::get('/nivelCreate', [NivelController::class, 'create'])->name('niveles.create');

//ruta eliminar LVL
Route::delete('/niveles/{id}', [NivelController::class, 'destroy'])->name('niveles.destroy');
//vista para editar LVL
Route::get('/niveles/{id}/edit', [NivelController::class, 'edit'])->name('niveles.edit');
//ruta actualizar LVL
Route::put('/niveles/{id}', [NivelController::class, 'update'])->name('niveles.update');


//NIVELES



Route::get('/graficas',[TicketTurnoController::class,'graficas'])
->middleware([
    'auth', 'verified'
])->name('ticket.graficas');

Route::resources([
    'ticketTurno' => TicketTurnoController::class
]);


require __DIR__ . '/auth.php';
