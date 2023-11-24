<!-- resources/views/vicaria_zonal/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Vicaria Zonal</title>
</head>
<body>

    <h1>Create Vicaria Zonal</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{ route('vicaria_zonal.store') }}">
        @csrf

        <label for="CodigoVicariaZonal">Codigo Vicaria Zonal:</label>
        <input type="text" name="CodigoVicariaZonal" value="{{ old('CodigoVicariaZonal') }}" required>

        <label for="NombreVicariaZonal">Nombre Vicaria Zonal:</label>
        <input type="text" name="NombreVicariaZonal" value="{{ old('NombreVicariaZonal') }}" required>

        <label for="DireccionVicariaZonal">Direccion Vicaria Zonal:</label>
        <input type="text" name="DireccionVicariaZonal" value="{{ old('DireccionVicariaZonal') }}" required>

        <label for="TelefonoVicariaZonal">Telefono Vicaria Zonal:</label>
        <input type="text" name="TelefonoVicariaZonal" value="{{ old('TelefonoVicariaZonal') }}" required>

        <label for="CorreoElectronicoVicariaZonal">Correo Electronico Vicaria Zonal:</label>
        <input type="email" name="CorreoElectronicoVicariaZonal" value="{{ old('CorreoElectronicoVicariaZonal') }}" required>

        <label for="NombreVicarioZonal">Nombre del Vicario Zonal:</label>
        <input type="text" name="NombreVicarioZonal" value="{{ old('NombreVicarioZonal') }}" required>

        <button type="submit">Submit</button>
    </form>

</body>
</html>

