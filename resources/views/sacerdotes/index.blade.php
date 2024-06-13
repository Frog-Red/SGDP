@include('headers.sacerdotes')
          <!-- Begin Page Content -->
          <div class="container-fluid">
            <div class="container-fluid">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
            
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif
            <h1 class="h3 mb-2 text-gray-800">Lista de Sacerdotes</h1>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between">
                    <div>
                        <button type="button" class="btn btn-success btn-icon-split" data-bs-toggle="modal" data-bs-target="#createSacerdoteModal">
                            <span class="icon text-white-50">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="text">Añadir sacerdote</span>
                        </button>
                        <div class="modal fade" id="createSacerdoteModal" tabindex="-1" role="dialog" aria-labelledby="createSacerdoteModalLabel" aria-hidden="true">
                            @include('sacerdotes.create')
                        </div>
                
                        <button type="button" class="btn btn-primary btn-icon-split" data-bs-toggle="modal" data-bs-target="#cargarSacerdotesModal">
                            <span class="icon text-white-50">
                                <i class="fas fa-upload"></i>
                            </span>
                            <span class="text">Carga Masiva de Sacerdotes</span>
                        </button>
                        <div class="modal fade" id="cargarSacerdotesModal" tabindex="-1" role="dialog" aria-labelledby="cargarSacerdotesModalLabel" aria-hidden="true">
                            @include('sacerdotes.carga_masiva')
                        </div>
                    </div>
                
                    <div>
                        <button href="#" type="button" class="btn btn-danger btn-icon-split" id="deleteAllSelectedRecord">
                            <span class="icon text-white-50">
                                <i class="fas fa-trash"></i>
                            </span>
                            <span class="text">Borrar seleccionados</span>
                        </button>
                    </div>
                </div>
                

                
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-gray-800" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                                    <th>Ver</th>
                                                    <th>Rut</th>
                                                    <th>Nombre</th>
                                                    <th>Vigencia</th>
                                                    <th>Nacimiento</th>
                                                    <th>Direccion</th>
                                                    <th>Correo Electronico</th>
                                                    <th>Indicador Defuncion</th>            
                                                    <th>Editar</th>
                                                    <th>Extra</th> <!-- Add a new column for actions -->
                                                    <th></th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($sacerdotes as $SACERDOTE)
                                                <tr id="sacerdote_ids{{$SACERDOTE->id}}"">
                                                    <td>
                                                            <button type="button" class="btn btn-info btn-icon-split" data-bs-toggle="modal" data-bs-target="#viewSacerdoteModal{{ $SACERDOTE->id }}" > <span class="icon text-white-50">
                                                                <i class="fas fa-info-circle"></i>
                                                            </span> <span class="text">Info</span></button>
                                                            
                                                            <div class="modal fade" id="viewSacerdoteModal{{ $SACERDOTE->id }}" tabindex="-1" role="dialog" aria-labelledby="viewSacerdoteModalLabel{{ $SACERDOTE->id }}" aria-hidden="true">
                                                                @include('sacerdotes.view', ['sacerdote' => $SACERDOTE])
                                                            </div>
                                                     </td>
                                                    <td>{{ $SACERDOTE->Rut }}</td>
                                                    <td>{{ $SACERDOTE->Nombre }}</td>
                                                    <td>{{ $SACERDOTE->EstadoVigencia }}</td>
                                                    <td>{{ $SACERDOTE->FechaNacimiento }}</td>
                                                    <td>{{ $SACERDOTE->DireccionParticular }}</td>
                                                    <td>{{ $SACERDOTE->CorreoElectronico }}</td>
                                                    <td>{{ $SACERDOTE->IndicadorDefuncion == 0 ? 'Vivo' : 'Fallecido' }}</td>

                                                    <td>
                                                        <a href="{{ route('sacerdotes.destroy', $SACERDOTE->id) }}" 
                                                            onclick="event.preventDefault(); if(confirm('¿Estás seguro de que deseas borrar este registro?')) { document.getElementById('delete-form-{{ $SACERDOTE->id }}').submit(); }"
                                                            class="btn btn-danger btn-icon-split">
                                                             <span class="icon text-white-50">
                                                                 <i class="fas fa-trash"></i>
                                                             </span>
                                                             <span class="text">Borrar</span>
                                                         </a>
                                                         
                                                         <form id="delete-form-{{ $SACERDOTE->id }}" 
                                                               action="{{ route('sacerdotes.destroy', $SACERDOTE->id) }}" 
                                                               method="post" 
                                                               style="display: none;">
                                                             @csrf
                                                             @method('DELETE')
                                                         </form>

                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                            </button>
                                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <li>
                                                                    <button class="dropdown-item edit-action" data-bs-toggle="modal" data-bs-target="#editSacerdoteModal{{ $SACERDOTE->id }}">
                                                                        Editar
                                                                    </button>
                                                                </li>
                                                        </div>
                                                        <div class="modal fade" id="editSacerdoteModal{{ $SACERDOTE->id }}" tabindex="-1" role="dialog" aria-labelledby="editSacerdoteModalLabel{{ $SACERDOTE->id }}" aria-hidden="true">
                                                            @include('sacerdotes.edit', ['sacerdote' => $SACERDOTE])
                                                        </div> 
                                                    </td>
                                                    
                                                    
                                                    <td><input type="checkbox" name ="ids" class="checkbox_ids" id ="" value="{{ $SACERDOTE->id }}"></td>


                                                </tr>
                                            @endforeach                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
    
                    </div>
                    <!-- /.container-fluid -->
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

                    <script>
                        $(function(e){
                            $("#deleteAllSelectedRecord").click(function(e){
                                e.preventDefault();
                                var all_ids = [];
                                $('input:checkbox[name=ids]:checked').each(function(){
                                    all_ids.push($(this).val());
                                });
                                if(all_ids.length > 0) {
                                    if(confirm("¿Estás seguro de que deseas borrar los registros seleccionados?")) {
                                        $.ajax({
                                            url:"{{route('sacerdote.delete')}}",
                                            type: "DELETE",
                                            data:{
                                                ids:all_ids,
                                                _token:'{{  csrf_token()  }}'
                                            },
                                            success:function(response){
                                                if(response.success) {
                                                    $.each(all_ids, function(key,val){
                                                        $('#sacerdote_ids'+val).remove();
                                                    });
                                                    alert("Registros eliminados exitosamente.");
                                                } else {
                                                    alert("Ha ocurrido un error al intentar eliminar los registros.");
                                                }
                                            },
                                            error:function(xhr, status, error) {
                                                console.log(xhr.responseText);
                                                alert("Ha ocurrido un error al intentar eliminar los registros.");
                                            }
                                        });
                                    }
                                } else {
                                    alert("Selecciona al menos un registro para eliminar.");
                                }
                            });
                        });
                    </script>


@include('footer.footer')

