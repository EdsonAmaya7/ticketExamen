@extends('layouts.base_html')

{{-- Titulo --}}
@section('title')
    Ticket de Turno
@endsection

@section('content')
    <div class="container-fluid mt-5">
        <div class="card carta" style="width: 75%; margin: 12%; opacity: .9">
            <form id="form" method="post" id="formulario" style="margin: 2rem 2rem 2rem 2rem">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1>Ticket de turno</h1>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Folio:</label>
                            <input type="text" placeholder="Folio" class="form-control" id="folio" name="folio"
                                readonly>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nombre Completo de quien realizará el tramite:</label>
                            <input type="text" placeholder="Nombre Completo" class="form-control" id="nombre_completo"
                                name="nombre_completo">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">CURP:</label>
                            <input type="text" placeholder="CURP" class="form-control" id="curp" name="curp">
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Nombre:</label>
                            <input type="text" placeholder="Nombre" class="form-control" id="nombre" name="nombre">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Apellido Paterno:</label>
                            <input type="text" placeholder="Apellido Paterno" class="form-control" id="apellido_paterno"
                                name="apellido_paterno">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Apellido Materno:</label>
                            <input type="text" placeholder="Apellido Materno" class="form-control" id="apellido_materno"
                                name="apellido_materno">
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">¿Nivel que desea ingresar o que ya cursa el alumno?</label>
                            <select name="nivel_curso" id="nivel_curso" class="form-select">
                                <option value="">Seleccione una opción</option>
                                <option value="1">Preescolar</option>
                                <option value="2">Primaria</option>
                                <option value="3">Secundaria</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Municipio donde estudia el alumnos</label>
                            <select name="municipio" id="municipio" class="form-select">
                                <option value="">Seleccione una opción</option>
                                {{-- <option value="1">Saltillo</option>
                                <option value="2">Parras</option>
                                <option value="3">Secundaria</option> --}}
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Asunto que va a tratar</label>
                            <select name="asunto" id="asunto" class="form-select">
                                <option value="">Seleccione una opción</option>
                                <option value="1">Asunto 1</option>
                                <option value="2">Asunto 2</option>
                                <option value="3">Asunto 3</option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row mt-3">
                <div class="col-md-12 text-center mb-3">
                    <button style="border-radius: 5px; width: 15%;" class="btn-primary" type="button">Generar</button>
                </div>
            </div>
        </div>
    </div>
@endsection
