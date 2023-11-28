@include('headers.vicaria_ambiental')

          <!-- Begin Page Content -->
          <div class="container-fluid">
            <h1 class="h3 mb-2 text-gray-800">Vicaria Ambiental</h1>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">

                    <button type="button" class="btn btn-success btn-icon-split" data-bs-toggle="modal" data-bs-target="#createvicaria_ambientalModal">
                        <span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                        </span> <span class="text">Añadir Vicaria Ambiental</span>
                    </button>

                </div>
                <div class="modal fade" id="createvicaria_ambientalModal" tabindex="-1" role="dialog" aria-labelledby="createvicaria_ambientalModalLabel" aria-hidden="true">
                    @include('vicaria_ambiental.create')
                </div>
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-gray-800" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Codigo</th>
                                    <th>Nombre</th>
                                    <th>Direccion</th>
                                    <th>Telefono</th>
                                    <th>Correo Electronico</th>
                                    <th>Nombre del Vicario</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th> <!-- Add a new column for actions -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($vicaria_ambiental as $VICARIA_AMBIENTAL)
                                    <tr>
                                        <td>{{ $VICARIA_AMBIENTAL->CodigoVicariaAmbiental }}</td>
                                        <td>{{ $VICARIA_AMBIENTAL->NombreVicariaAmbiental }}</td>
                                        <td>{{ $VICARIA_AMBIENTAL->DireccionVicariaAmbiental }}</td>
                                        <td>{{ $VICARIA_AMBIENTAL->TelefonoVicariaAmbiental }}</td>
                                        <td>{{ $VICARIA_AMBIENTAL->CorreoElectronicoVicariaAmbiental }}</td>
                                        <td>{{ $VICARIA_AMBIENTAL->NombreVicario }}</td>

                                        <td>

                                            <a data-bs-toggle="modal" data-bs-target="#editvicaria_ambientalModal{{ $VICARIA_AMBIENTAL->id }}" class="btn btn-primary btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-flag"></i>
                                                </span>
                                                <span class="text">Editar</span>
                                            </a>

                                            <div class="modal fade" id="editvicaria_ambientalModal{{ $VICARIA_AMBIENTAL->id }}" tabindex="-1" role="dialog" aria-labelledby="editvicaria_ambientalModalLabel{{ $VICARIA_AMBIENTAL->id }}" aria-hidden="true">
                                                @include('vicaria_ambiental.edit', ['vicaria_ambiental' => $VICARIA_AMBIENTAL])
                                            </div> 
                                        </td>
                                        <td>
                                            <a href="#" onclick="event.preventDefault(); if(confirm('¿Estás seguro de que deseas borrar este registro?')) { document.getElementById('deleteVicariaAmbientalForm{{ $VICARIA_AMBIENTAL->id }}').submit(); }">
                                                <button class="btn btn-danger btn-icon-split">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                    <span class="text">Borrar</span>
                                                </button>
                                            </a>
                                            
                                            <form id="deleteVicariaAmbientalForm{{ $VICARIA_AMBIENTAL->id }}" method="post" action="{{ route('vicaria_ambiental.destroy', $VICARIA_AMBIENTAL->id) }}" style="display: none;">
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
