<!-- resources/views/diaconos/create.blade.php -->
@php
    $parroquias = \App\Models\Parroquia::all(); // Replace with your actual namespace and model
    $vicaria_ambiental =  \App\Models\vicaria_ambiental::all(); 
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

            <form method="post" action="{{ route('diaconos.store') }}">
                @csrf

                <!-- Section 1 -->
                <div class="mb-3">
                    <h5 class="mb-4"><strong class="text-dark">Datos del Diacono</strong></h5>
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
                            <input type="text" class="form-control" id="profesionOficio" name="profesionOficio" value="{{ old('profesionOficio') }}" required>
                        </div>
                        <div class="col-md-3">
                            <!-- Add other fields for Section 1 -->
                            <label for="direccionParticular" class="form-label">Dirección Particular:</label>
                            <input type="text" class="form-control" id="direccionParticular" name="direccionParticular" value="{{ old('direccionParticular') }}" required>
                        </div>
                        <div class="col-md-3">
                            <!-- Add other fields for Section 1 -->
                            <label for="telefonoCelular" class="form-label">Teléfono Celular:</label>
                            <input type="text" class="form-control" id="telefonoCelular" name="telefonoCelular" value="{{ old('telefonoCelular') }}" required>
                        </div>
                        <div class="col-md-3">
                            <!-- Add other fields for Section 1 -->
                            <label for="telefonoFijo" class="form-label">telefono Fijo:</label>
                            <input type="text" class="form-control" id="telefonoFijo" name="telefonoFijo" value="{{ old('telefonoFijo') }}" required>
                        </div>
                        <div class="col-md-3">
                            <!-- Add other fields for Section 1 -->
                            <label for="correoElectronico" class="form-label">Correo Electrónico:</label>
                            <input type="email" class="form-control" id="correoElectronico" name="correoElectronico" value="{{ old('correoElectronico') }}" required>
                        </div>
                    </div>
                    <hr>
                </div>

                <!-- Section 2 -->
                <div class="mb-3">
                    <h5 class="mb-4"><strong class="text-dark">Datos de Ordenacion</strong></h5>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="fechaOrdenacion" class="form-label">fecha de Ordenacion:</label>
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
                            <label for="vicariaAmbientalAsignada" class="form-label">Vicaría Ambiental</label>
                            <select class="form-control" id="vicariaAmbientalAsignada" name="vicariaAmbientalAsignada" required>
                                @foreach($vicaria_ambiental as $V)
                                    <option value="{{ $V->NombreVicariaAmbiental }}">{{ $V->NombreVicariaAmbiental }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <hr>
                </div>
                
                <!-- Section 3 -->
                <div class="mb-3">
                    <h5 class="mb-4"><strong class="text-dark">Indicador de defuncion</strong></h5>
                    <div class="row">
                    <div class="col-md-3">
                        <!-- Add other fields for Section 1 -->
                        <label for="indicadorDefuncion" class="form-label">Indicador de Defunción:</label>
                        <select class="form-control" id="IndicadorDefuncion" name="IndicadorDefuncion" onchange="toggleOptions()">
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
                        var indicadorDefuncion = document.getElementById('IndicadorDefuncion');
                        var defuncionOptions = document.getElementById('defuncionOptions');
                
                        if (indicadorDefuncion.value === '1') {
                            defuncionOptions.style.display = 'block';
                        } else {
                            defuncionOptions.style.display = 'none';
                        }
                    }
                </script>
                <!-- Section 4 -->
                <div class="mb-3">
                    <h5 class="mb-4"><strong class="text-dark">Informacion Civil</strong></h5>
                    <div class="row">
                        <div class="col-md-2">
                            <label for="estadoCivil" class="form-label">Estado Civil:</label>
                            <select class="form-control" id="estadoCivil" name="estadoCivil" onchange="toggleEstadoCivilOptions()">
                                <option value="soltero">Soltero</option>
                                <option value="casado">Casado</option>
                                <option value="viudo">Viudo</option>
                            </select>
                        </div>


                        <div class="mb-3" id="casadoOptions" style="display: none;">
                            <div class="row">
                            <!-- Include additional fields for casado here -->
                            <div class="col-md-3">
                                <label  for="nombreEsposa">Nombre Esposa:</label>
                                <input class="form-control" type="text" name="nombreEsposa" value="{{ old('nombreEsposa') }}">
                                </div>
    
                                <div class="col-md-3">
                                <label  for="rutEsposa">Rut Esposa:</label>
                                <input class="form-control" type="text" name="rutEsposa" value="{{ old('rutEsposa') }}">
                               </div>
                                
                                <div class="col-md-3">
                                <label  for="fechaNacimientoEsposa">Fecha Nacimiento:</label>
                                <input class="form-control" type="date" name="fechaNacimientoEsposa" value="{{ old('fechaNacimientoEsposa') }}">
                             </div>
                            
                                <div class="col-md-3">
                                <label  for="fechaMatrimonio">Fecha Matrimonio:</label>
                                <input class="form-control" type="date" name="fechaMatrimonio" value="{{ old('fechaMatrimonio') }}">
                                </div>
                        </div>
                        </div>
                    


<!-- Additional options for when estadoCivil is 'viudo' -->
                        <div id="viudoOptions" style="display: none;">

                            <div class="row">
                                <div class="col-md-12">
                                    <label for="fechaDefuncionEsposa">Fecha Defunción:</label>
                            <input class="form-control" type="date" name="fechaDefuncionEsposa" value="{{ old('fechaDefuncionEsposa') }}">
                                    </div>
                                <!-- Include additional fields for casado here -->
                                
                            </div>

                        </div>


                    </div>
                </div>
                <!-- Repeat similar structures for the remaining sections -->

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Agregar Diacono</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function toggleEstadoCivilOptions() {
        var estadoCivil = document.getElementById('estadoCivil');
        var casadoOptions = document.getElementById('casadoOptions');
        var viudoOptions = document.getElementById('viudoOptions');

        if (estadoCivil.value === 'casado') {
            casadoOptions.style.display = 'block';
            viudoOptions.style.display = 'none';
        } else if (estadoCivil.value === 'viudo') {
            casadoOptions.style.display = 'block';
            viudoOptions.style.display = 'block';
        } else {
            casadoOptions.style.display = 'none';
            viudoOptions.style.display = 'none';
        }
    }
</script>