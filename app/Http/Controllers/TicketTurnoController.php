<?php

namespace App\Http\Controllers;

use App\Models\ticekts;
use App\Models\TicketTurno;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ticketRequest;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
// use Yajra\DataTables\Facades\DataTables;

class TicketTurnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('formularioTicket.ticket');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ticketRequest $request)
    {
        $validated = $request->validated();
        $ticket = TicketTurno::create($validated);
        return response()->json($ticket);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TicketTurno  $ticketTurno
     * @return \Illuminate\Http\Response
     */
    public function show(TicketTurno $ticketTurno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TicketTurno  $ticketTurno
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        // dd($id);
        $ticket = ticekts::findOrFail($id);
        // dd($ticket);
        return view('formularioTicket.edit', compact("ticket"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TicketTurno  $ticketTurno
     * @return \Illuminate\Http\Response
     */
    public function update(ticketRequest $request, int $id, int $bandera = 0)
    {
        //
        // dd($request->all());
        $ticket = ticekts::findOrFail($id);
        $validated = $request->validated();

        $ticket->fill($validated);
        $ticket->save();

        if ($bandera == 1) {
            return response()->json($ticket);
        } else {
            return redirect()->route('admin.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TicketTurno  $ticketTurno
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        //
        $ticket = ticekts::find($id)->delete();
        return response()->json($ticket);
    }

    public function getTickets()
    {
        $data = ticekts::all();
        return  DataTables()->of($data)->make(true);
    }

    // Obtener el folio de cada municipio
    public function getFolioSegunMunicipio($municipio)
    {
        $data = DB::select("
        SELECT COUNT(*) numeroFolio
        FROM ticekts
        WHERE municipio = '$municipio'");

        return response()->json($data);
    }

    // Metodo que trae los datos para generar el ticket
    public function generarTicket($id)
    {
        $data = ticekts::find($id);

        // Nombre del Archivo
        $nombreArchivo = 'Ticket-' . $data['folio'] . '-' . $data['nombreTramite'] . '.pdf';

        $qr = QrCode::size(150)->generate("http://192.168.88.185/examenParcial2/public/generarTicket/" . $data['id']);

        // dd($qr);
        // $qrcode = new Generator;
        // $qrcode->size(500)->generate($data['curp']);

        // dd($qrcode);

        date_default_timezone_set('America/Mexico_City');
        $fecha = Carbon::now();
        $dia = $fecha->day;
        // $mes = $fecha->locale();
        $mesNombre = ucfirst($fecha->monthName);
        $anio = $fecha->year;
        $horas = $fecha->format('h:i:s');

        $dompdf = Pdf::loadView("pdfTicket", [
            "fecha" => $fecha,
            "folio" => $data['folio'],
            "nombreCompleto" => $data['nombreTramite'],
            "curp" => $data['curp'],
            "nombre" => $data['nombre'],
            "materno" => $data['materno'],
            "paterno" => $data['paterno'],
            "nivel" => $data['nivelIngresar'],
            "municipio" => $data['municipio'],
            "asunto" => $data['asunto'],
            "dia" => $dia,
            "mesNombre" => $mesNombre,
            "horas" => $horas,
            "anio" => $anio,
            "qr" => $qr
        ])->save("../public/docs/{$nombreArchivo}");



        return $dompdf->stream($nombreArchivo);

        // return $dompdf->download($nombreArchivo);
    }

    public function graficas()
    {
        $ticket = ticekts::all('municipio', 'status');
        return view('formularioTicket.graficas', compact('ticket'));
    }

    // Metodo para editar el ticket
    public function datosTicketUsuarios($folio, $curp)
    {
        $data = ticekts::where("folio", $folio)->where("curp", $curp)->get();

        return response()->json($data);
    }

    public function viewEditarTicketUsuario()
    {
        return view('formularioTicket.editarTicketUsuario');
    }
}
