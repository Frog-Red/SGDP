<!-- resources/views/welcome.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>

    <h1>Eventos</h1>

    <a href="{{ route('tipo_evento.create') }}">
        <button>Add TIPO_EVENTO</button>
    </a>

    <table border="1">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Nombre Evento</th>
                <th>Descripcion</th>
                <th>Actions</th> <!-- Add a new column for actions -->
            </tr>
        </thead>
        <tbody>
            @foreach($tipo_evento as $TIPO_EVENTO)
                <tr>
                    <td>{{ $TIPO_EVENTO->CodigoTipoEvento }}</td>
                    <td>{{ $TIPO_EVENTO->NombreTipoEvento }}</td>
                    <td>{{ $TIPO_EVENTO->DescripcionTipoEvento }}</td>

                    <td>
                        <form method="post" action="{{ route('tipo_evento.destroy', $TIPO_EVENTO->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                            
                        <a href="{{ route('tipo_evento.edit', $TIPO_EVENTO->id) }}">
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
