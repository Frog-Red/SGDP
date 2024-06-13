<!-- resources/views/sacerdote/create.blade.php -->
@php
    $parroquias = \App\Models\Parroquia::all(); // Replace with your actual namespace and model
    $vicaria_ambiental =  \App\Models\vicaria_ambiental::all(); 
    $vicaria_zonal =  \App\Models\vicaria_zonal::all(); 
@endphp

<div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
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

            <form method="post" action="{{ route('sacerdotes.store') }}">
                @csrf

                <!-- Section 1 -->
                <div class="mb-3">
                    <h5 class="mb-4"><strong class="text-dark">Datos del Sacerdote</strong></h5>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
                        </div>
                        <div class="col-md-3">
                            <!-- Add other fields for Section 1 -->
                            <label for="rut" class="form-label">Rut:</label>
                            <input type="text" class="form-control" id="rut" name="rut" value="{{ old('rut') }}" required>
                        </div>
                        <div class="col-md-3">
                            <!-- Add other fields for Section 1 -->
                            <label for="estadoVigencia" class="form-label">Estado de vigencia:</label>
                            <select class="form-control" id="estadoVigencia" name="estadoVigencia" onchange="toggleestadoVigenciaOptions()">
                                <option value="Activo">Activo</option>
                                <option value="Suspendido">Suspendido</option>
                                <option value="Dimitido">Dimitido</option>
                                <option value="Fallecido">Fallecido</option>
                            </select>                       
                        </div>
                        <div class="col-md-3">
                            <!-- Add other fields for Section 1 -->
                            <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento:</label>
                            <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" value="{{ old('fechaNacimiento') }}" required>
                        </div>
                        <div class="col-md-3">
                            <!-- Add other fields for Section 1 -->
                            <label for="profesionOficio" class="form-label">Profesión u Oficio:</label>
                            <input type="text" class="form-control" id="profesionOficio" name="profesionOficio" value="{{ old('profesionOficio') }}">
                        </div>
                        <div class="col-md-3">
                            <!-- Add other fields for Section 1 -->
                            <label for="direccionParticular" class="form-label">Dirección Particular:</label>
                            <input type="text" class="form-control" id="direccionParticular" name="direccionParticular" value="{{ old('direccionParticular') }}">
                        </div>
                        <div class="col-md-3">
                            <!-- Add other fields for Section 1 -->
                            <label for="telefonoCelular" class="form-label">Teléfono Celular:</label>
                            <input type="text" class="form-control" id="telefonoCelular" name="telefonoCelular" value="{{ old('telefonoCelular') }}">
                        </div>
                        <div class="col-md-3">
                            <!-- Add other fields for Section 1 -->
                            <label for="telefonoFijo" class="form-label">Telefono Fijo:</label>
                            <input type="text" class="form-control" id="telefonoFijo" name="telefonoFijo" value="{{ old('telefonoFijo') }}">
                        </div>
                        <div class="col-md-3">
                            <!-- Add other fields for Section 1 -->
                            <label for="correoElectronico" class="form-label">Correo Electrónico:</label>
                            <input type="email" class="form-control" id="correoElectronico" name="correoElectronico" value="{{ old('correoElectronico') }}">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="fechaOrdenacion" class="form-label">Fecha de Ordenacion:</label>
                            <input type="date" class="form-control" id="fechaOrdenacion" name="fechaOrdenacion" value="{{ old('fechaOrdenacion') }}" required>
                        </div>
                        <div class="col-md-3">
                            <!-- Add other fields for Section 1 -->
                            <label for="lugarOrdenacion" class="form-label">Lugar de Ordenación:</label>
                            <input type="text" class="form-control" id="lugarOrdenacion" name="lugarOrdenacion" value="{{ old('lugarOrdenacion') }}" required>
                        </div>
                        <div class="col-md-3">
                            <!-- Add other fields for Section 1 -->
                            <label for="nombreObispoOrdeno" class="form-label">Nombre del Obispo Ordenador</label>
                            <input type="text" class="form-control" id="nombreObispoOrdeno" name="nombreObispoOrdeno" value="{{ old('nombreObispoOrdeno') }}" required>
                        </div>
                        <div class="col-md-3">
                            <label for="parroquiaAsignada" class="form-label">Parroquia asignada:</label>
                            <select class="form-control" id="parroquiaAsignada" name="parroquiaAsignada" required>
                                @foreach($parroquias as $parroquia)
                                    <option value="{{ $parroquia->NombreParroquia }}">{{ $parroquia->NombreParroquia }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <!-- Add other fields for Section 1 -->
                            <label for="vicariaAmbientalAsignada" class="form-label">Vicaría Asignada</label>
                            <select class="form-control" id="vicariaAmbientalAsignada" name="vicariaAmbientalAsignada" required>
                                @foreach($vicaria_ambiental as $V)
                                    <option value="{{ $V->NombreVicariaAmbiental }}">{{ $V->NombreVicariaAmbiental }}</option>
                                @endforeach
                                @foreach($vicaria_zonal as $Z)
                                    <option value="{{ $Z->NombreVicariaZonal }}">{{ $Z->NombreVicariaZonal }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <!-- Add other fields for Section 1 -->
                            <label for="numeroDecreto" class="form-label">Numero de Decreto:</label>
                            <input type="text" class="form-control" id="numeroDecreto" name="numeroDecreto" value="{{ old('numeroDecreto') }}" >
                        </div>
                    </div>
                    <hr>
                </div>
                
                <!-- Section 2 -->
                <div class="mb-3">
                    <h5 class="mb-4"><strong class="text-dark">Indicador de defuncion</strong></h5>
                    <div class="row">
                    <div class="col-md-3">
                        <!-- Add other fields for Section 1 -->
                        <label for="indicadorDefuncion" class="form-label">Indicador de Defunción:</label>
                        <select class="form-control" id="indicadorDefuncion" name="indicadorDefuncion" onchange="toggleOptions()">
                            <option value="0">Vivo</option>
                            <option value="1">Fallecido</option>
                        </select>
                    </div>
                    <div id="defuncionOptions" style="display: none;">
                        <!-- Include additional fields for defuncion here -->
                        <label for="fechaDefuncion">Fecha de Defunción:</label>
                        <input class="form-control" type="date" name="fechaDefuncion" value="{{ old('fechaDefuncion') }}">
                    </div>
                     </div>
                     <hr>
                </div>
                <script>
                    function toggleOptions() {
                        var indicadorDefuncion = document.getElementById('indicadorDefuncion');
                        var defuncionOptions = document.getElementById('defuncionOptions');
                
                        if (indicadorDefuncion.value === '1') {
                            defuncionOptions.style.display = 'block';
                        } else {
                            defuncionOptions.style.display = 'none';
                        }
                    }
                </script>


                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Agregar Sacerdote</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

