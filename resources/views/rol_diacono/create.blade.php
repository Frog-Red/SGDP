<!-- resources/views/rol_diacono/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Rol Diacono</title>
</head>
<body>

    <h1>Create Rol Diacono</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{ route('rol_diacono.store') }}">
        @csrf

        <label for="RutDiacono">Rut Diacono:</label>
        <input type="text" name="RutDiacono" value="{{ old('RutDiacono') }}" required>

        <label for="CodigoRol">Codigo Rol:</label>
        <input type="text" name="CodigoRol" value="{{ old('CodigoRol') }}" required>

        <label for="FechaAsignacionRol">Fecha Asignacion Rol:</label>
        <input type="date" name="FechaAsignacionRol" value="{{ old('FechaAsignacionRol') }}" required>

        <label for="ComentarioAsignacionRol">Comentarios:</label>
        <input type="text" name="ComentarioAsignacionRol" value="{{ old('ComentarioAsignacionRol') }}" required>

        <label for="NombreAsignadorRol">Nombre Asignador del Rol:</label>
        <input type="text" name="NombreAsignadorRol" value="{{ old('NombreAsignadorRol') }}" required>

        <label for="CodigoUsuarioRegistro">Codigo Usuario Registro:</label>
        <input type="text" name="CodigoUsuarioRegistro" value="{{ old('CodigoUsuarioRegistro') }}" required>

        <button type="submit">Submit</button>
    </form>

</body>
</html>

