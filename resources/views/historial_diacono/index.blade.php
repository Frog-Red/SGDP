<!-- resources/views/welcome.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>

    <h1>Historial de diaconos</h1>

    <a href="{{ route('historial_diacono.create') }}">
        <button>Add Historial</button>
    </a>

    <table border="1">
        <thead>
            <tr>
                <th>Rut de Diacono</th>
                <th>Numero de Secuencia del Evento</th>
                <th>Codigo del Evento</th>
                <th>Fecha del Evento</th>
                <th>Comentarios</th>
                <th>Codigo de Usuario Registro</th>
                <th>Actions</th> <!-- Add a new column for actions -->
            </tr>
        </thead>
        <tbody>
            @foreach($historial_diacono as $HISTORIAL_DIACONO)
                <tr>
                    <td>{{ $HISTORIAL_DIACONO->RutDiacono }}</td>
                    <td>{{ $HISTORIAL_DIACONO->NumeroSecuenciaEvento }}</td>
                    <td>{{ $HISTORIAL_DIACONO->CodigoTipoEvento }}</td>
                    <td>{{ $HISTORIAL_DIACONO->FechaEvento }}</td>
                    <td>{{ $HISTORIAL_DIACONO->ComentariosEvento}}</td>
                    <td>{{ $HISTORIAL_DIACONO->CodigoUsuarioRegistro }}</td>


                    <td>
                        <form method="post" action="{{ route('historial_diacono.destroy', $HISTORIAL_DIACONO->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                            
                        <a href="{{ route('historial_diacono.edit', $HISTORIAL_DIACONO->id) }}">
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
