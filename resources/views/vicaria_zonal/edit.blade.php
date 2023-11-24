<!-- resources/views/vicaria_zonal/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Vicaria Zonal</title>
</head>
<body>

    <h1>Edit Vicaria Zonal</h1>

    <form method="post" action="{{ route('vicaria_zonal.update', $vicaria_zonal->id) }}">
        @csrf
        @method('PUT')

        <label for="CodigoVicariaZonal">Codigo Vicaria Zonal:</label>
        <input type="text" name="CodigoVicariaZonal" value="{{ $vicaria_zonal->CodigoVicariaZonal }}" required>

        <label for="NombreVicariaZonal">Nombre Vicaria Zonal:</label>
        <input type="text" name="NombreVicariaZonal" value="{{ $vicaria_zonal->NombreVicariaZonal }}" required>

        <label for="DireccionVicariaZonal">Direccion Vicaria Zonal:</label>
        <input type="text" name="DireccionVicariaZonal" value="{{ $vicaria_zonal->DireccionVicariaZonal }}" required>

        <label for="TelefonoVicariaZonal">Telefono Vicaria Zonal:</label>
        <input type="text" name="TelefonoVicariaZonal" value="{{ $vicaria_zonal->TelefonoVicariaZonal }}" required>

        <label for="CorreoElectronicoVicariaZonal">Correo Electronico Vicaria Zonal:</label>
        <input type="email" name="CorreoElectronicoVicariaZonal" value="{{ $vicaria_zonal->CorreoElectronicoVicariaZonal }}" required>

        <label for="NombreVicarioZonal">Nombre del Vicario Zonal:</label>
        <input type="text" name="NombreVicarioZonal" value="{{ $vicaria_zonal->NombreVicarioZonal }}" required>

        <button type="submit">Update</button>
    </form>

</body>
</html>

