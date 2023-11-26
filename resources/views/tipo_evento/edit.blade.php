<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="createtipo_eventoModalLabel">Editar Evento</h5>
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

    <form method="post" action="{{ route('tipo_evento.update', $tipo_evento->id) }}">
        @csrf
        @method('PUT')

        <label for="CodigoTipoEvento">Codigo Tipo Evento:</label>
        <input class="form-control"type="text" name="CodigoTipoEvento" value="{{ $tipo_evento->CodigoTipoEvento }}" required>

        <label for="NombreTipoEvento">Nombre Tipo Evento:</label>
        <input class="form-control"type="text" name="NombreTipoEvento" value="{{ $tipo_evento->NombreTipoEvento }}" required>

        <label for="DescripcionTipoEvento">Descripcion Tipo Evento:</label>
        <input class="form-control"type="text" name="DescripcionTipoEvento" value="{{ $tipo_evento->DescripcionTipoEvento }}" required>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Editar</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>


    </form>
</div>
</div>
</div>