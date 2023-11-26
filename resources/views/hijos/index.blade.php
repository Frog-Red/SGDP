@include('headers.hijos')

          
          <!-- Begin Page Content -->
          <div class="container-fluid">
            <h1 class="h3 mb-2 text-gray-800">Lista de Hijos</h1>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <!-- Button to trigger modal -->
                    <button type="button" class="btn btn-success btn-icon-split" data-bs-toggle="modal" data-bs-target="#createHijoModal">
                        <span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                        </span>
                        <span class="text">Añadir Hijo</span>
                    </button>
                </div>
                <div class="modal fade" id="createHijoModal" tabindex="-1" role="dialog" aria-labelledby="createHijoModalLabel" aria-hidden="true">
                    @include('hijos.create')
                </div>
                <div class="card-body">
                    <div class="table-container table-responsive">
                        <table class="table table-bordered text-gray-800" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Rut Diacono padre</th>
                                    <th>Rut Hijo</th>
                                    <th>sexo</th>
                                    <th>Nombre</th>
                                    <th>Fecha de nacimiento</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th> <!-- Add a new column for actions -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($hijos as $HIJOS)
                                    <tr>
                                        <td>{{ $HIJOS->RutDiáconoPadre }}</td>
                                        <td>{{ $HIJOS->RutHijo }}</td>
                                        <td>{{ $HIJOS->SexoHijo }}</td>
                                        <td>{{ $HIJOS->NombreHijo }}</td>
                                        <td>{{ $HIJOS->FechaNacimientoHijo }}</td>
                                        <td>

                                            <a data-bs-toggle="modal" data-bs-target="#editHijoModal{{ $HIJOS->id }}" class="btn btn-primary btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-flag"></i>
                                                </span>
                                                <span class="text">Editar</span>
                                            </a>

                                            <div class="modal fade" id="editHijoModal{{ $HIJOS->id }}" tabindex="-1" role="dialog" aria-labelledby="editHijoModalLabel{{ $HIJOS->id }}" aria-hidden="true">
                                                @include('hijos.edit', ['hijos' => $HIJOS])
                                            </div> 
                                        </td>
                                        <td>
                                            <form method="post" action="{{ route('hijos.destroy', $HIJOS->id) }}">
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