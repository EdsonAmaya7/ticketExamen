@extends('layouts.base_html')

{{-- Titulo --}}
@section('title')
Ticket de Turno
@endsection

@section('content')
@include('layouts.navigation')
<div class="container-fluid">
    <div class="card" style="width: 50%; margin: 12% 25%; opacity: .9">
        <input hidden type="text" id="ticket" name="ticket" value="{{ $ticket }}">
        <div style="width: 30rem; height: 30rem" class="p-4">
            <h3 class="text-center fs-4">Tickets</h3>
            <canvas id="cantidadTickets" style="width: inherit; height: inherit;"></canvas>
        </div>
    </div>
    <div class="card" style="width: 50%; margin: 12% 25%; opacity: .9">
        <div style="width: 30rem; height: 30rem" class="p-4">
            <h3 class="text-center fs-4"> Tickets por minicipio </h3>
            <select name="municipios" id="municipios" onchange="selectMunicipio()">
                <option value="" selected hidden disabled="">--seleccionar--</option>
                @foreach ($ticket as $value)
                <option value="{{ $value->municipio }}">{{ $value->municipio }}</option>
                @endforeach
            </select>
            <canvas id="municipioEstado" style="width: inherit; height: inherit;"></canvas>
        </div>
    </div>
</div>
</div>
@endsection

{{-- Script --}}
@push('scripts')
<script src="{{ asset('js/graficas/char.js') }}"></script>
<script src="{{ asset('js/graficas/index.js') }}"></script>
@endpush