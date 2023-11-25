<div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title" id="editDiaconoModalLabel"></h1>
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

            <form method="post" action="{{ route('diaconos.update', $diacono->id) }}">
                @csrf
                @method('PUT')

                <!-- Section 1 -->
                <div class="mb-3">
                    <h5 class="mb-4"><strong class="text-dark">Datos del Diacono</strong></h5>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $diacono->Nombre }}" required>
                        </div>
                        <div class="col-md-3">
                            <!-- Add other fields for Section 1 -->
                            <label for="rut" class="form-label">Rut:</label>
                            <input type="text" class="form-control" id="rut" name="rut" value="{{ $diacono->Rut }}" required>
                        </div>
                        <div class="col-md-3">
                            <!-- Add other fields for Section 1 -->
                            <label for="estadoVigencia" class="form-label">Estado de vigencia:</label>
                            <input type="text" class="form-control" id="estadoVigencia" name="estadoVigencia" value="{{ $diacono->EstadoVigencia }}" required" required>
                        </div>
                        <div class="col-md-3">
                            <!-- Add other fields for Section 1 -->
                            <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento:</label>
                            <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" value="{{ $diacono->FechaNacimiento }}" required}" required>
                        </div>
                        <div class="col-md-3">
                            <!-- Add other fields for Section 1 -->
                            <label for="profesionOficio" class="form-label">Profesión u Oficio:</label>
                            <input type="text" class="form-control" id="profesionOficio" name="profesionOficio" value="{{ $diacono->ProfesionOficio }}">
                        </div>
                        <div class="col-md-3">
                            <!-- Add other fields for Section 1 -->
                            <label for="direccionParticular" class="form-label">Dirección Particular:</label>
                            <input type="text" class="form-control" id="direccionParticular" name="direccionParticular" value="{{ $diacono->DireccionParticular }}">
                        </div>
                        <div class="col-md-3">
                            <!-- Add other fields for Section 1 -->
                            <label for="telefonoCelular" class="form-label">Teléfono Celular:</label>
                            <input type="text" class="form-control" id="telefonoCelular" name="telefonoCelular" value="{{ $diacono->TelefonoCelular }}">
                        </div>
                        <div class="col-md-3">
                            <!-- Add other fields for Section 1 -->
                            <label for="telefonoFijo" class="form-label">telefono Fijo:</label>
                            <input type="text" class="form-control" id="telefonoFijo" name="telefonoFijo" value="{{ $diacono->TelefonoFijo }}">
                        </div>
                        <div class="col-md-3">
                            <!-- Add other fields for Section 1 -->
                            <label for="correoElectronico" class="form-label">Correo Electrónico:</label>
                            <input type="email" class="form-control" id="correoElectronico" name="correoElectronico" value="{{ $diacono->CorreoElectronico }}">
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
                            <input type="date" class="form-control" id="fechaOrdenacion" name="fechaOrdenacion" value="{{ $diacono->FechaOrdenacion }}" required>
                        </div>
                        <div class="col-md-3">
                            <!-- Add other fields for Section 1 -->
                            <label for="lugarOrdenacion" class="form-label">Lugar de Ordenación:</label>
                            <input type="text" class="form-control" id="lugarOrdenacion" name="lugarOrdenacion" value="{{ $diacono->LugarOrdenacion }}" required>
                        </div>
                        <div class="col-md-3">
                            <!-- Add other fields for Section 1 -->
                            <label for="nombreObispoOrdeno" class="form-label">nombreObispoOrdeno</label>
                            <input type="text" class="form-control" id="nombreObispoOrdeno" name="nombreObispoOrdeno" value="{{ $diacono->NombreObispoOrdeno }}">
                        </div>
                        <div class="col-md-3">
                            <!-- Add other fields for Section 1 -->
                            <label for="parroquiaAsignada" class="form-label">Parroquia asignada:</label>
                            <input type="text" class="form-control" id="parroquiaAsignada" name="parroquiaAsignada" value="{{ $diacono->ParroquiaAsignada }}">
                        </div>
                        <div class="col-md-3">
                            <!-- Add other fields for Section 1 -->
                            <label for="vicariaAmbientalAsignada" class="form-label">Vicaría Ambiental</label>
                            <input type="text" class="form-control" id="vicariaAmbientalAsignada" name="vicariaAmbientalAsignada" value="{{ $diacono->VicariaAmbientalAsignada }}">
                        </div>
                    </div>
                    <hr>
                </div>
                
                <!-- Section 3 -->
                
                <div class="mb-3">
                    <h5 class="mb-4"><strong class="text-dark">Indicador de defuncion</strong></h5>
                    <div class="row">
                        <div class="col-md-3">
                            <!-- Use a select dropdown for indicadorDefuncion -->
                            <label for="indicadorDefuncion" class="form-label">Indicador de Defunción:</label>
                            <select class="form-control" id="indicadorDefuncion" name="indicadorDefuncion" onchange="toggleFechaDefuncionVisibility()">
                                <option value="0" @if($diacono->IndicadorDefuncion == 0) selected @endif>Vivo</option>
                                <option value="1" @if($diacono->IndicadorDefuncion == 1) selected @endif>Fallecido</option>
                            </select>
                        </div>
                    <div class="col-md-3">
                        <!-- Add other fields for Section 1 -->
                        <label for="fechaDefuncion" class="form-label">fecha Defuncion:</label>
                        <input type="date" class="form-control" id="fechaDefuncion" name="fechaDefuncion" value="{{ $diacono->FechaDefuncion }}">
                         </div>
                     </div>
                     <hr>
                </div>

                <!-- Section 4 -->
                <div class="mb-3">
                    <h5 class="mb-4"><strong class="text-dark">Informacion Civil</strong></h5>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="estadoCivil" class="form-label">estadoCivil:</label>
                            <select class="form-control" id="estadoCivil" name="estadoCivil" onchange="toggleEstadoCivilOptions()">
                                <option value="soltero" @if($diacono->EstadoCivil == 'soltero') selected @endif>Soltero</option>
                                <option value="casado" @if($diacono->EstadoCivil == 'casado') selected @endif>Casado</option>
                                <option value="viudo" @if($diacono->EstadoCivil == 'viudo') selected @endif>Viudo</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <!-- Add other fields for Section 1 -->
                            <label for="nombreEsposa" class="form-label">nombreEsposa:</label>
                            <input type="text" class="form-control" id="nombreEsposa" name="nombreEsposa" value="{{ $diacono->NombreEsposa }}">
                        </div>
                        <div class="col-md-3">
                            <!-- Add other fields for Section 1 -->
                            <label for="rutEsposa" class="form-label">rutEsposa</label>
                            <input type="text" class="form-control" id="rutEsposa" name="rutEsposa" value="{{ $diacono->RutEsposa }}">
                        </div>
                        <div class="col-md-3">
                            <!-- Add other fields for Section 1 -->
                            <label for="fechaNacimientoEsposa" class="form-label">fechaNacimientoEsposa</label>
                            <input type="date" class="form-control" id="fechaNacimientoEsposa" name="fechaNacimientoEsposa" value="{{ $diacono->FechaNacimientoEsposa }}">
                        </div>
                        <div class="col-md-3">
                            <!-- Add other fields for Section 1 -->
                            <label for="fechaMatrimonio" class="form-label">fechaMatrimonio</label>
                            <input type="date" class="form-control" id="fechaMatrimonio" name="fechaMatrimonio" value="{{ $diacono->FechaMatrimonio }}">
                        </div>
                        <div class="col-md-3">
                            <!-- Add other fields for Section 1 -->
                            <label for="fechaDefuncionEsposa" class="form-label">fechaDefuncionEsposa</label>
                            <input type="date" class="form-control" id="fechaDefuncionEsposa" name="fechaDefuncionEsposa" value="{{ $diacono->FechaDefuncionEsposa }}">
                        </div>
                    </div>
                </div>
                <!-- Repeat similar structures for the remaining sections -->
                <hr>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
        </div>
    </div>
</div>

