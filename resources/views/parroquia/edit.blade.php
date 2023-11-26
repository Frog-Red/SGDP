
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="editparroquiaModalLabel">Añadir Parroquia</h5>
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

    <form method="post" action="{{ route('parroquia.update', $parroquia->id) }}">
        @csrf
        @method('PUT')

        <label for="CodigoParroquia">Codigo:</label>
        <input class="form-control"type="text" name="CodigoParroquia" value="{{ $parroquia->CodigoParroquia }}" required>

        <label for="NombreParroquia">Nombre:</label>
        <input class="form-control"type="text" name="NombreParroquia" value="{{ $parroquia->NombreParroquia }}" required>

        <label for="DireccionParroquia">Direccion:</label>
        <input class="form-control"type="text" name="DireccionParroquia" value="{{ $parroquia->DireccionParroquia }}" required>

        <label for="TelefonoParroquia">Telefono:</label>
        <input class="form-control"type="text" name="TelefonoParroquia" value="{{ $parroquia->TelefonoParroquia }}" required>

        <label for="CorreoElectronicoParroquia">Correo Electronico:</label>
        <input class="form-control"type="email" name="CorreoElectronicoParroquia" value="{{ $parroquia->CorreoElectronicoParroquia }}" required>

        <label for="VicariaZonalPertenece">Vicaria Zonal:</label>
        <input class="form-control"type="text" name="VicariaZonalPertenece" value="{{ $parroquia->VicariaZonalPertenece }}" required>

        <label for="NombreParroco">Nombre del Parroco:</label>
        <input class="form-control"type="text" name="NombreParroco" value="{{ $parroquia->NombreParroco }}" required>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Update</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
    </form>
</div>
</div>
</div>
