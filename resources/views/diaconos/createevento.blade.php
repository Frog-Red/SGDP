<!-- resources/views/historial_diacono/create.blade.php -->
@php
    $diaconos = \App\Models\Diacono::all(); // Replace with your actual namespace and model
    $tiposEvento = \App\Models\tipo_evento::all();;
@endphp

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createeventoModalLabel">Añadir evento a un Diacono</h5>
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

                <form method="post" action="{{ route('historial_diacono.store') }}">
                    @csrf
                        
                    <label for="RutDiacono">Rut de Diacono:</label>
                    <select class="form-control" id="RutDiaconoEvento" name="RutDiacono">
                        <option value="">Selecciona un Rut</option>
                        @foreach($diaconos as $diacono)
                            <option value="{{ $diacono->Rut }}">{{ $diacono->Rut }} - {{ $diacono->Nombre }}</option>
                        @endforeach
                    </select>

                    <hr>

                    <label for="CodigoTipoEvento">Evento:</label>
                    <select class="form-control" id="CodigoTipoEvento" name="CodigoTipoEvento" required>
                        <option value="">Selecciona un Evento</option>
                        @foreach($tiposEvento as $tipoEvento)
                            <option value="{{ $tipoEvento->NombreTipoEvento }}">{{ $tipoEvento->NombreTipoEvento }}- {{ $tipoEvento->CodigoTipoEvento }} </option>
                        @endforeach
                    </select>

                    <hr>

                    <label for="NumeroSecuenciaEvento">Numero de Secuencia del Evento:</label>
                    <input class="form-control" type="text" name="NumeroSecuenciaEvento" value="{{ old('NumeroSecuenciaEvento') }}" required>

                    <hr>

                    <label for="FechaEvento">Fecha del Evento:</label>
                    <input class="form-control"type="date" name="FechaEvento" value="{{ old('FechaEvento') }}" required>

                    <hr>
                    <label for="ComentariosEvento">Comentarios:</label>
                    <input class="form-control"type="text" name="ComentariosEvento" value="{{ old('ComentariosEvento') }}" required>
                    <hr>
                    <label for="CodigoUsuarioRegistro">Codigo de Usuario Registro:</label>
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
    