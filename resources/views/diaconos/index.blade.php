@include('headers.diaconos')
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
            <h1 class="h3 mb-2 text-gray-800">Lista de Diaconos</h1>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between">
                    <div>
                        <button type="button" class="btn btn-success btn-icon-split" data-bs-toggle="modal" data-bs-target="#createDiaconoModal">
                            <span class="icon text-white-50">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="text">Añadir diácono</span>
                        </button>
                        <div class="modal fade" id="createDiaconoModal" tabindex="-1" role="dialog" aria-labelledby="createDiaconoModalLabel" aria-hidden="true">
                            @include('diaconos.create')
                        </div>
                
                        <button type="button" class="btn btn-primary btn-icon-split" data-bs-toggle="modal" data-bs-target="#cargarDiaconosModal">
                            <span class="icon text-white-50">
                                <i class="fas fa-upload"></i>
                            </span>
                            <span class="text">Carga Masiva de Diáconos</span>
                        </button>
                        <div class="modal fade" id="cargarDiaconosModal" tabindex="-1" role="dialog" aria-labelledby="cargarDiaconosModalLabel" aria-hidden="true">
                            @include('diaconos.carga_masiva')
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
                                                    <th>Eliminar</th> <!-- Add a new column for actions -->
                                                    <th></th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($diaconos as $DIACONO)
                                                <tr id="diacono_ids{{$DIACONO->id}}"">
                                                    <td>
                                                            <button type="button" class="btn btn-info btn-icon-split" data-bs-toggle="modal" data-bs-target="#viewDiaconoModal{{ $DIACONO->id }}" > <span class="icon text-white-50">
                                                                <i class="fas fa-info-circle"></i>
                                                            </span> <span class="text">Info</span></button>
                                                            
                                                            <div class="modal fade" id="viewDiaconoModal{{ $DIACONO->id }}" tabindex="-1" role="dialog" aria-labelledby="viewDiaconoModalLabel{{ $DIACONO->id }}" aria-hidden="true">
                                                                @include('diaconos.view', ['diacono' => $DIACONO])
                                                            </div>
                                                     </td>
                                                    <td>{{ $DIACONO->Rut }}</td>
                                                    <td>{{ $DIACONO->Nombre }}</td>
                                                    <td>{{ $DIACONO->EstadoVigencia }}</td>
                                                    <td>{{ $DIACONO->FechaNacimiento }}</td>
                                                    <td>{{ $DIACONO->DireccionParticular }}</td>
                                                    <td>{{ $DIACONO->CorreoElectronico }}</td>
                                                    <td>{{ $DIACONO->IndicadorDefuncion == 0 ? 'Vivo' : 'Fallecido' }}</td>

                                                    <td>

                                                        <a data-bs-toggle="modal" data-bs-target="#editDiaconoModal{{ $DIACONO->id }}" class="btn btn-primary btn-icon-split">
                                                            <span class="icon text-white-50">
                                                                <i class="fas fa-flag"></i>
                                                            </span>
                                                            <span class="text">Editar</span>
                                                        </a>

                                                        <div class="modal fade" id="editDiaconoModal{{ $DIACONO->id }}" tabindex="-1" role="dialog" aria-labelledby="editDiaconoModalLabel{{ $DIACONO->id }}" aria-hidden="true">
                                                            @include('diaconos.edit', ['diacono' => $DIACONO])
                                                        </div> 
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('diaconos.destroy', $DIACONO->id) }}" 
                                                            onclick="event.preventDefault(); if(confirm('¿Estás seguro de que deseas borrar este registro?')) { document.getElementById('delete-form-{{ $DIACONO->id }}').submit(); }"
                                                            class="btn btn-danger btn-icon-split">
                                                             <span class="icon text-white-50">
                                                                 <i class="fas fa-trash"></i>
                                                             </span>
                                                             <span class="text">Borrar</span>
                                                         </a>
                                                         
                                                         <form id="delete-form-{{ $DIACONO->id }}" 
                                                               action="{{ route('diaconos.destroy', $DIACONO->id) }}" 
                                                               method="post" 
                                                               style="display: none;">
                                                             @csrf
                                                             @method('DELETE')
                                                         </form>

                                                    </td>
                                                    <td><input type="checkbox" name ="ids" class="checkbox_ids" id ="" value="{{ $DIACONO->id }}"></td>


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
                                            url:"{{route('diacono.delete')}}",
                                            type: "DELETE",
                                            data:{
                                                ids:all_ids,
                                                _token:'{{  csrf_token()  }}'
                                            },
                                            success:function(response){
                                                if(response.success) {
                                                    $.each(all_ids, function(key,val){
                                                        $('#diacono_ids'+val).remove();
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

