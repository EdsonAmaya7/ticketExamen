@extends('layouts.base_html')

{{-- Titulo --}}
@section('title')
    Login
@endsection

@section('content')
    <div class="container-fluid mt-5 text-center">
        <div class="card carta" style="width: 75%; margin: 12%">
            <form id="login" style="margin: 2rem 2rem 2rem 2rem">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Login</h1>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <input class="form-control" type="text" id="userName" name="userName" placeholder="Username"
                            required="required" />
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <input class="form-control" type="password" id="password" name="password" placeholder="Password"
                            required="required" />
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-block btn-large">Iniciar Sesion</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
