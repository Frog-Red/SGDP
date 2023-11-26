    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createtipo_eventoModalLabel">Agregar Evento</h5>
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

    <form method="post" action="{{ route('tipo_evento.store') }}">
        @csrf

        <label for="CodigoTipoEvento">Codigo Tipo Evento:</label>
        <input class="form-control"type="text" name="CodigoTipoEvento" value="{{ old('CodigoTipoEvento') }}" required>

        <label for="NombreTipoEvento">Nombre Tipo Evento:</label>
        <input class="form-control"type="text" name="NombreTipoEvento" value="{{ old('NombreTipoEvento') }}" required>

        <label for="DescripcionTipoEvento">Descripcion Tipo Evento:</label>
        <input class="form-control"type="text" name="DescripcionTipoEvento" value="{{ old('DescripcionTipoEvento') }}" required>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Agregar</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>


    </form>
</div>
</div>
</div>

