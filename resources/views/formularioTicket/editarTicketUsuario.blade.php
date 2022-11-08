@extends('layouts.base_html')

{{-- Titulo --}}
@section('title')
    Ticket de Turno
@endsection

@section('content')
    @include('layouts.navigation')
    <div class="container-fluid p-5">
        <div class="card carta" style=" padding:5%; opacity: .9">
            <form id="formulario" style="margin: 2rem 2rem 2rem 2rem">
                @csrf
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1 class="titulochido">Editar Ticket de turno</h1>
                    </div>
                </div>
                <input type="text" id="id" hidden>
                <input type="text" name="status" id="status" hidden>
                <div class="row mt-2">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Folio:</label>
                            <input oninput="datos()" type="text" placeholder="Folio" class="form-control" id="folio"
                                name="folio">
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nombre Completo de quien realizará el tramite:</label>
                            <input type="text" placeholder="Nombre Completo" class="form-control" id="nombreTramite"
                                name="nombreTramite">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">CURP:</label>
                            <input oninput="datos()" type="text" placeholder="CURP" class="form-control" id="curp"
                                name="curp">
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
                            <input type="text" placeholder="Apellido Paterno" class="form-control" id="paterno"
                                name="paterno">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Apellido Materno:</label>
                            <input type="text" placeholder="Apellido Materno" class="form-control" id="materno"
                                name="materno">
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">¿Nivel que cursa o cursará?</label>
                            <select name="nivelIngresar_id" id="nivelIngresar_id" class="form-select">
                                <option value="">Seleccione una opción</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Municipio donde estudia el alumnos</label>
                            <select name="municipio" id="municipio" class="form-select" onchange="asignaFolio()">
                                <option value="">Seleccione una opción</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Asunto que va a tratar</label>
                            <input name="asunto" id="asunto" class="form-control">
                        </div>
                    </div>
            </form>
            <div class="row mt-3">
                <div class="col-md-12 text-center mb-3">
                    <button id="editar_ticket" class="btn btn-primary" type="button"
                        style="background-color:greenyellow !important; color:black ;">Editar</button>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- Script --}}
@push('scripts')
    <script>
        window.CSRF_TOKEN = '{{ csrf_token() }}';
    </script>
    <script src="{{ asset('js/editarTicket.js') }}"></script>
@endpush
