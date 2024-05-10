
@php
$vicaria_zonal =  \App\Models\vicaria_zonal::all(); 
@endphp
    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createparroquiaModalLabel">Añadir Parroquia</h5>
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

    <form method="post" action="{{ route('parroquia.store') }}">
        @csrf

        <label for="CodigoParroquia">Codigo:</label>
        <input class="form-control"type="text" name="CodigoParroquia" value="{{ old('CodigoParroquia') }}" required>

        <label for="NombreParroquia">Nombre:</label>
        <input class="form-control"type="text" name="NombreParroquia" value="{{ old('NombreParroquia') }}" required>

        <label for="DireccionParroquia">Direccion:</label>
        <input class="form-control"type="text" name="DireccionParroquia" value="{{ old('DireccionParroquia') }}" required>

        <label for="TelefonoParroquia">Telefono:</label>
        <input class="form-control"type="text" name="TelefonoParroquia" value="{{ old('TelefonoParroquia') }}" required>

        <label for="CorreoElectronicoParroquia">Correo Electronico:</label>
        <input class="form-control"type="email" name="CorreoElectronicoParroquia" value="{{ old('CorreoElectronicoParroquia') }}" required>

        <label for="VicariaZonalPertenece">Vicaria Zonal:</label>
        <select class="form-control" id="VicariaZonalPertenece" name="VicariaZonalPertenece" required>
            @foreach($vicaria_zonal as $V)
                <option value="{{ $V->NombreVicariaZonal }}">{{ $V->NombreVicariaZonal }}</option>
            @endforeach
        </select>
        <label for="NombreParroco">Nombre del Parroco:</label>
        <input class="form-control"type="text" name="NombreParroco" value="{{ old('NombreParroco') }}" required>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Agregar</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
    </form>
</div>
</div>
</div>

