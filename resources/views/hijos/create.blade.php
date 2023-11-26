<!-- resources/views/hijos/create.blade.php -->
@php
    $diaconos = \App\Models\Diacono::all(); // Replace with your actual namespace and model
@endphp

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createHijoModalLabel">Añadir Hijo</h5>
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

                <form method="post" action="{{ route('hijos.store') }}">
                    @csrf
                        
                    <label for="RutDiáconoPadre" class="form-label">Rut del Padre Diácono:</label>
                    <select class="form-control"id="RutDiáconoPadre" name="RutDiáconoPadre">
                        <option value="">Selecciona un Rut</option>
                        @foreach($diaconos as $diacono)
                            <option value="{{ $diacono->Rut }}">{{ $diacono->Rut }} - {{ $diacono->Nombre }}</option>
                        @endforeach
                    </select>

                    <hr>

                    <label for="RutHijo">Rut Hijo:</label>
                    <input class="form-control"type="text" name="RutHijo" value="{{ old('RutHijo') }}" required>

                    <hr>

                    <label>Sexo Hijo: </label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="SexoHijo" id="Masculino" value="Masculino" {{ old('SexoHijo') === 'Masculino' ? 'checked' : '' }}>
                        <label class="form-check-label" for="Masculino">Masculino</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="SexoHijo" id="Femenino" value="Femenino" {{ old('SexoHijo') === 'Femenino' ? 'checked' : '' }}>
                        <label class="form-check-label" for="Femenino">Femenino</label>
                    </div>

                    <hr>

                    <label for="NombreHijo">Nombre Hijo:</label>
                    <input class="form-control"type="text" name="NombreHijo" value="{{ old('NombreHijo') }}" required>

                    <hr>

                    <label for="FechaNacimientoHijo">Fecha de Nacimiento Hijo:</label>
                    <input class="form-control"type="date" name="FechaNacimientoHijo" value="{{ old('FechaNacimientoHijo') }}" required>


                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Agregar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>


                </form>
            </div>
        </div>
    </div>

<script>
    // Apply Select2 to the RutDiáconoPadre element
    $(document).ready(function () {
        $('#RutDiáconoPadre').select2({
            placeholder: 'Selecciona un Rut',
            allowClear: true,
        });
    });
</script>