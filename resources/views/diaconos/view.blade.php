<div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="viewDiaconoModalLabel">Ver Información del Diacono</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <!-- Display Diacono Information in a Grid -->
        
            <div class="mb-3">
                <h5 class="mb-4"><strong class="text-dark">Datos del Diacono</strong></h5>
        
                <div class="row">
                    <div class="col-md-4">
                        <p><strong>Nombre:</strong> {{ $diacono->Nombre }}</p>
                    </div>
        
                    <div class="col-md-4">
                        <p><strong>Rut:</strong> {{ $diacono->Rut }}</p>
                    </div>
        
                    <div class="col-md-4">
                        <p><strong>Estado de Vigencia:</strong> {{ $diacono->EstadoVigencia }}</p>
                    </div>
        
                    <div class="col-md-4">
                        <p><strong>Fecha Nacimiento:</strong> {{ $diacono->FechaNacimiento }}</p>
                    </div>
        
                    <div class="col-md-4">
                        <p><strong>Profesion:</strong> {{ $diacono->ProfesionOficio }}</p>
                    </div>
        
                    <div class="col-md-4">
                        <p><strong>Direccion:</strong> {{ $diacono->DireccionParticular }}</p>
                    </div>
        
                    <div class="col-md-4">
                        <p><strong>Telefono Celular:</strong> {{ $diacono->TelefonoCelular }}</p>
                    </div>
        
                    <div class="col-md-4">
                        <p><strong>Telefono Fijo:</strong> {{ $diacono->TelefonoFijo }}</p>
                    </div>
                </div>
                <hr>
            </div>
        
            <div class="mb-3">
                <h5 class="mb-4"><strong class="text-dark">Datos de Ordenacion</strong></h5>
        
                <div class="row">
                    <div class="col-md-4">
                        <p><strong>Fecha de Ordenacion:</strong> {{ $diacono->FechaOrdenacion }}</p>
                    </div>
        
                    <div class="col-md-4">
                        <p><strong>Lugar de Ordenacion:</strong> {{ $diacono->LugarOrdenacion }}</p>
                    </div>
        
                    <div class="col-md-4">
                        <p><strong>Obispo que Ordeno:</strong> {{ $diacono->NombreObispoOrdeno }}</p>
                    </div>
        
                    <div class="col-md-4">
                        <p><strong>Parroquia Asignada:</strong> {{ $diacono->ParroquiaAsignada }}</p>
                    </div>
        
                    <div class="col-md-4">
                        <p><strong>Vicaria Ambiental:</strong> {{ $diacono->VicariaAmbientalAsignada }}</p>
                    </div>
                </div>
                <hr>
            </div>
        
            <div class="mb-3">
                <h5 class="mb-4"><strong class="text-dark">Indicador de defuncion</strong></h5>
        
                <div class="row">
                    <div class="col-md-4">
                        <p><strong>Indicador de Defuncion:</strong> {{ $diacono->IndicadorDefuncion == 0 ? 'Vivo' : 'Fallecido' }}</p>
                    </div>
        
                    @if($diacono->IndicadorDefuncion == 1)
                        <div class="col-md-4">
                            <p><strong>Fecha de Defuncion:</strong> {{ $diacono->FechaDefuncion }}</p>
                        </div>
                    @endif
                </div>
                <hr>
            </div>
        
            <div class="mb-3">
                <h5 class="mb-4"><strong class="text-dark">Informacion Civil</strong></h5>

        
                <div class="row">
                    <div class="col-md-4">
                        <p><strong>Estado Civil:</strong> {{ $diacono->EstadoCivil }}</p>
                    </div>

                    @if($diacono->EstadoCivil == 'casado')

                    <div class="col-md-4">
                        <p><strong>Nombre Esposa:</strong> {{ $diacono->NombreEsposa }}</p>
                    </div>
        
                    <div class="col-md-4">
                        <p><strong>Rut Esposa:</strong> {{ $diacono->RutEsposa }}</p>
                    </div>
        
                    <div class="col-md-4">
                        <p><strong>Nacimiento Esposa:</strong> {{ $diacono->FechaNacimientoEsposa }}</p>
                    </div>
        
                    <div class="col-md-4">
                        <p><strong>Fecha Matrimonio:</strong> {{ $diacono->FechaMatrimonio }}</p>
                    </div>
                    @endif

        
                    @if($diacono->EstadoCivil == 'viudo')
                    <div class="col-md-4">
                        <p><strong>Fecha Defuncion Esposa:</strong> {{ $diacono->FechaDefuncionEsposa }}</p>
                    </div>
                    <div class="col-md-4">
                        <p><strong>Nombre Esposa:</strong> {{ $diacono->NombreEsposa }}</p>
                    </div>
        
                    <div class="col-md-4">
                        <p><strong>Rut Esposa:</strong> {{ $diacono->RutEsposa }}</p>
                    </div>
        
                    <div class="col-md-4">
                        <p><strong>Nacimiento Esposa:</strong> {{ $diacono->FechaNacimientoEsposa }}</p>
                    </div>
        
                    <div class="col-md-4">
                        <p><strong>Fecha Matrimonio:</strong> {{ $diacono->FechaMatrimonio }}</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        

            <!-- You can customize the content based on your Diacono model attributes -->
        </div>
    </div>
</div>
