<!-- resources/views/tipo_evento/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Tipo Evento</title>
</head>
<body>

    <h1>Create Tipo Evento</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{ route('tipo_evento.store') }}">
        @csrf

        <label for="CodigoTipoEvento">Codigo Tipo Evento:</label>
        <input type="text" name="CodigoTipoEvento" value="{{ old('CodigoTipoEvento') }}" required>

        <label for="NombreTipoEvento">Nombre Tipo Evento:</label>
        <input type="text" name="NombreTipoEvento" value="{{ old('NombreTipoEvento') }}" required>

        <label for="DescripcionTipoEvento">Descripcion Tipo Evento:</label>
        <input type="text" name="DescripcionTipoEvento" value="{{ old('DescripcionTipoEvento') }}" required>

        <button type="submit">Submit</button>
    </form>

</body>
</html>
