@extends('layouts.base_html')

{{-- Titulo --}}
@section('title')
    Ticket de Turno
@endsection

@section('content')
    <div>
        @include('layouts.navigation')
        <h1 class="text-center m-5 admintitulo">CATÁLOGO DE NIVELES</h1>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <button id="agregar" class="btn btn-success">Agregar</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="niveles" class="table table-striped table-bordered table-hover">
                            <thead>
                                <th>ID</th>
                                <th>Nivel Ingresar</th>
                                <th>Accion</th>
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

@push('scripts')
    <script>
        window.CSRF_TOKEN = '{{ csrf_token() }}';
    </script>
    <script src="{{ asset('js/administrador/niveles.js') }}" defer></script>
@endpush
