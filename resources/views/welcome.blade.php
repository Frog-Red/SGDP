<!-- resources/views/welcome.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>

    <h1>Welcome tosdf Your Application</h1>

    <div>
        <a href="{{ route('diaconos.index') }}">
            <button>Diaconos</button>
        </a>

        <a href="{{ route('hijos.index') }}">
            <button>Hijos</button>
        </a>

        <a href="{{ route('parroquia.index') }}">
            <button>Parroquias</button>
        </a>

        <a href="{{ route('vicaria_zonal.index') }}">
            <button>Vicaria Zonal</button>
        </a>

        <a href="{{ route('vicaria_ambiental.index') }}">
            <button>Vicaria Ambiental</button>
        </a>

        <a href="{{ route('rol_pastoral.index') }}">
            <button>Rol Pastoral</button>
        </a>

        <a href="{{ route('tipo_evento.index') }}">
            <button>Tipo de Evento</button>
        </a>

        <a href="{{ route('historial_diacono.index') }}">
            <button>Historial Diacono</button>
        </a>

        <a href="{{ route('rol_diacono.index') }}">
            <button>Rol Diacono</button>
        </a>

    </div>

</body>
</html>
