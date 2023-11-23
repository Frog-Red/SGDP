<!-- resources/views/diaconos/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Diacono</title>
</head>
<body>

    <h1>Create Diacono</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{ route('diaconos.store') }}">
        @csrf

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="{{ old('nombre') }}" required>

        <label for="rut">Rut:</label>
        <input type="text" name="rut" value="{{ old('rut') }}" required>

        <label for="estadoVigencia">Estado de Vigencia:</label>
        <input type="text" name="estadoVigencia" value="{{ old('estadoVigencia') }}" required>

        <label for="fechaNacimiento">Fecha de Nacimiento:</label>
        <input type="date" name="fechaNacimiento" value="{{ old('fechaNacimiento') }}" required>

        <label for="fechaOrdenacion">Fecha de Ordenación:</label>
        <input type="date" name="fechaOrdenacion" value="{{ old('fechaOrdenacion') }}" required>

        <label for="lugarOrdenacion">Lugar de Ordenación:</label>
        <input type="text" name="lugarOrdenacion" value="{{ old('lugarOrdenacion') }}" required>

        <label for="nombreObispo">Nombre Obispo que lo ordenó:</label>
        <input type="text" name="nombreObispoOrdeno" value="{{ old('nombreObispoOrdeno') }}" required>

        <label for="profesionOficio">Profesión u Oficio:</label>
        <input type="text" name="profesionOficio" value="{{ old('profesionOficio') }}" required>

        <label for="parroquiaAsignada">Parroquia a la que está asignado:</label>
        <input type="text" name="parroquiaAsignada" value="{{ old('parroquiaAsignada') }}">

        <label for="vicariaAmbientalAsignada">Vicaría Ambiental a la que está asignado:</label>
        <input type="text" name="vicariaAmbientalAsignada" value="{{ old('vicariaAmbientalAsignada') }}">

        <label for="direccionParticular">Dirección Particular:</label>
        <input type="text" name="direccionParticular" value="{{ old('direccionParticular') }}" required>

        <label for="telefonoCelular">Teléfono Celular:</label>
        <input type="text" name="telefonoCelular" value="{{ old('telefonoCelular') }}" required>

        <label for="telefonoFijo">Teléfono Fijo:</label>
        <input type="text" name="telefonoFijo" value="{{ old('telefonoFijo') }}" required>

        <label for="correoElectronico">Correo Electrónico:</label>
        <input type="email" name="correoElectronico" value="{{ old('correoElectronico') }}" required>

        <label for="indicadorDefuncion">Indicador de Defunción:</label>
        <input type="text" name="indicadorDefuncion" value="{{ old('indicadorDefuncion') }}">

        <label for="fechaDefuncion">Fecha de Defunción:</label>
        <input type="date" name="fechaDefuncion" value="{{ old('fechaDefuncion') }}">

        <label for="estadoCivil">Estado Civil:</label>
        <input type="text" name="estadoCivil" value="{{ old('estadoCivil') }}" required>

        <label for="nombreEsposa">Nombre de Esposa:</label>
        <input type="text" name="nombreEsposa" value="{{ old('nombreEsposa') }}">

        <label for="rutEsposa">Rut de Esposa:</label>
        <input type="text" name="rutEsposa" value="{{ old('rutEsposa') }}">

        <label for="fechaNacimientoEsposa">Fecha de Nacimiento de Esposa:</label>
        <input type="date" name="fechaNacimientoEsposa" value="{{ old('fechaNacimientoEsposa') }}">

        <label for="fechaMatrimonio">Fecha de Matrimonio:</label>
        <input type="date" name="fechaMatrimonio" value="{{ old('fechaMatrimonio') }}">

        <label for="fechaDefuncionEsposa">Fecha de Defunción de Esposa:</label>
        <input type="date" name="fechaDefuncionEsposa" value="{{ old('fechaDefuncionEsposa') }}">

        <button type="submit">Submit</button>
    </form>

</body>
</html>

