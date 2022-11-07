<?php

namespace App\Http\Controllers;

use App\Http\Requests\ticketRequest;
use App\Models\ticekts;
use App\Models\TicketTurno;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables as DataTablesDataTables;
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
    public function store(Request $request)
    {
        //
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
}
