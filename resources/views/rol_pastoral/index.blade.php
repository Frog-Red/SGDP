<!-- resources/views/welcome.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>

    <h1>Roles Pastorales</h1>

    <a href="{{ route('rol_pastoral.create') }}">
        <button>Add ROL_PASTORAL</button>
    </a>

    <table border="1">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Descripcion del Rol</th>
                <th>Actions</th> <!-- Add a new column for actions -->
            </tr>
        </thead>
        <tbody>
            @foreach($rol_pastoral as $ROL_PASTORAL)
                <tr>
                    <td>{{ $ROL_PASTORAL->CodigoRolPastoral }}</td>
                    <td>{{ $ROL_PASTORAL->NombreRol}}</td>
                    <td>{{ $ROL_PASTORAL->DescripcionRol}}</td>

                    <td>
                        <form method="post" action="{{ route('rol_pastoral.destroy', $ROL_PASTORAL->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                            
                        <a href="{{ route('rol_pastoral.edit', $ROL_PASTORAL->id) }}">
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