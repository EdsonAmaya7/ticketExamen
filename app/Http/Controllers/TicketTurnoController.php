<?php

namespace App\Http\Controllers;

use App\Models\TicketTurno;
use Illuminate\Http\Request;

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
    public function edit(TicketTurno $ticketTurno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TicketTurno  $ticketTurno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TicketTurno $ticketTurno)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TicketTurno  $ticketTurno
     * @return \Illuminate\Http\Response
     */
    public function destroy(TicketTurno $ticketTurno)
    {
        //
    }
}
