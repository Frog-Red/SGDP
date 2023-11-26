@include('headers.rol_diacono')

          <!-- Begin Page Content -->
          <div class="container-fluid">
            <h1 class="h3 mb-2 text-gray-800">Lista de Roles / Diaconos</h1>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">

                    <button type="button" class="btn btn-success btn-icon-split" data-bs-toggle="modal" data-bs-target="#createrol_diaconoModal">
                        <span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                        </span> <span class="text">Añadir Rol</span>
                    </button>

                </div>
                <div class="modal fade" id="createrol_diaconoModal" tabindex="-1" role="dialog" aria-labelledby="createrol_diaconoModalLabel" aria-hidden="true">
                    @include('rol_diacono.create')
                </div>
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-gray-800" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Rut Diacono</th>
                                    <th>Codigo Rol</th>
                                    <th>Fecha asignacion</th>
                                    <th>Comentarios</th>
                                    <th>Nombre asignador del rol</th>
                                    <th>Codigo del usuario registro</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th> <!-- Add a new column for actions -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rol_diacono as $ROL_DIACONO)
                                    <tr>
                                        <td>{{ $ROL_DIACONO->RutDiacono }}</td>
                                        <td>{{ $ROL_DIACONO->CodigoRol }}</td>
                                        <td>{{ $ROL_DIACONO->FechaAsignacionRol }}</td>
                                        <td>{{ $ROL_DIACONO->ComentarioAsignacionRol }}</td>
                                        <td>{{ $ROL_DIACONO->NombreAsignadorRol }}</td>
                                        <td>{{ $ROL_DIACONO->CodigoUsuarioRegistro }}</td>

                                        <td>

                                            <a data-bs-toggle="modal" data-bs-target="#editrol_diaconoModal{{ $ROL_DIACONO->id }}" class="btn btn-primary btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-flag"></i>
                                                </span>
                                                <span class="text">Editar</span>
                                            </a>

                                            <div class="modal fade" id="editrol_diaconoModal{{ $ROL_DIACONO->id }}" tabindex="-1" role="dialog" aria-labelledby="editrol_diaconoModalLabel{{ $ROL_DIACONO->id }}" aria-hidden="true">
                                                @include('rol_diacono.edit', ['rol_diacono' => $ROL_DIACONO])
                                            </div> 
                                        </td>
                                        <td>
                                            <form method="post" action="{{ route('rol_diacono.destroy', $ROL_DIACONO->id) }}">
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

