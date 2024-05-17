<!-- resources/views/hijos/create.blade.php -->
@php
    $diaconos = \App\Models\Diacono::all();
    $rol_pastoral = \App\Models\rol_pastoral::all(); // Replace with your actual namespace and model
@endphp

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createroldiaconoModalLabel">Crear Rol</h5>
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

    <form method="post" action="{{ route('rol_diacono.store') }}">
        @csrf

        <label for="RutDiacono">Rut Diacono:</label>
        <select class="form-control" id="RutDiaconoRol" name="RutDiacono">
            <option value="">Selecciona un Rut</option>
            @foreach($diaconos as $diacono)
                <option value="{{ $diacono->Rut }}">{{ $diacono->Rut }} - {{ $diacono->Nombre }}</option>
            @endforeach
        </select>

        <label for="CodigoRol">Codigo Rol:</label>
        <select class="form-control" id="CodigoRol" name="CodigoRol">
            <option value="">Selecciona un Rol</option>
            @foreach($rol_pastoral as $ROL)
                <option value="{{ $ROL->NombreRol }}">{{ $ROL->NombreRol }} - {{ $ROL->CodigoRolPastoral }}</option>
            @endforeach
        </select>

        <label for="FechaAsignacionRol">Fecha Asignacion Rol:</label>
        <input class="form-control"type="date" name="FechaAsignacionRol" value="{{ old('FechaAsignacionRol') }}" required>

        <label for="ComentarioAsignacionRol">Comentarios:</label>
        <input class="form-control"type="text" name="ComentarioAsignacionRol" value="{{ old('ComentarioAsignacionRol') }}" required>

        <label for="NombreAsignadorRol">Nombre Asignador del Rol:</label>
        <input class="form-control"type="text" name="NombreAsignadorRol" value="{{ old('NombreAsignadorRol') }}" required>

        <label for="CodigoUsuarioRegistro">Codigo Usuario Registro:</label>
        <input class="form-control"type="text" name="CodigoUsuarioRegistro" value="{{ old('CodigoUsuarioRegistro') }}" required>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Agregar</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>


    </form>
</div>
</div>
</div>
<script>
    $(document).ready(function () {
        // Handler for "Borrar" action
        $('.delete-action').click(function() {
            var diaconoId = $(this).data('diaconoid');
            if(confirm('¿Estás seguro de que deseas borrar este registro?')) {
                $('#delete-form-' + diaconoId).submit();
            }
        });

        // Handler for "Añadir Hijo" action
        $('.add-hijo-action').click(function() {
            var padreRut = $(this).data('padre-rut');
            $('#RutDiáconoPadre').val(padreRut).trigger('change');
            $('#creatediaconoHijoModal').modal('show');
        });

        // Handler for "Añadir Evento" action
        $('.add-evento-action').click(function() {
            var diaconoRut = $(this).data('diaconorut');
            $('#RutDiaconoEvento').val(diaconoRut).trigger('change');
            $('#createeventoModal').modal('show');
        });

        // Handler for "Crear Rol" action
        $('.add-rol-action').click(function() {
            var diaconoRut = $(this).data('diaconorut');
            $('#RutDiaconoRol').val(diaconoRut).trigger('change');
            $('#createroldiaconoModal').modal('show');
        });

    });
</script>


