<?php

namespace App\Http\Controllers;

use App\Http\Requests\NivelRequest;
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NivelRequest $request)
    {
        $validated = $request->validated();
        $nivel = nivel::create($validated);
        return response()->json($nivel);
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\nivel  $nivel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $nivel = nivel::where('id', $id)->first();
        $nivel->fill($request->all());
        $nivel->save();
        return response()->json($nivel);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\nivel  $nivel
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $nivel = nivel::where('id', $id);
        $nivel->delete();
        return response()->json($nivel);
    }

    // Metodo para traer todos los niveles
    public function getNiveles()
    {
        $data = nivel::all();
        return Datatables()->of($data)->make(true);
    }

    // Metodo que trae los niveles segun el id
    public function getNivelById($id)
    {
        $data = nivel::where('id', $id)->first();
        return response()->json($data->nivelIngresar);
    }
}
