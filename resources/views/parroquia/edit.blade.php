<!-- resources/views/parroquia/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Parroquia</title>
</head>
<body>

    <h1>Edit Parroquia</h1>

    <form method="post" action="{{ route('parroquia.update', $parroquia->id) }}">
        @csrf
        @method('PUT')

        <label for="CodigoParroquia">Codigo:</label>
        <input type="text" name="CodigoParroquia" value="{{ $parroquia->CodigoParroquia }}" required>

        <label for="NombreParroquia">Nombre:</label>
        <input type="text" name="NombreParroquia" value="{{ $parroquia->NombreParroquia }}" required>

        <label for="DireccionParroquia">Direccion:</label>
        <input type="text" name="DireccionParroquia" value="{{ $parroquia->DireccionParroquia }}" required>

        <label for="TelefonoParroquia">Telefono:</label>
        <input type="text" name="TelefonoParroquia" value="{{ $parroquia->TelefonoParroquia }}" required>

        <label for="CorreoElectronicoParroquia">Correo Electronico:</label>
        <input type="email" name="CorreoElectronicoParroquia" value="{{ $parroquia->CorreoElectronicoParroquia }}" required>

        <label for="VicariaZonalPertenece">Vicaria Zonal:</label>
        <input type="text" name="VicariaZonalPertenece" value="{{ $parroquia->VicariaZonalPertenece }}" required>

        <label for="NombreParroco">Nombre del Parroco:</label>
        <input type="text" name="NombreParroco" value="{{ $parroquia->NombreParroco }}" required>

        <button type="submit">Update</button>
    </form>

</body>
</html>
