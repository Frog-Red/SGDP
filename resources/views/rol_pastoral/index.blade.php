<!-- resources/views/welcome.blade.php -->
@include('headers.rol_pastoral')

          <!-- Begin Page Content -->
          <div class="container-fluid">
            <h1 class="h3 mb-2 text-gray-800">Lista de Roles Pastorales</h1>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">

                    <button type="button" class="btn btn-success btn-icon-split" data-bs-toggle="modal" data-bs-target="#createrol_pastoralModal">
                        <span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                        </span> <span class="text">Añadir Rol</span>
                    </button>

                </div>
                <div class="modal fade" id="createrol_pastoralModal" tabindex="-1" role="dialog" aria-labelledby="createrol_pastoralModalLabel" aria-hidden="true">
                    @include('rol_pastoral.create')
                </div>
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-gray-800" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Codigo</th>
                                    <th>Nombre</th>
                                    <th>Descripcion del Rol</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th> <!-- Add a new column for actions -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rol_pastoral as $ROL_PASTORAL)
                                    <tr>
                                        <td>{{ $ROL_PASTORAL ->CodigoRolPastoral }}</td>
                                        <td>{{ $ROL_PASTORAL ->NombreRol}}</td>
                                        <td>{{ $ROL_PASTORAL ->DescripcionRol}}</td>

                                        <td>

                                            <a data-bs-toggle="modal" data-bs-target="#editrol_pastoralModal{{ $ROL_PASTORAL ->id }}" class="btn btn-primary btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-flag"></i>
                                                </span>
                                                <span class="text">Editar</span>
                                            </a>

                                            <div class="modal fade" id="editrol_pastoralModal{{ $ROL_PASTORAL ->id }}" tabindex="-1" role="dialog" aria-labelledby="editrol_pastoralModalLabel{{ $ROL_PASTORAL ->id }}" aria-hidden="true">
                                                @include('rol_pastoral.edit', ['rol_pastoral' => $ROL_PASTORAL])
                                            </div> 
                                        </td>
                                        <td>
                                            <a href="#" onclick="event.preventDefault(); if(confirm('¿Estás seguro de que deseas borrar este registro?')) { document.getElementById('deleteRolPastoralForm{{ $ROL_PASTORAL->id }}').submit(); }">
                                                <button class="btn btn-danger btn-icon-split">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                    <span class="text">Borrar</span>
                                                </button>
                                            </a>
                                            
                                            <form id="deleteRolPastoralForm{{ $ROL_PASTORAL->id }}" method="post" action="{{ route('rol_pastoral.destroy', $ROL_PASTORAL->id) }}" style="display: none;">
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
