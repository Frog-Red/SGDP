<!-- resources/views/hijos/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Hijo</title>
</head>
<body>

    <h1>Edit Hijo</h1>

    <form method="post" action="{{ route('hijos.update', $hijo->id) }}">
        @csrf
        @method('PUT')

        <label for="RutDiáconoPadre">Rut Diácono Padre:</label>
        <input type="text" name="RutDiáconoPadre" value="{{ $hijo->RutDiáconoPadre }}" required>

        <label for="RutHijo">Rut Hijo:</label>
        <input type="text" name="RutHijo" value="{{ $hijo->RutHijo }}" required>

        <label for="SexoHijo">Sexo Hijo:</label>
        <input type="text" name="SexoHijo" value="{{ $hijo->SexoHijo }}" required>

        <label for="NombreHijo">Nombre Hijo:</label>
        <input type="text" name="NombreHijo" value="{{ $hijo->NombreHijo }}" required>

        <label for="FechaNacimientoHijo">Fecha de Nacimiento Hijo:</label>
        <input type="date" name="FechaNacimientoHijo" value="{{ $hijo->FechaNacimientoHijo }}" required>

        <button type="submit">Update</button>
    </form>

</body>
</html>
