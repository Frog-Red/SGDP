   <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editrol_pastoralLabel">Editar Rol</h5>
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

    <form method="post" action="{{ route('rol_pastoral.update', $rol_pastoral->id) }}">
        @csrf
        @method('PUT')

        <label for="CodigoRolPastoral">Codigo Rol Pastoral:</label>
        <input class="form-control"type="text" name="CodigoRolPastoral" value="{{ $rol_pastoral->CodigoRolPastoral }}" required>

        <label for="NombreRol">Nombre Rol:</label>
        <input class="form-control"type="text" name="NombreRol" value="{{ $rol_pastoral->NombreRol }}" required>

        <label for="DescripcionRol">Descripcion Rol:</label>
        <input class="form-control"type="text" name="DescripcionRol" value="{{ $rol_pastoral->DescripcionRol }}" required>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Agregar</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>


    </form>
</div>
</div>
</div>

