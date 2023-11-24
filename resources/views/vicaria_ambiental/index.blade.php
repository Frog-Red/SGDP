<!-- resources/views/welcome.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>

    <h1>Vicaria ambiental</h1>

    <a href="{{ route('vicaria_ambiental.create') }}">
        <button>Add VICARIA_AMBIENTAL</button>
    </a>

    <table border="1">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Correo Electronico</th>
                <th>Nombre del Vicario</th>
                <th>Actions</th> <!-- Add a new column for actions -->
            </tr>
        </thead>
        <tbody>
            @foreach($vicaria_ambiental as $VICARIA_AMBIENTAL)
                <tr>
                    <td>{{ $VICARIA_AMBIENTAL->CodigoVicariaAmbiental }}</td>
                    <td>{{ $VICARIA_AMBIENTAL->NombreVicariaAmbiental }}</td>
                    <td>{{ $VICARIA_AMBIENTAL->DireccionVicariaAmbiental }}</td>
                    <td>{{ $VICARIA_AMBIENTAL->TelefonoVicariaAmbiental }}</td>
                    <td>{{ $VICARIA_AMBIENTAL->CorreoElectronicoVicariaAmbiental }}</td>
                    <td>{{ $VICARIA_AMBIENTAL->NombreVicario }}</td>

                    <td>
                        <form method="post" action="{{ route('vicaria_ambiental.destroy', $VICARIA_AMBIENTAL->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                            
                        <a href="{{ route('vicaria_ambiental.edit', $VICARIA_AMBIENTAL->id) }}">
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
