<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="editvicaria_ambientalModalLabel">Editar Vicaria ambiental</h5>
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

    <form method="post" action="{{ route('vicaria_ambiental.update', $vicaria_ambiental->id) }}">
        @csrf
        @method('PUT')

        <label for="CodigoVicariaAmbiental">Codigo Vicaria Ambiental:</label>
        <input class="form-control"type="text" name="CodigoVicariaAmbiental" value="{{ $vicaria_ambiental->CodigoVicariaAmbiental }}" required>

        <label for="NombreVicariaAmbiental">Nombre Vicaria Ambiental:</label>
        <input class="form-control"type="text" name="NombreVicariaAmbiental" value="{{ $vicaria_ambiental->NombreVicariaAmbiental }}" required>

        <label for="DireccionVicariaAmbiental">Direccion Vicaria Ambiental:</label>
        <input class="form-control"type="text" name="DireccionVicariaAmbiental" value="{{ $vicaria_ambiental->DireccionVicariaAmbiental }}" required>

        <label for="TelefonoVicariaAmbiental">Telefono Vicaria Ambiental:</label>
        <input class="form-control"type="text" name="TelefonoVicariaAmbiental" value="{{ $vicaria_ambiental->TelefonoVicariaAmbiental }}" required>

        <label for="CorreoElectronicoVicariaAmbiental">Correo Electronico Vicaria Ambiental:</label>
        <input class="form-control"type="email" name="CorreoElectronicoVicariaAmbiental" value="{{ $vicaria_ambiental->CorreoElectronicoVicariaAmbiental }}" required>

        <label for="NombreVicario">Nombre del Vicario:</label>
        <input class="form-control"type="text" name="NombreVicario" value="{{ $vicaria_ambiental->NombreVicario }}" required>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Update</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
        
    </form>
</div>
</div>
</div>

