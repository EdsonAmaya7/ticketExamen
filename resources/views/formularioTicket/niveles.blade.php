@extends('layouts.base_html')

{{-- Titulo --}}
@section('title')
Ticket de Turno
@endsection

@section('content')


<div>
@include('layouts.navigation')
    <h1 class="text-center m-5">CATÁLOGO DE NIVELES</h1>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <a href="" class="d-bloke boton  pt-5 pb-3 mb-5">Agregar</a>


                <div class="card-body">
                    <table id="adminControl" style="width:100%;text-align:center">
                        <thead>
                            <th>ID</th>
                            <th>Nivel Ingresar</th>
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