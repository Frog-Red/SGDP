@include('headers.parroquia')

          <!-- Begin Page Content -->
          <div class="container-fluid">
            <h1 class="h3 mb-2 text-gray-800">Lista de Parroquias</h1>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">

                    <button type="button" class="btn btn-success btn-icon-split" data-bs-toggle="modal" data-bs-target="#createparroquiaModal">
                        <span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                        </span> <span class="text">Añadir Parroquia</span>
                    </button>

                </div>
                <div class="modal fade" id="createparroquiaModal" tabindex="-1" role="dialog" aria-labelledby="createparroquiaModalLabel" aria-hidden="true">
                    @include('parroquia.create')
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
                                    <th>Vicaria Zonal</th>
                                    <th>Nombre del Parroco</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($parroquia as $PARROQUIA)
                                    <tr>
                                        <td>{{ $PARROQUIA->CodigoParroquia }}</td>
                                        <td>{{ $PARROQUIA->NombreParroquia }}</td>
                                        <td>{{ $PARROQUIA->DireccionParroquia }}</td>
                                        <td>{{ $PARROQUIA->TelefonoParroquia }}</td>
                                        <td>{{ $PARROQUIA->CorreoElectronicoParroquia }}</td>
                                        <td>{{ $PARROQUIA->VicariaZonalPertenece }}</td>
                                        <td>{{ $PARROQUIA->NombreParroco }}</td>

                                        <td>

                                            <a data-bs-toggle="modal" data-bs-target="#editparroquiaModal{{ $PARROQUIA->id }}" class="btn btn-primary btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-flag"></i>
                                                </span>
                                                <span class="text">Editar</span>
                                            </a>

                                            <div class="modal fade" id="editparroquiaModal{{ $PARROQUIA->id }}" tabindex="-1" role="dialog" aria-labelledby="editparroquiaModalLabel{{ $PARROQUIA->id }}" aria-hidden="true">
                                                @include('parroquia.edit', ['parroquia' => $PARROQUIA])
                                            </div> 
                                        </td>
                                        <td>
                                            <form method="post" action="{{ route('parroquia.destroy', $PARROQUIA->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-icon-split">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                    <span class="text">Borrar</span>
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->
@include('footer.footer')
