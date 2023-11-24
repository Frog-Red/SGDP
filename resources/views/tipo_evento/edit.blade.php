<!-- resources/views/tipo_evento/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tipo Evento</title>
</head>
<body>

    <h1>Edit Tipo Evento</h1>

    <form method="post" action="{{ route('tipo_evento.update', $tipo_evento->id) }}">
        @csrf
        @method('PUT')

        <label for="CodigoTipoEvento">Codigo Tipo Evento:</label>
        <input type="text" name="CodigoTipoEvento" value="{{ $tipo_evento->CodigoTipoEvento }}" required>

        <label for="NombreTipoEvento">Nombre Tipo Evento:</label>
        <input type="text" name="NombreTipoEvento" value="{{ $tipo_evento->NombreTipoEvento }}" required>

        <label for="DescripcionTipoEvento">Descripcion Tipo Evento:</label>
        <input type="text" name="DescripcionTipoEvento" value="{{ $tipo_evento->DescripcionTipoEvento }}" required>

        <button type="submit">Update</button>
    </form>

</body>
</html>
