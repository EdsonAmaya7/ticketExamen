<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="">
        <table style="border: solid; width: 100%">
            <thead>
                <tr>
                    <th colspan="5">
                        <h1>Ticket de Turno</h1>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <h3 colspan="2">Folio:</h3>
                    </td>
                    <td>
                        <h3 colspan="2">{{ $folio }}</h3>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3 colspan="2">Nombre Completo: </h3>
                    </td>
                    <td>
                        <h3 colspan="2">{{ $nombreCompleto }}</h3>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3 colspan="2">CURP: </h3>
                    </td>
                    <td>
                        <h3 colspan="2">{{ $curp }}</h3>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3 colspan="2">Nombre: </h3>
                    </td>
                    <td>
                        <h3 colspan="2">{{ $nombre }}</h3>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3 colspan="2">Apellido Paterno: </h3>
                    </td>
                    <td>
                        <h3 colspan="2">{{ $paterno }}</h3>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3 colspan="2">Apellido Materno: </h3>
                    </td>
                    <td>
                        <h3 colspan="2">{{ $materno }}</h3>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3 colspan="2">Nivel que cursara:</h3>
                    </td>
                    <td>
                        <h3 colspan="2">{{ $nivel }}</h3>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3 colspan="2">Municipio: </h3>
                    </td>
                    <td>
                        <h3 colspan="2">{{ $municipio }}</h3>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3 colspan="2">Asunto a tratar: </h3>
                    </td>
                    <td>
                        <h3 colspan="2">{{ $asunto }}</h3>
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
