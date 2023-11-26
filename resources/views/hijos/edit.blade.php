<!-- resources/views/hijos/create.blade.php -->
@php
    $diaconos = \App\Models\Diacono::all(); // Replace with your actual namespace and model
@endphp

<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="editHijoModalLabel">Editar Hijo</h5>
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

            <form method="post" action="{{ route('hijos.update', $hijos->id) }}">
                @csrf
                @method('PUT')

                <label for="RutDiáconoPadre" class="form-label">Rut del Padre Diácono:</label>
                <!-- Inside your modal body -->
                <select class="form-control" id="RutDiáconoPadre" name="RutDiáconoPadre">
                    <option value="{{ $hijos->RutDiáconoPadre }}">{{ $hijos->RutDiáconoPadre }}</option>
                    @foreach($diaconos as $diacono)
                        <option value="{{ $diacono->Rut }}">{{ $diacono->Rut }} - {{ $diacono->Nombre }}</option>
                    @endforeach
                </select>
                <hr>
                <label for="RutHijo">Rut Hijo:</label>
                <input class="form-control" type="text" name="RutHijo" value="{{ $hijos->RutHijo }}" required>
                    <hr>
                <label>Sexo Hijo: </label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="SexoHijo" id="Masculino" value="Masculino" {{ $hijos->SexoHijo === 'Masculino' ? 'checked' : '' }}>
                    <label class="form-check-label" for="Masculino">Masculino</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="SexoHijo" id="Femenino" value="Femenino" {{ $hijos->SexoHijo === 'Femenino' ? 'checked' : '' }}>
                    <label class="form-check-label" for="Femenino">Femenino</label>
                </div>
                <hr>
                <label for="NombreHijo">Nombre Hijo:</label>
                <input class="form-control" type="text" name="NombreHijo" value="{{ $hijos->NombreHijo }}" required>
                <hr>
                <label for="FechaNacimientoHijo">Fecha de Nacimiento Hijo:</label>
                <input class="form-control" type="date" name="FechaNacimientoHijo" value="{{ $hijos->FechaNacimientoHijo }}" required>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
                
            </form>
        </div>
    </div>
</div>


