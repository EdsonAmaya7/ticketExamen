<div class="container-fluid mt-5">
    <div class="card carta" style="width: 50%; margin: 12% 25%; opacity: .9">

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
                    value="{{ old('folio',optional($ticket ?? null)->folio) }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">status</label>
                    <input type="text" placeholder="status" class="form-control" id="status" name="status"
                    value="{{ old('status',optional($ticket ?? null)->status) }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">nombreTramite</label>
                    <input type="text" placeholder="nombre del tramite" class="form-control" id="nombreTramite" name="nombreTramite"
                    value="{{ old('nombreTramite',optional($ticket ?? null)->nombreTramite) }}">
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">CURP:</label>
                    <input type="text" placeholder="CURP" class="form-control" id="curp" name="curp"
                    value="{{ old('curp',optional($ticket ?? null)->curp) }}">
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Nombre:</label>
                    <input type="text" placeholder="Nombre" class="form-control" id="nombre" name="nombre"
                    value="{{ old('nombre',optional($ticket ?? null)->nombre) }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Apellido Paterno:</label>
                    <input type="text" placeholder="Apellido Paterno" class="form-control" id="paterno" name="paterno"
                    value="{{ old('paterno',optional($ticket ?? null)->paterno) }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Apellido Materno:</label>
                    <input type="text" placeholder="Apellido Materno" class="form-control" id="materno" name="materno"
                    value="{{ old('materno',optional($ticket ?? null)->materno) }}">
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">¿Nivel que cursa o cursará?</label>
                    <select name="nivelIngresar" id="nivelIngresar" class="form-select"
                    value="{{ old('nivelIngresar',optional($ticket ?? null)->nivelIngresar) }}">
                        <option @isset($ticket) {{ $ticket->nivelIngresar == "Preescolar" ? 'selected' : '' }} @endisset
                        value="Preescolar">Preescolar</option>
                        <option @isset($ticket) {{ $ticket->nivelIngresar == "Primaria" ? 'selected' : '' }} @endisset
                        value="Primaria">Primaria</option>
                        <option @isset($ticket) {{ $ticket->nivelIngresar == "Secundaria" ? 'selected' : '' }} @endisset
                        value="Secundaria">Secundaria</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Municipio donde estudia el alumnos</label>
                    <select name="municipio" id="municipio" class="form-select">
                        <option value="">Seleccione una opción</option>
                        <option value="1">Saltillo</option>
                        <option value="2">Parras</option>
                        <option value="3">Secundaria</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Asunto que va a tratar</label>
                    <input type="text" placeholder="asunto" class="form-control" id="asunto" name="asunto"
                    value="{{ old('asunto',optional($ticket ?? null)->asunto) }}">

                </div>
            </div>
        </div>
    </div>
</div>