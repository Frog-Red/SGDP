<!-- resources/views/parroquia/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Parroquia</title>
</head>
<body>

    <h1>Create Parroquia</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{ route('parroquia.store') }}">
        @csrf

        <label for="CodigoParroquia">Codigo:</label>
        <input type="text" name="CodigoParroquia" value="{{ old('CodigoParroquia') }}" required>

        <label for="NombreParroquia">Nombre:</label>
        <input type="text" name="NombreParroquia" value="{{ old('NombreParroquia') }}" required>

        <label for="DireccionParroquia">Direccion:</label>
        <input type="text" name="DireccionParroquia" value="{{ old('DireccionParroquia') }}" required>

        <label for="TelefonoParroquia">Telefono:</label>
        <input type="text" name="TelefonoParroquia" value="{{ old('TelefonoParroquia') }}" required>

        <label for="CorreoElectronicoParroquia">Correo Electronico:</label>
        <input type="email" name="CorreoElectronicoParroquia" value="{{ old('CorreoElectronicoParroquia') }}" required>

        <label for="VicariaZonalPertenece">Vicaria Zonal:</label>
        <input type="text" name="VicariaZonalPertenece" value="{{ old('VicariaZonalPertenece') }}" required>

        <label for="NombreParroco">Nombre del Parroco:</label>
        <input type="text" name="NombreParroco" value="{{ old('NombreParroco') }}" required>

        <button type="submit">Submit</button>
    </form>

</body>
</html>
