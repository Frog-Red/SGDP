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

            <form method="post" action="{{ route('sacerdotes.update', $sacerdote->id) }}">
                @csrf
                @method('PUT')

                <!-- Section 1 -->
                <div class="mb-3">
                    <h5 class="mb-4"><strong class="text-dark">Datos del Sacerdote</strong></h5>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $sacerdote->Nombre }}" required>
                        </div>
                        <div class="col-md-3">
                            <!-- Add other fields for Section 1 -->
                            <label for="rut" class="form-label">Rut:</label>
                            <input type="text" class="form-control" id="rut" name="rut" value="{{ $sacerdote->Rut }}" required>
                        </div>
                        <div class="col-md-3">
                            <!-- Add other fields for Section 1 -->
                            <label for="estadoVigencia" class="form-label">Estado de vigencia:</label>
                            <select class="form-control" id="estadoVigencia" name="estadoVigencia" onchange="toggleestadoVigenciaOptions()">
                                <option value="Activo" @if($sacerdote->EstadoVigencia == 'Activo') selected @endif>Activo</option>
                                <option value="Suspendido" @if($sacerdote->EstadoVigencia == 'Suspendido') selected @endif>Suspendido</option>
                                <option value="Dimitido" @if($sacerdote->EstadoVigencia == 'Dimitido') selected @endif>Dimitido</option>
                                <option value="Fallecido" @if($sacerdote->EstadoVigencia == 'Fallecido') selected @endif>Fallecido</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <!-- Add other fields for Section 1 -->
                            <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento:</label>
                            <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" value="{{ $sacerdote->FechaNacimiento }}" required>
                        </div>
                        <div class="col-md-3">
                            <!-- Add other fields for Section 1 -->
                            <label for="profesionOficio" class="form-label">Profesión u Oficio:</label>
                            <input type="text" class="form-control" id="profesionOficio" name="profesionOficio" value="{{ $sacerdote->ProfesionOficio }}">
                        </div>
                        <div class="col-md-3">
                            <!-- Add other fields for Section 1 -->
                            <label for="direccionParticular" class="form-label">Dirección Particular:</label>
                            <input type="text" class="form-control" id="direccionParticular" name="direccionParticular" value="{{ $sacerdote->DireccionParticular }}">
                        </div>
                        <div class="col-md-3">
                            <!-- Add other fields for Section 1 -->
                            <label for="telefonoCelular" class="form-label">Teléfono Celular:</label>
                            <input type="text" class="form-control" id="telefonoCelular" name="telefonoCelular" value="{{ $sacerdote->TelefonoCelular }}">
                        </div>
                        <div class="col-md-3">
                            <!-- Add other fields for Section 1 -->
                            <label for="telefonoFijo" class="form-label">telefono Fijo:</label>
                            <input type="text" class="form-control" id="telefonoFijo" name="telefonoFijo" value="{{ $sacerdote->TelefonoFijo }}">
                        </div>
                        <div class="col-md-3">
                            <!-- Add other fields for Section 1 -->
                            <label for="correoElectronico" class="form-label">Correo Electrónico:</label>
                            <input type="email" class="form-control" id="correoElectronico" name="correoElectronico" value="{{ $sacerdote->CorreoElectronico }}">
                        </div>
                    </div>
                    <hr>
                        <div class="row">
                        <div class="col-md-3">
                            <label for="fechaOrdenacion" class="form-label">Fecha de Ordenacion:</label>
                            <input type="date" class="form-control" id="fechaOrdenacion" name="fechaOrdenacion" value="{{ $sacerdote->FechaOrdenacion }}" required>
                        </div>
                        <div class="col-md-3">
                            <!-- Add other fields for Section 1 -->
                            <label for="lugarOrdenacion" class="form-label">Lugar de Ordenación:</label>
                            <input type="text" class="form-control" id="lugarOrdenacion" name="lugarOrdenacion" value="{{ $sacerdote->LugarOrdenacion }}" required>
                        </div>
                        <div class="col-md-3">
                            <!-- Add other fields for Section 1 -->
                            <label for="nombreObispoOrdeno" class="form-label">Nombre del Obispo que Ordeno</label>
                            <input type="text" class="form-control" id="nombreObispoOrdeno" name="nombreObispoOrdeno" value="{{ $sacerdote->NombreObispoOrdeno }}">
                        </div>
                        <div class="col-md-3">
                            <label for="parroquiaAsignada" class="form-label">Parroquia asignada:</label>
                            <select class="form-control" id="parroquiaAsignada" name="parroquiaAsignada" required>
                                @foreach($parroquias as $parroquia)
                                    <option value="{{ $parroquia->NombreParroquia }}" {{ $sacerdote->ParroquiaAsignada == $parroquia->NombreParroquia ? 'selected' : '' }}>
                                        {{ $parroquia->NombreParroquia }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <!-- Add other fields for Section 1 -->
                            <label for="vicariaAmbientalAsignada" class="form-label">Vicaría Asignada</label>
                            <select class="form-control" id="vicariaAmbientalAsignada" name="vicariaAmbientalAsignada">
                                @foreach($vicaria_ambiental as $VICARIA)
                                    <option value="{{ $VICARIA->NombreVicariaAmbiental }}" {{ $sacerdote->VicariaAmbientalAsignada == $VICARIA->NombreVicariaAmbiental ? 'selected' : '' }}>
                                        {{ $VICARIA->NombreVicariaAmbiental }}
                                    </option>
                                @endforeach
                                @foreach($vicaria_zonal as $Z)
                                    <option value="{{ $Z->NombreVicariaZonal }}" {{ $sacerdote->VicariaAmbientalAsignada == $Z->NombreVicariaZonal ? 'selected' : '' }}>
                                        {{ $Z->NombreVicariaZonal }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <!-- Add other fields for Section 1 -->
                            <label for="numeroDecreto" class="form-label">Numero de Decreto:</label>
                            <input type="text" class="form-control" id="numeroDecreto" name="numeroDecreto" value="{{ $sacerdote->NumeroDecreto }}" required>
                        </div>
                    </div>
                    <hr>
                </div>
                
                <!-- Section 2 -->
                
                <div class="mb-3">
                    <h5 class="mb-4"><strong class="text-dark">Indicador de defuncion</strong></h5>
                    <div class="row">
                        <div class="col-md-3">
                            <!-- Use a select dropdown for indicadorDefuncion -->
                            <label for="indicadorDefuncion" class="form-label">Indicador de Defunción:</label>
                            <select class="form-control" id="indicadorDefuncion" name="indicadorDefuncion" onchange="toggleFechaDefuncionVisibility()">
                                <option value="0" @if($sacerdote->IndicadorDefuncion == 0) selected @endif>Vivo</option>
                                <option value="1" @if($sacerdote->IndicadorDefuncion == 1) selected @endif>Fallecido</option>
                            </select>
                        </div>
                    <div class="col-md-3">
                        <!-- Add other fields for Section 1 -->
                        <label for="fechaDefuncion" class="form-label">Fecha de Defuncion:</label>
                        <input type="date" class="form-control" id="fechaDefuncion" name="fechaDefuncion" value="{{ $sacerdote->FechaDefuncion }}">
                         </div>
                     </div>
                     <hr>
                </div>

                <!-- Repeat similar structures for the remaining sections -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Actualizar Sacerdote</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

