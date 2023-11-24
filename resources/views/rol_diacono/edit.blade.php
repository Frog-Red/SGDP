<!-- resources/views/rol_diacono/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Rol Diacono</title>
</head>
<body>

    <h1>Edit Rol Diacono</h1>

    <form method="post" action="{{ route('rol_diacono.update', $rol_diacono->id) }}">
        @csrf
        @method('PUT')

        <label for="RutDiacono">Rut Diacono:</label>
        <input type="text" name="RutDiacono" value="{{ $rol_diacono->RutDiacono }}" required>

        <label for="CodigoRol">Codigo Rol:</label>
        <input type="text" name="CodigoRol" value="{{ $rol_diacono->CodigoRol }}" required>

        <label for="FechaAsignacionRol">Fecha Asignacion Rol:</label>
        <input type="date" name="FechaAsignacionRol" value="{{ $rol_diacono->FechaAsignacionRol }}" required>

        <label for="ComentarioAsignacionRol">Comentarios:</label>
        <input type="text" name="ComentarioAsignacionRol" value="{{ $rol_diacono->ComentarioAsignacionRol }}" required>

        <label for="NombreAsignadorRol">Nombre Asignador del Rol:</label>
        <input type="text" name="NombreAsignadorRol" value="{{ $rol_diacono->NombreAsignadorRol }}" required>

        <label for="CodigoUsuarioRegistro">Codigo Usuario Registro:</label>
        <input type="text" name="CodigoUsuarioRegistro" value="{{ $rol_diacono->CodigoUsuarioRegistro }}" required>

        <button type="submit">Update</button>
    </form>

</body>
</html>

