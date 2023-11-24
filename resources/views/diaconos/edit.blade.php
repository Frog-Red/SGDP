<!-- resources/views/diaconos/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Diacono</title>
</head>
<body>

    <h1>Edit Diacono</h1>

    <form method="post" action="{{ route('diaconos.update', $diacono->id) }}">
        @csrf
        @method('PUT')

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="{{ $diacono->Nombre }}" required>

        <label for="rut">Rut:</label>
        <input type="text" name="rut" value="{{ $diacono->Rut }}" required>

        <label for="estadoVigencia">Estado de Vigencia:</label>
        <input type="text" name="estadoVigencia" value="{{ $diacono->EstadoVigencia }}" required>

        <label for="fechaNacimiento">Fecha de Nacimiento:</label>
        <input type="date" name="fechaNacimiento" value="{{ $diacono->FechaNacimiento }}" required>

        <label for="fechaOrdenacion">Fecha de Ordenación:</label>
        <input type="date" name="fechaOrdenacion" value="{{ $diacono->FechaOrdenacion }}">

        <label for="lugarOrdenacion">Lugar de Ordenación:</label>
        <input type="text" name="lugarOrdenacion" value="{{ $diacono->LugarOrdenacion }}">

        <label for="nombreObispoOrdeno">Nombre Obispo que lo ordenó:</label>
        <input type="text" name="nombreObispoOrdeno" value="{{ $diacono->NombreObispoOrdeno }}">

        <label for="profesionOficio">Profesión u Oficio:</label>
        <input type="text" name="profesionOficio" value="{{ $diacono->ProfesionOficio }}">

        <label for="parroquiaAsignada">Parroquia a la que está asignado:</label>
        <input type="text" name="parroquiaAsignada" value="{{ $diacono->ParroquiaAsignada }}">

        <label for="vicariaAmbientalAsignada">Vicaría Ambiental a la que está asignado:</label>
        <input type="text" name="vicariaAmbientalAsignada" value="{{ $diacono->VicariaAmbientalAsignada }}">

        <label for="direccionParticular">Dirección Particular:</label>
        <input type="text" name="direccionParticular" value="{{ $diacono->DireccionParticular }}">

        <label for="telefonoCelular">Teléfono Celular:</label>
        <input type="text" name="telefonoCelular" value="{{ $diacono->TelefonoCelular }}">

        <label for="telefonoFijo">Teléfono Fijo:</label>
        <input type="text" name="telefonoFijo" value="{{ $diacono->TelefonoFijo }}">

        <label for="correoElectronico">Correo Electrónico:</label>
        <input type="email" name="correoElectronico" value="{{ $diacono->CorreoElectronico }}">

        <label for="indicadorDefuncion">Indicador de Defunción:</label>
        <input type="text" name="indicadorDefuncion" value="{{ $diacono->IndicadorDefuncion }}">

        <label for="fechaDefuncion">Fecha de Defunción:</label>
        <input type="date" name="fechaDefuncion" value="{{ $diacono->FechaDefuncion }}">

        <label for="estadoCivil">Estado Civil:</label>
        <input type="text" name="estadoCivil" value="{{ $diacono->EstadoCivil }}">

        <label for="nombreEsposa">Nombre de Esposa:</label>
        <input type="text" name="nombreEsposa" value="{{ $diacono->NombreEsposa }}">

        <label for="rutEsposa">Rut de Esposa:</label>
        <input type="text" name="rutEsposa" value="{{ $diacono->RutEsposa }}">

        <label for="fechaNacimientoEsposa">Fecha de Nacimiento de Esposa:</label>
        <input type="date" name="fechaNacimientoEsposa" value="{{ $diacono->FechaNacimientoEsposa }}">

        <label for="fechaMatrimonio">Fecha de Matrimonio:</label>
        <input type="date" name="fechaMatrimonio" value="{{ $diacono->FechaMatrimonio }}">

        <label for="fechaDefuncionEsposa">Fecha de Defunción de Esposa:</label>
        <input type="date" name="fechaDefuncionEsposa" value="{{ $diacono->FechaDefuncionEsposa }}">

        <button type="submit">Update</button>
    </form>

</body>
</html>
