<!-- resources/views/welcome.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>

    <h1>Welcome to Your Application</h1>

    <a href="{{ route('diaconos.create') }}">
        <button>Add Diacono</button>
    </a>

    <table border="1">
        <thead>
            <tr>
                <th>Rut</th>
                <th>Nombre</th>
                <th>Actions</th> <!-- Add a new column for actions -->
            </tr>
        </thead>
        <tbody>
            @foreach($diaconos as $diacono)
                <tr>
                    <td>{{ $diacono->Rut }}</td>
                    <td>{{ $diacono->Nombre }}</td>


                    <td>
                        <form method="post" action="{{ route('diaconos.destroy', $diacono->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>

                    
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
