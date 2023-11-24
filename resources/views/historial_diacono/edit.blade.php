<!-- resources/views/historial_diacono/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Historial Diacono</title>
</head>
<body>

    <h1>Edit Historial Diacono</h1>

    <form method="post" action="{{ route('historial_diacono.update', $historial_diacono->id) }}">
        @csrf
        @method('PUT')

        <label for="RutDiacono">Rut de Diacono:</label>
        <input type="text" name="RutDiacono" value="{{ $historial_diacono->RutDiacono }}" required>

        <label for="NumeroSecuenciaEvento">Numero de Secuencia del Evento:</label>
        <input type="text" name="NumeroSecuenciaEvento" value="{{ $historial_diacono->NumeroSecuenciaEvento }}" required>

        <label for="CodigoTipoEvento">Codigo del Evento:</label>
        <input type="text" name="CodigoTipoEvento" value="{{ $historial_diacono->CodigoTipoEvento }}" required>

        <label for="FechaEvento">Fecha del Evento:</label>
        <input type="date" name="FechaEvento" value="{{ $historial_diacono->FechaEvento }}" required>

        <label for="ComentariosEvento">Comentarios:</label>
        <input type="text" name="ComentariosEvento" value="{{ $historial_diacono->ComentariosEvento }}" required>

        <label for="CodigoUsuarioRegistro">Codigo de Usuario Registro:</label>
        <input type="text" name="CodigoUsuarioRegistro" value="{{ $historial_diacono->CodigoUsuarioRegistro }}" required>

        <button type="submit">Update</button>
    </form>

</body>
</html>

