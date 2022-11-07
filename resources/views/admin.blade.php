@extends('layouts.base_html')

{{-- Titulo --}}
@section('title')
    Ticket de Turno
@endsection

@section('content')


<div>
    @include('layouts.navigation')
    <h1 class="text-center m-5">PESTAÑA PARA ADMINISTRADORES</h1>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Tabla de Tickets</div>

                <div class="card-body">
                    <table style="width:100%">
                        <thead>
                            <th>Folio</th>
                            <th>Nombre Tramite</th>
                            <th>Nombre</th>
                            <th>Paterno</th>
                            <th>Materno</th>
                            <th>Nivel Ingresar</th>
                            <th>Municipio</th>
                            <th>Asunto</th>
                            <th>Status</th>
                            <th><a name="" id="" class="btn btn-primary" href="#" role="button">Editar</a></th>                                   
                        </thead>
                        <tbody> 
                          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection