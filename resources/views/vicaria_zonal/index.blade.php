<!-- resources/views/welcome.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>

    <h1>Vicaria Zonal</h1>

    <a href="{{ route('vicaria_zonal.create') }}">
        <button>Add vicaria zonal</button>
    </a>

    <table border="1">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Correo Electronico</th>
                <th>Nombre del Vicario Zonal</th>
                <th>Actions</th> <!-- Add a new column for actions -->
            </tr>
        </thead>
        <tbody>
            @foreach($vicaria_zonal as $VICARIA)
                <tr>
                    <td>{{ $VICARIA->CodigoVicariaZonal }}</td>
                    <td>{{ $VICARIA->NombreVicariaZonal }}</td>
                    <td>{{ $VICARIA->DireccionVicariaZonal }}</td>
                    <td>{{ $VICARIA->TelefonoVicariaZonal }}</td>
                    <td>{{ $VICARIA->CorreoElectronicoVicariaZonal }}</td>
                    <td>{{ $VICARIA->NombreVicarioZonal }}</td>

                    <td>
                        <form method="post" action="{{ route('vicaria_zonal.destroy', $VICARIA->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                            
                        <a href="{{ route('vicaria_zonal.edit', $VICARIA->id) }}">
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
