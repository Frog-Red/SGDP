<!-- resources/views/rol_pastoral/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Rol Pastoral</title>
</head>
<body>

    <h1>Create Rol Pastoral</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{ route('rol_pastoral.store') }}">
        @csrf

        <label for="CodigoRolPastoral">Codigo Rol Pastoral:</label>
        <input type="text" name="CodigoRolPastoral" value="{{ old('CodigoRolPastoral') }}" required>

        <label for="NombreRol">Nombre Rol:</label>
        <input type="text" name="NombreRol" value="{{ old('NombreRol') }}" required>

        <label for="DescripcionRol">Descripcion Rol:</label>
        <input type="text" name="DescripcionRol" value="{{ old('DescripcionRol') }}" required>

        <button type="submit">Submit</button>
    </form>

</body>
</html>
