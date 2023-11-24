<!-- resources/views/welcome.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>

    <h1>Parroquias</h1>

    <a href="{{ route('parroquia.create') }}">
        <button>Add Parroquias</button>
    </a>

    <table border="1">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Correo Electronico</th>
                <th>Vicaria Zonal</th>
                <th>Nombre del Parroco</th>
                <th>Actions</th> <!-- Add a new column for actions -->
            </tr>
        </thead>
        <tbody>
            @foreach($parroquia as $PARROQUIA)
                <tr>
                    <td>{{ $PARROQUIA->CodigoParroquia }}</td>
                    <td>{{ $PARROQUIA->NombreParroquia }}</td>
                    <td>{{ $PARROQUIA->DireccionParroquia }}</td>
                    <td>{{ $PARROQUIA->TelefonoParroquia }}</td>
                    <td>{{ $PARROQUIA->CorreoElectronicoParroquia }}</td>
                    <td>{{ $PARROQUIA->VicariaZonalPertenece }}</td>
                    <td>{{ $PARROQUIA->NombreParroco }}</td>


                    <td>
                        <form method="post" action="{{ route('parroquia.destroy', $PARROQUIA->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                            
                        <a href="{{ route('parroquia.edit', $PARROQUIA->id) }}">
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
