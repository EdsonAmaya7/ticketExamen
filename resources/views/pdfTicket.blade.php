<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ticket de Turno</title>
</head>

<body style="background-color:whitesmoke; font-family:sans-serif; border: solid;border-width:1px; border-radius:5px; border-color:darkblue">
    <div style="padding:20px">
        <table style=" width: 100%">
            <thead>
                <tr>
                    <th colspan="5">
                        <h1 style="font-weight: bold; font-family:sans-serif;color:black;">Ticket de Turno</h1>
                        <h4 style="font-weight: bold; font-family:sans-serif;">Registro exitoso {{ $fecha }}</h4>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <h3 colspan="2" style="font-weight:bold; line-height:1px; margin-top:20px">Folio:</h3>
                    </td>
                    <td>
                        <h3 colspan="2" style="color:darkblue; line-height:1px">{{ $folio }}</h3>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3 colspan="2" style="font-weight:bold; line-height:1px">Nombre Completo: </h3>
                    </td>
                    <td>
                        <h3 colspan="2" style="color:darkblue; line-height:1px">{{ $nombreCompleto }}</h3>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3 colspan="2" style="font-weight:bold; line-height:1px">CURP: </h3>
                    </td>
                    <td>
                        <h3 colspan="2" style="color:darkblue; line-height:1px">{{ $curp }}</h3>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3 colspan="2" style="font-weight:bold; line-height:1px">Nombre: </h3>
                    </td>
                    <td>
                        <h3 colspan="2" style="color:darkblue; line-height:1px">{{ $nombre }}</h3>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3 colspan="2" style="font-weight:bold; line-height:1px">Apellido Paterno: </h3>
                    </td>
                    <td>
                        <h3 colspan="2" style="color:darkblue; line-height:1px">{{ $paterno }}</h3>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3 colspan="2" style="font-weight:bold; line-height:1px">Apellido Materno: </h3>
                    </td>
                    <td>
                        <h3 colspan="2" style="color:darkblue; line-height:1px">{{ $materno }}</h3>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3 colspan="2" style="font-weight:bold; line-height:1px">Nivel que cursara:</h3>
                    </td>
                    <td>
                        <h3 colspan="2" style="color:darkblue; line-height:1px">{{ $nivel }}</h3>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3 colspan="2" style="font-weight:bold; line-height:1px">Municipio: </h3>
                    </td>
                    <td>
                        <h3 colspan="2" style="color:darkblue; line-height:1px">{{ $municipio }}</h3>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3 colspan="2" style="font-weight:bold; line-height:1px">Asunto a tratar: </h3>
                    </td>
                    <td>
                        <h3 colspan="2" style="color:darkblue; line-height:1px">{{ $asunto }}</h3>
                    </td>
                </tr>
            </tbody>
        </table>
        <div>
            {{-- {{ $qr }} --}}
        </div>
    </div>

</body>

</html>
