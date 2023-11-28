<!-- resources/views/historial_diacono/create.blade.php -->
@php
    $diaconos = \App\Models\Diacono::all(); // Replace with your actual namespace and model
    $tiposEvento = \App\Models\tipo_evento::all();;
@endphp
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="edithistorial_diaconoModalLabel">Editar Evento</h5>
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

            <form method="post" action="{{ route('historial_diacono.update', $historial_diacono->id) }}">
                @csrf
                @method('PUT')

                <label for="RutDiacono">Rut de Diacono:</label>
                <select class="form-control" id="RutDiacono" name="RutDiacono" required>
                    @foreach($diaconos as $diacono)
                        <option value="{{ $diacono->Rut }}" {{ $diacono->Rut == $historial_diacono->RutDiacono ? 'selected' : '' }}>
                            {{ $diacono->Rut }} - {{ $diacono->Nombre }}
                        </option>
                    @endforeach
                </select>

                <hr>

                <label for="CodigoTipoEvento">Evento:</label>
                <select class="form-control" id="CodigoTipoEvento" name="CodigoTipoEvento" required>
                    @foreach($tiposEvento as $tipoEvento)
                        <option value="{{ $tipoEvento->NombreTipoEvento }}" {{ $historial_diacono->CodigoTipoEvento == $tipoEvento->NombreTipoEvento ? 'selected' : '' }}>
                            {{ $tipoEvento->NombreTipoEvento }} - {{ $tipoEvento->CodigoTipoEvento }}
                        </option>
                    @endforeach
                </select>
                

                <hr>

                <label for="NumeroSecuenciaEvento">Numero de Secuencia del Evento:</label>
                <input class="form-control" type="text" name="NumeroSecuenciaEvento" value="{{ $historial_diacono->NumeroSecuenciaEvento }}" required>

                <hr>

                <label for="FechaEvento">Fecha del Evento:</label>
                <input class="form-control" type="date" name="FechaEvento" value="{{ $historial_diacono->FechaEvento }}" required>

                <hr>

                <label for="ComentariosEvento">Comentarios:</label>
                <input class="form-control" type="text" name="ComentariosEvento" value="{{ $historial_diacono->ComentariosEvento }}" required>

                <hr>

                <label for="CodigoUsuarioRegistro">Codigo de Usuario Registro:</label>
                <input class="form-control" type="text" name="CodigoUsuarioRegistro" value="{{ $historial_diacono->CodigoUsuarioRegistro }}" required>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
