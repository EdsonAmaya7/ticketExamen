<?php

namespace App\Http\Controllers;

use App\Models\ticekts;
use App\Models\TicketTurno;
use Illuminate\Http\Request;
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
    public function update(ticketRequest $request, int $id)
    {
        //
        // dd($request->all());
        $ticket = ticekts::findOrFail($id);
        $validated = $request->validated();

        $ticket->fill($validated);
        $ticket->save();

        return redirect()->route('admin.index');
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
        $data = ticekts::where('id', $id)->get();

        // Nombre del Archivo
        $nombreArchivo = 'Ticket-' . $data[0]['folio'] . '-' . $data[0]['nombreTramite'] . '.pdf';

        $qr = QrCode::generate("Hola");

        // dd($qr);
        // $qrcode = new Generator;
        // $qrcode->size(500)->generate($data[0]['curp']);

        // dd($qrcode);

        $dompdf = Pdf::loadView("pdfTicket", [
            "folio" => $data[0]['folio'],
            "nombreCompleto" => $data[0]['nombreTramite'],
            "curp" => $data[0]['curp'],
            "nombre" => $data[0]['nombre'],
            "materno" => $data[0]['materno'],
            "paterno" => $data[0]['paterno'],
            "nivel" => $data[0]['nivelIngresar'],
            "municipio" => $data[0]['municipio'],
            "asunto" => $data[0]['asunto'],
            "qr" => $qr
        ])->save("../public/docs/{$nombreArchivo}");

        return $dompdf->download($nombreArchivo);
    }
}
