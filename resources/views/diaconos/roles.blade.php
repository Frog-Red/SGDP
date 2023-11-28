@php
    $rol_diacono = \App\Models\rol_diacono::all(); // Replace with your actual namespace and model
@endphp

<div class="modal-dialog modal-l" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="viewDiaconoModalLabel">Roles del Diacono</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <!-- Display Diacono Information in a Grid -->
        
            <div class="mb-3">
                            <div class="col-md-0">
                        <p><strong>Nombre:</strong> {{ $diacono->Nombre }}</p>
                    </div>
                    <div class="col-md-0">
                        @foreach($diacono->roles as $index => $rolDiacono)
                            <p><strong>Rol: {{ $index + 1 }}:</strong> {{ $rolDiacono->CodigoRol }}</p>
                            <!-- Add additional information related to the role here if needed -->
                        @endforeach
                    </div>
            
                <hr>
            </div>
                

        

        </div>
        

            <!-- You can customize the content based on your Diacono model attributes -->
        </div>
    </div>
</div>
