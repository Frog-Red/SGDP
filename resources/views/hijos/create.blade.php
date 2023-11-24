<!-- resources/views/hijos/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Hijo</title>
</head>
<body>

    <h1>Create Hijo</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{ route('hijos.store') }}">
        @csrf

        <label for="RutDiáconoPadre">Rut Diácono Padre:</label>
        <input type="text" name="RutDiáconoPadre" value="{{ old('RutDiáconoPadre') }}" required>

        <label for="RutHijo">Rut Hijo:</label>
        <input type="text" name="RutHijo" value="{{ old('RutHijo') }}" required>

        <label for="SexoHijo">Sexo Hijo:</label>
        <input type="text" name="SexoHijo" value="{{ old('SexoHijo') }}" required>

        <label for="NombreHijo">Nombre Hijo:</label>
        <input type="text" name="NombreHijo" value="{{ old('NombreHijo') }}" required>

        <label for="FechaNacimientoHijo">Fecha de Nacimiento Hijo:</label>
        <input type="date" name="FechaNacimientoHijo" value="{{ old('FechaNacimientoHijo') }}" required>

        <button type="submit">Submit</button>
    </form>

</body>
</html>
