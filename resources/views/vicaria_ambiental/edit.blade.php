<!-- resources/views/vicaria_ambiental/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Vicaria Ambiental</title>
</head>
<body>

    <h1>Edit Vicaria Ambiental</h1>

    <form method="post" action="{{ route('vicaria_ambiental.update', $vicaria_ambiental->id) }}">
        @csrf
        @method('PUT')

        <label for="CodigoVicariaAmbiental">Codigo Vicaria Ambiental:</label>
        <input type="text" name="CodigoVicariaAmbiental" value="{{ $vicaria_ambiental->CodigoVicariaAmbiental }}" required>

        <label for="NombreVicariaAmbiental">Nombre Vicaria Ambiental:</label>
        <input type="text" name="NombreVicariaAmbiental" value="{{ $vicaria_ambiental->NombreVicariaAmbiental }}" required>

        <label for="DireccionVicariaAmbiental">Direccion Vicaria Ambiental:</label>
        <input type="text" name="DireccionVicariaAmbiental" value="{{ $vicaria_ambiental->DireccionVicariaAmbiental }}" required>

        <label for="TelefonoVicariaAmbiental">Telefono Vicaria Ambiental:</label>
        <input type="text" name="TelefonoVicariaAmbiental" value="{{ $vicaria_ambiental->TelefonoVicariaAmbiental }}" required>

        <label for="CorreoElectronicoVicariaAmbiental">Correo Electronico Vicaria Ambiental:</label>
        <input type="email" name="CorreoElectronicoVicariaAmbiental" value="{{ $vicaria_ambiental->CorreoElectronicoVicariaAmbiental }}" required>

        <label for="NombreVicario">Nombre del Vicario:</label>
        <input type="text" name="NombreVicario" value="{{ $vicaria_ambiental->NombreVicario }}" required>

        <button type="submit">Update</button>
    </form>

</body>
</html>

