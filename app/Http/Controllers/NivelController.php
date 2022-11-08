<?php

namespace App\Http\Controllers;

use App\Http\Requests\nivelesRequest;
use App\Models\nivel;
use Illuminate\Http\Request;

class NivelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('formularioTicket.niveles');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("cNiveles.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(nivelesRequest $request)
    {
        $validated = $request->validated();
        $ticket = nivel::create($validated);
        return response()->json($ticket);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\nivel  $nivel
     * @return \Illuminate\Http\Response
     */
    public function show(nivel $nivel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\nivel  $nivel
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        // dd($id);
        $ticket = nivel::findOrFail($id);
        // dd($ticket);
        return view('formularioTicket.edit', compact("ticket"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\nivel  $nivel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, nivel $nivel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\nivel  $nivel
     * @return \Illuminate\Http\Response
     */
    public function destroy(nivel $nivel)
    {
        //
    }
}
