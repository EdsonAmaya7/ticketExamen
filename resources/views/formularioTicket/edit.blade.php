@extends('layouts.base_html')

@section('title')
Editar Ticket
@endsection

@section('content')

<div>
    <h2>Editar Ticket</h2>
    <a href="{{ route('admin.index')}}" class="btn boton-recicladora pt-5 ms-2 p-2 mt-4 ">
        <i class="fas fa-angle-double-left"></i></a>
    <form action="{{ route('ticket.update',$ticket->id) }}" method="POST" novalidate>
        @csrf
        @method("PUT")
        @include('formularioTicket.partials.form')

        <div class="d-flex justify-content-end mt-3 mtb-3">
            <button class="mb-3 boton">Actualizar</button>
        </div>
    </form>
</div>

@endsection