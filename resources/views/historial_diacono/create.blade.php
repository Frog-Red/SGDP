<!-- resources/views/historial_diacono/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Historial Diacono</title>
</head>
<body>

    <h1>Create Historial Diacono</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{ route('historial_diacono.store') }}">
        @csrf

        <label for="RutDiacono">Rut de Diacono:</label>
        <input type="text" name="RutDiacono" value="{{ old('RutDiacono') }}" required>

        <label for="NumeroSecuenciaEvento">Numero de Secuencia del Evento:</label>
        <input type="text" name="NumeroSecuenciaEvento" value="{{ old('NumeroSecuenciaEvento') }}" required>

        <label for="CodigoTipoEvento">Codigo del Evento:</label>
        <input type="text" name="CodigoTipoEvento" value="{{ old('CodigoTipoEvento') }}" required>

        <label for="FechaEvento">Fecha del Evento:</label>
        <input type="date" name="FechaEvento" value="{{ old('FechaEvento') }}" required>

        <label for="ComentariosEvento">Comentarios:</label>
        <input type="text" name="ComentariosEvento" value="{{ old('ComentariosEvento') }}" required>

        <label for="CodigoUsuarioRegistro">Codigo de Usuario Registro:</label>
        <input type="text" name="CodigoUsuarioRegistro" value="{{ old('CodigoUsuarioRegistro') }}" required>

        <button type="submit">Submit</button>
    </form>

</body>
</html>
