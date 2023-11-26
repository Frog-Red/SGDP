<!-- resources/views/rol_diacono/edit.blade.php -->
@php
    $diaconos = \App\Models\Diacono::all();
    $rol_pastoral = \App\Models\rol_pastoral::all(); // Replace with your actual namespace and model
@endphp

<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="editrol_diaconoModalLabel">Editar Rol</h5>
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

            <form method="post" action="{{ route('rol_diacono.update', $rol_diacono->id) }}">
                @csrf
                @method('PUT')

                <label for="RutDiacono">Rut Diacono:</label>
                <select class="form-control" id="RutDiacono" name="RutDiacono" required>
                    @foreach($diaconos as $diacono)
                        <option value="{{ $diacono->Rut }}" {{ $diacono->Rut == $rol_diacono->RutDiacono ? 'selected' : '' }}>
                            {{ $diacono->Rut }} - {{ $diacono->Nombre }}
                        </option>
                    @endforeach
                </select>

                <label for="CodigoRol">Codigo Rol:</label>
                <select class="form-control" id="CodigoRol" name="CodigoRol" required>
                    @foreach($rol_pastoral as $ROL)
                        <option value="{{ $ROL->NombreRol }}" {{ $ROL->NombreRol == $rol_diacono->CodigoRol ? 'selected' : '' }}>
                            {{ $ROL->NombreRol }} - {{ $ROL->CodigoRolPastoral }}
                        </option>
                    @endforeach
                </select>

                <label for="FechaAsignacionRol">Fecha Asignacion Rol:</label>
                <input class="form-control" type="date" name="FechaAsignacionRol" value="{{ $rol_diacono->FechaAsignacionRol }}" required>

                <label for="ComentarioAsignacionRol">Comentarios:</label>
                <input class="form-control" type="text" name="ComentarioAsignacionRol" value="{{ $rol_diacono->ComentarioAsignacionRol }}" required>

                <label for="NombreAsignadorRol">Nombre Asignador del Rol:</label>
                <input class="form-control" type="text" name="NombreAsignadorRol" value="{{ $rol_diacono->NombreAsignadorRol }}" required>

                <label for="CodigoUsuarioRegistro">Codigo Usuario Registro:</label>
                <input class="form-control" type="text" name="CodigoUsuarioRegistro" value="{{ $rol_diacono->CodigoUsuarioRegistro }}" required>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>


