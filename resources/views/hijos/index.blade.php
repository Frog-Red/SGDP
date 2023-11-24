<!-- resources/views/welcome.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>

    <h1>Lista de Hijos</h1>

    <a href="{{ route('hijos.create') }}">
        <button>Add hijos</button>
    </a>

    <table border="1">
        <thead>
            <tr>
                <th>Rut Diacono padre</th>
                <th>Rut Hijo</th>
                <th>sexo</th>
                <th>Nombre</th>
                <th>fecha nacimiento</th>
                <th>Actions</th> <!-- Add a new column for actions -->
            </tr>
        </thead>
        <tbody>
            @foreach($hijos as $HIJOS)
                <tr>
                    <td>{{ $HIJOS->RutDiáconoPadre }}</td>
                    <td>{{ $HIJOS->RutHijo }}</td>
                    <td>{{ $HIJOS->SexoHijo }}</td>
                    <td>{{ $HIJOS->NombreHijo }}</td>
                    <td>{{ $HIJOS->FechaNacimientoHijo }}</td>

                    <td>
                        <form method="post" action="{{ route('hijos.destroy', $HIJOS->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                            
                        <a href="{{ route('hijos.edit', $HIJOS->id) }}">
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