@include('headers.tipo_evento')

          <!-- Begin Page Content -->
          <div class="container-fluid">
            <h1 class="h3 mb-2 text-gray-800">Lista de Eventos</h1>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">

                    <button type="button" class="btn btn-success btn-icon-split" data-bs-toggle="modal" data-bs-target="#createtipo_eventoModal">
                        <span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                        </span> <span class="text">Añadir Evento</span>
                    </button>

                </div>
                <div class="modal fade" id="createtipo_eventoModal" tabindex="-1" role="dialog" aria-labelledby="createtipo_eventoModalLabel" aria-hidden="true">
                    @include('tipo_evento.create')
                </div>
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-gray-800" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Codigo</th>
                                    <th>Nombre Evento</th>
                                    <th>Descripcion</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th> <!-- Add a new column for actions -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tipo_evento as $TIPO_EVENTO)
                                    <tr>
                                        <td>{{ $TIPO_EVENTO->CodigoTipoEvento }}</td>
                                        <td>{{ $TIPO_EVENTO->NombreTipoEvento }}</td>
                                        <td>{{ $TIPO_EVENTO->DescripcionTipoEvento }}</td>

                                        <td>

                                            <a data-bs-toggle="modal" data-bs-target="#edittipo_eventoModal{{ $TIPO_EVENTO->id }}" class="btn btn-primary btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-flag"></i>
                                                </span>
                                                <span class="text">Editar</span>
                                            </a>

                                            <div class="modal fade" id="edittipo_eventoModal{{ $TIPO_EVENTO->id }}" tabindex="-1" role="dialog" aria-labelledby="edittipo_eventoModalLabel{{ $TIPO_EVENTO->id }}" aria-hidden="true">
                                                @include('tipo_evento.edit', ['tipo_evento' => $TIPO_EVENTO])
                                            </div> 
                                        </td>
                                        <td>
                                            <a href="#" onclick="event.preventDefault(); if(confirm('¿Estás seguro de que deseas borrar este registro?')) { document.getElementById('deleteTipoEventoForm{{ $TIPO_EVENTO->id }}').submit(); }">
                                                <button class="btn btn-danger btn-icon-split">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                    <span class="text">Borrar</span>
                                                </button>
                                            </a>
                                            
                                            <form id="deleteTipoEventoForm{{ $TIPO_EVENTO->id }}" method="post" action="{{ route('tipo_evento.destroy', $TIPO_EVENTO->id) }}" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->
@include('footer.footer')