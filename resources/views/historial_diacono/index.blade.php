@include('headers.historial_diacono')

          <!-- Begin Page Content -->
          <div class="container-fluid">
            <h1 class="h3 mb-2 text-gray-800">Historial Diaconos</h1>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">

                    <button type="button" class="btn btn-success btn-icon-split" data-bs-toggle="modal" data-bs-target="#createhistorial_diaconoModal">
                        <span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                        </span> <span class="text">Añadir Evento</span>
                    </button>

                </div>
                <div class="modal fade" id="createhistorial_diaconoModal" tabindex="-1" role="dialog" aria-labelledby="createhistorial_diaconolLabel" aria-hidden="true">
                    @include('historial_diacono.create')
                </div>
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-gray-800" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                <th>Rut Diacono</th>
                                <th>Codigo</th>
                                <th>Codigo del Evento</th>
                                <th>Fecha del Evento</th>
                                <th>Comentarios</th>
                                <th>Codigo de Usuario</th>
                                <th>Editar</th>
                                <th>Eliminar</th> <!-- Add a new column for actions -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($historial_diacono as $HISTORIAL_DIACONO)
                                <tr>
                                    <td>{{ $HISTORIAL_DIACONO->RutDiacono }}</td>
                                    <td>{{ $HISTORIAL_DIACONO->NumeroSecuenciaEvento }}</td>
                                    <td>{{ $HISTORIAL_DIACONO->CodigoTipoEvento }}</td>
                                    <td>{{ $HISTORIAL_DIACONO->FechaEvento }}</td>
                                    <td>{{ $HISTORIAL_DIACONO->ComentariosEvento}}</td>
                                    <td>{{ $HISTORIAL_DIACONO->CodigoUsuarioRegistro }}</td>

                                    <td>

                                        <a data-bs-toggle="modal" data-bs-target="#edithistorial_diaconoModal{{ $HISTORIAL_DIACONO->id }}" class="btn btn-primary btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-flag"></i>
                                            </span>
                                            <span class="text">Editar</span>
                                        </a>

                                        <div class="modal fade" id="edithistorial_diaconoModal{{ $HISTORIAL_DIACONO->id }}" tabindex="-1" role="dialog" aria-labelledby="editDiaconoModalLabel{{ $HISTORIAL_DIACONO->id }}" aria-hidden="true">
                                            @include('historial_diacono.edit', ['historial_diacono' => $HISTORIAL_DIACONO])
                                        </div> 
                                    </td>
                                    <td>
                                        <a href="#" onclick="event.preventDefault(); if(confirm('¿Estás seguro de que deseas borrar este registro?')) { document.getElementById('deleteHistorialDiaconoForm{{ $HISTORIAL_DIACONO->id }}').submit(); }">
                                            <button class="btn btn-danger btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                <span class="text">Borrar</span>
                                            </button>
                                        </a>
                                        
                                        <form id="deleteHistorialDiaconoForm{{ $HISTORIAL_DIACONO->id }}" method="post" action="{{ route('historial_diacono.destroy', $HISTORIAL_DIACONO->id) }}" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @include('footer.footer')
