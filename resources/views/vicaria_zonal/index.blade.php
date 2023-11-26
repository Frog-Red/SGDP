@include('headers.vicaria_zonal')

          <!-- Begin Page Content -->
          <div class="container-fluid">
            <h1 class="h3 mb-2 text-gray-800">Vicarias Zonales</h1>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">

                    <button type="button" class="btn btn-success btn-icon-split" data-bs-toggle="modal" data-bs-target="#createvicaria_zonalModal">
                        <span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                        </span> <span class="text">Añadir Vicaria Zonal</span>
                    </button>

                </div>
                <div class="modal fade" id="createvicaria_zonalModal" tabindex="-1" role="dialog" aria-labelledby="createvicaria_zonalModalLabel" aria-hidden="true">
                    @include('vicaria_zonal.create')
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
                                    <th>Nombre del Vicario Zonal</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th> <!-- Add a new column for actions -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($vicaria_zonal as $VICARIA)
                                    <tr>
                                        <td>{{ $VICARIA->CodigoVicariaZonal }}</td>
                                        <td>{{ $VICARIA->NombreVicariaZonal }}</td>
                                        <td>{{ $VICARIA->DireccionVicariaZonal }}</td>
                                        <td>{{ $VICARIA->TelefonoVicariaZonal }}</td>
                                        <td>{{ $VICARIA->CorreoElectronicoVicariaZonal }}</td>
                                        <td>{{ $VICARIA->NombreVicarioZonal }}</td>

                                        <td>

                                            <a data-bs-toggle="modal" data-bs-target="#editvicaria_zonalModal{{ $VICARIA->id }}" class="btn btn-primary btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-flag"></i>
                                                </span>
                                                <span class="text">Editar</span>
                                            </a>

                                            <div class="modal fade" id="editvicaria_zonalModal{{ $VICARIA->id }}" tabindex="-1" role="dialog" aria-labelledby="editvicaria_zonalModalLabel{{ $VICARIA->id }}" aria-hidden="true">
                                                @include('vicaria_zonal.edit', ['vicaria_zonal' => $VICARIA])
                                            </div> 
                                        </td>
                                        <td>
                                            <form method="post" action="{{ route('vicaria_zonal.destroy', $VICARIA->id) }}">
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->
@include('footer.footer')
