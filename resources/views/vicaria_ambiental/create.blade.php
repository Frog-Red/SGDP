<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="createvicaria_ambientalModalLabel">Añadir Vicaria Ambiental</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

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
        <input class="form-control"type="text" name="CodigoVicariaAmbiental" value="{{ old('CodigoVicariaAmbiental') }}" required>

        <label for="NombreVicariaAmbiental">Nombre Vicaria Ambiental:</label>
        <input class="form-control"type="text" name="NombreVicariaAmbiental" value="{{ old('NombreVicariaAmbiental') }}" required>

        <label for="DireccionVicariaAmbiental">Direccion Vicaria Ambiental:</label>
        <input class="form-control"type="text" name="DireccionVicariaAmbiental" value="{{ old('DireccionVicariaAmbiental') }}" required>

        <label for="TelefonoVicariaAmbiental">Telefono Vicaria Ambiental:</label>
        <input class="form-control"type="text" name="TelefonoVicariaAmbiental" value="{{ old('TelefonoVicariaAmbiental') }}" required>

        <label for="CorreoElectronicoVicariaAmbiental">Correo Electronico Vicaria Ambiental:</label>
        <input class="form-control"type="email" name="CorreoElectronicoVicariaAmbiental" value="{{ old('CorreoElectronicoVicariaAmbiental') }}" required>

        <label for="NombreVicario">Nombre del Vicario:</label>
        <input class="form-control"type="text" name="NombreVicario" value="{{ old('NombreVicario') }}" required>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Agregar</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>


    </form>
</div>
</div>
</div>


