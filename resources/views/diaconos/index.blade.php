<!-- resources/views/welcome.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>

    <h1>Lista de Diaconos</h1>

    <a href="{{ route('diaconos.create') }}">
        <button>Add Diacono</button>
    </a>

    <table border="1">
        <thead>
            <tr>
                <th>Rut</th>
                <th>Nombre</th>
                <th>Estado de Vigencia</th>
                <th>Fecha de Nacimiento</th>
                <th>Fecha de Ordenacion</th>
                <th>Lugar de Ordenacion</th>
                <th>Nombre deObispo que Ordeno</th>
                <th>Profesion/Oficio</th>
                <th>Parroquia Asignada</th>
                <th>Vicaria Ambiental Asignada</th>
                <th>Direccion Particular</th>
                <th>Telefono Celular</th>
                <th>Telefono Fijo</th>
                <th>Correo Electronico</th>
                <th>Indicador Defuncion</th>
                <th>Fecha Defuncion</th>
                <th>Estado Civil</th>
                <th>Nombre Esposa</th>
                <th>Rut Esposa</th>
                <th>Fecha Nacimiento Esposa</th> 
                <th>Fecha Matrimonio</th>
                <th>Fecha Defuncion Esposa</th>               
                <th>Actions</th> <!-- Add a new column for actions -->
            </tr>
        </thead>
        <tbody>
            @foreach($diaconos as $DIACONO)
                <tr>
                    <td>{{ $DIACONO->Rut }}</td>
                    <td>{{ $DIACONO->Nombre }}</td>
                    <td>{{ $DIACONO->EstadoVigencia }}</td>
                    <td>{{ $DIACONO->FechaNacimiento }}</td>
                    <td>{{ $DIACONO->FechaOrdenacion }}</td>
                    <td>{{ $DIACONO->LugarOrdenacion }}</td>
                    <td>{{ $DIACONO->NombreObispoOrdeno }}</td>
                    <td>{{ $DIACONO->ProfesionOficio }}</td>
                    <td>{{ $DIACONO->ParroquiaAsignada }}</td>
                    <td>{{ $DIACONO->VicariaAmbientalAsignada }}</td>
                    <td>{{ $DIACONO->DireccionParticular }}</td>
                    <td>{{ $DIACONO->TelefonoCelular }}</td>
                    <td>{{ $DIACONO->TelefonoFijo }}</td>
                    <td>{{ $DIACONO->CorreoElectronico }}</td>
                    <td>{{ $DIACONO->IndicadorDefuncion }}</td>
                    <td>{{ $DIACONO->FechaDefuncion }}</td>
                    <td>{{ $DIACONO->EstadoCivil }}</td>
                    <td>{{ $DIACONO->NombreEsposa }}</td>
                    <td>{{ $DIACONO->RutEsposa }}</td>
                    <td>{{ $DIACONO->FechaNacimientoEsposa }}</td>
                    <td>{{ $DIACONO->FechaMatrimonio }}</td>
                    <td>{{ $DIACONO->FechaDefuncionEsposa }}</td>

                    <td>
                        <form method="post" action="{{ route('diaconos.destroy', $DIACONO->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                            
                        <a href="{{ route('diaconos.edit', $DIACONO->id) }}">
                            <button>Edit</button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
