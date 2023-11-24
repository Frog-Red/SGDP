<!-- resources/views/vicaria_ambiental/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Vicaria Ambiental</title>
</head>
<body>

    <h1>Create Vicaria Ambiental</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{ route('vicaria_ambiental.store') }}">
        @csrf

        <label for="CodigoVicariaAmbiental">Codigo Vicaria Ambiental:</label>
        <input type="text" name="CodigoVicariaAmbiental" value="{{ old('CodigoVicariaAmbiental') }}" required>

        <label for="NombreVicariaAmbiental">Nombre Vicaria Ambiental:</label>
        <input type="text" name="NombreVicariaAmbiental" value="{{ old('NombreVicariaAmbiental') }}" required>

        <label for="DireccionVicariaAmbiental">Direccion Vicaria Ambiental:</label>
        <input type="text" name="DireccionVicariaAmbiental" value="{{ old('DireccionVicariaAmbiental') }}" required>

        <label for="TelefonoVicariaAmbiental">Telefono Vicaria Ambiental:</label>
        <input type="text" name="TelefonoVicariaAmbiental" value="{{ old('TelefonoVicariaAmbiental') }}" required>

        <label for="CorreoElectronicoVicariaAmbiental">Correo Electronico Vicaria Ambiental:</label>
        <input type="email" name="CorreoElectronicoVicariaAmbiental" value="{{ old('CorreoElectronicoVicariaAmbiental') }}" required>

        <label for="NombreVicario">Nombre del Vicario:</label>
        <input type="text" name="NombreVicario" value="{{ old('NombreVicario') }}" required>

        <button type="submit">Submit</button>
    </form>

</body>
</html>

