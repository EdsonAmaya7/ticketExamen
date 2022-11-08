@extends('layouts.base_html')

@section('title')
Editar Ticket
@endsection

@section('content')

<div>
    @include("layouts.navigation")

    <form action="{{ route('ticket.update',$ticket->id) }}" method="POST" novalidate>
        @csrf
        @method("PUT")
        @include('formularioTicket.partials.form')

        <div class="d-flex justify-content-center mt-3">
            <button class="mb-3 boton btn btn-primary" style="color:black; background-color:greenyellow">Actualizar</button>
        </div>
    </form>
</div>

@endsection

@push("scripts")
<script>
    // Consumo de la api de municipios
    $.ajax({
        url: 'https://api.datos.gob.mx/v1/condiciones-atmosfericas',
        success: (data) => {
            data.results.forEach(municipio => {
                document.getElementById(
                    "municipio"
                ).innerHTML += `<option value="${municipio["name"]}">${municipio["name"]}</option>">`;
            });
        }
    })
</script>
@endpush