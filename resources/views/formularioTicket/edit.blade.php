@extends('layouts.base_html')

@section('title')
Editar Ticket
@endsection

@section('content')

<div>
    <h2 style="color:white; text-align:center">Pantalla de Administradores para editar ticket</h2>
    <a href="{{ route('admin.index')}}" class="btn boton-recicladora pt-5 ms-2 p-2 mt-4 ">
        <i class="fas fa-angle-double-left" style="color:red"></i>Regresar</a>
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