@php
    $rol_diacono = \App\Models\rol_diacono::all(); // Replace with your actual namespace and model
@endphp

<div class="modal-dialog modal-l" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="viewDiaconoModalLabel">Historial del Diacono</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <!-- Display Diacono Information in a Grid -->
        
            <div class="mb-3">
         
                    <div class="col-md-8">
                        <p><strong>Nombre:</strong> {{ $diacono->Nombre }}</p>
                    </div>
                    <hr>
                    <div class="col-md-12">
                        @foreach($diacono->historial_diacono as $historial)
                            <p>
                                <strong>Numero de Secuencia:</strong> {{ $historial->NumeroSecuenciaEvento }}<br>
                                    <strong> Codigo Tipo de Evento: </strong>{{ $historial->CodigoTipoEvento }}<br>
                                        <strong>Fecha del Evento: </strong>{{ $historial->FechaEvento }}<br>
                                            <strong> Comentarios del Evento:</strong> {{ $historial->ComentariosEvento }}
                                <hr>
                            </p>
                        @endforeach
                    </div>
            
                <hr>
            </div>
                

        

        </div>
        

            <!-- You can customize the content based on your Diacono model attributes -->
        </div>
    </div>
</div>
