<!-- resources/views/rol_pastoral/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Rol Pastoral</title>
</head>
<body>

    <h1>Edit Rol Pastoral</h1>

    <form method="post" action="{{ route('rol_pastoral.update', $rol_pastoral->id) }}">
        @csrf
        @method('PUT')

        <label for="CodigoRolPastoral">Codigo Rol Pastoral:</label>
        <input type="text" name="CodigoRolPastoral" value="{{ $rol_pastoral->CodigoRolPastoral }}" required>

        <label for="NombreRol">Nombre Rol:</label>
        <input type="text" name="NombreRol" value="{{ $rol_pastoral->NombreRol }}" required>

        <label for="DescripcionRol">Descripcion Rol:</label>
        <input type="text" name="DescripcionRol" value="{{ $rol_pastoral->DescripcionRol }}" required>

        <button type="submit">Update</button>
    </form>

</body>
</html>

