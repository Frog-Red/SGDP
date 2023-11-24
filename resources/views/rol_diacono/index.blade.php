<!-- resources/views/welcome.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>

    <h1>Roles de los Diaconos</h1>

    <a href="{{ route('rol_diacono.create') }}">
        <button>Add rol diacono</button>
    </a>

    <table border="1">
        <thead>
            <tr>
                <th>Rut Diacono</th>
                <th>Codigo Rol</th>
                <th>Fecha asignacion</th>
                <th>Comentarios</th>
                <th>Nombre asignador del rol</th>
                <th>Codigo del usuario registro</th>
                <th>Actions</th> <!-- Add a new column for actions -->
            </tr>
        </thead>
        <tbody>
            @foreach($rol_diacono as $ROL_DIACONO)
                <tr>
                    <td>{{ $ROL_DIACONO->RutDiacono }}</td>
                    <td>{{ $ROL_DIACONO->CodigoRol }}</td>
                    <td>{{ $ROL_DIACONO->FechaAsignacionRol }}</td>
                    <td>{{ $ROL_DIACONO->ComentarioAsignacionRol }}</td>
                    <td>{{ $ROL_DIACONO->NombreAsignadorRol }}</td>
                    <td>{{ $ROL_DIACONO->CodigoUsuarioRegistro }}</td>


                    <td>
                        <form method="post" action="{{ route('rol_diacono.destroy', $ROL_DIACONO->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                            
                        <a href="{{ route('rol_diacono.edit', $ROL_DIACONO->id) }}">
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