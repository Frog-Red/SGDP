<div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="viewSacerdoteModalLabel">Información del Sacerdote</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <!-- Display Sacerdote Information in a Grid -->
        
            <div class="mb-3">
                <h5 class="mb-4"><strong class="text-dark">Datos del Sacerdote</strong></h5>
        
                <div class="row">
                    <div class="col-md-4">
                        <p><strong>Nombre:</strong> {{ $sacerdote->Nombre }}</p>
                    </div>
        
                    <div class="col-md-4">
                        <p><strong>Rut:</strong> {{ $sacerdote->Rut }}</p>
                    </div>
        
                    <div class="col-md-4">
                        <p><strong>Estado de Vigencia:</strong> {{ $sacerdote->EstadoVigencia }}</p>
                    </div>
        
                    <div class="col-md-4">
                        <p><strong>Fecha Nacimiento:</strong> {{ $sacerdote->FechaNacimiento }}</p>
                    </div>
        
                    <div class="col-md-4">
                        <p><strong>Profesion:</strong> {{ $sacerdote->ProfesionOficio }}</p>
                    </div>
        
                    <div class="col-md-4">
                        <p><strong>Direccion:</strong> {{ $sacerdote->DireccionParticular }}</p>
                    </div>
        
                    <div class="col-md-4">
                        <p><strong>Telefono Celular:</strong> {{ $sacerdote->TelefonoCelular }}</p>
                    </div>
        
                    <div class="col-md-4">
                        <p><strong>Telefono Fijo:</strong> {{ $sacerdote->TelefonoFijo }}</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <p><strong>Fecha de Ordenacion:</strong> {{ $sacerdote->FechaOrdenacion }}</p>
                    </div>
        
                    <div class="col-md-4">
                        <p><strong>Lugar de Ordenacion:</strong> {{ $sacerdote->LugarOrdenacion }}</p>
                    </div>
        
                    <div class="col-md-4">
                        <p><strong>Obispo que Ordeno:</strong> {{ $sacerdote->NombreObispoOrdeno }}</p>
                    </div>
        
                    <div class="col-md-4">
                        <p><strong>Parroquia Asignada:</strong> {{ $sacerdote->ParroquiaAsignada }}</p>
                    </div>
        
                    <div class="col-md-4">
                        <p><strong>Vicaria Asignada:</strong> {{ $sacerdote->VicariaAmbientalAsignada }}</p>
                    </div>

                    <div class="col-md-4">
                        <p><strong>Numero de Decreto:</strong> {{ $sacerdote->NumeroDecreto }}</p>
                    </div>
                </div>
                <hr>
            </div>

        
            <div class="mb-3">
                <h5 class="mb-4"><strong class="text-dark">Indicador de defuncion</strong></h5>
        
                <div class="row">
                    <div class="col-md-4">
                        <p><strong>Indicador de Defuncion:</strong> {{ $sacerdote->IndicadorDefuncion == 0 ? 'Vivo' : 'Fallecido' }}</p>
                    </div>
        
                    @if($sacerdote->IndicadorDefuncion == 1)
                        <div class="col-md-4">
                            <p><strong>Fecha de Defuncion:</strong> {{ $sacerdote->FechaDefuncion }}</p>
                        </div>
                    @endif
                </div>
                <hr>
            </div>

        </div>
        

            <!-- You can customize the content based on your Sacerdote model attributes -->
        </div>
    </div>
</div>
