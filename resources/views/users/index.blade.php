<!-- resources/views/users/index.blade.php -->
@include('headers.users')
          <!-- Begin Page Content -->
          <div class="container-fluid">
            <h1 class="h3 mb-2 text-gray-800">Lista de Usuarios</h1>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">


                <div class="card-header py-3">
                    <button id="openCreateUserModalButton" class="btn btn-success btn-icon-split" data-bs-toggle="modal" data-bs-target="#createUserModal">
                        <span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                        </span>
                        <span class="text">Agregar Usuario</span>
                    </button>
                </div>
                <div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="createUserModalLabel" aria-hidden="true">
                    @include('users.create')
                </div>

                 
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-gray-800" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre de usuario</th>
                                    <th>Correo</th>
                                    <th>Roles</th>
                                    <th>Editar Usuario</th>
                                    <th>Borrar Usuario</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @foreach($user->roles as $index => $role)
                                                {!! getFormattedRoleName($role->name) !!}
                                                @if($index < count($user->roles) - 1)
                                                    | <!-- Display "|" if there are more roles -->
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            <div class="text-center">

                                            <a data-bs-toggle="modal" data-bs-target="#editUserModal{{ $user->id }}" class="btn btn-primary btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-flag"></i>
                                                </span>
                                                <span class="text">Editar</span>
                                            </a>
                                            </div>
                                
                                            <div class="modal fade" id="editUserModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel{{ $user->id }}" aria-hidden="true">
                                                @include('users.edit', ['user' => $user, 'roles' => $roles])
                                            </div> 
                                        </td>
                                        <td>
                                            <div class="text-center">
                                                <a href="#" onclick="event.preventDefault(); if(confirm('¿Estás seguro de que deseas borrar este usuario?')) { document.getElementById('deleteUserForm{{ $user->id }}').submit(); }">
                                                    <button class="btn btn-danger btn-icon-split">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-trash"></i>
                                                        </span>
                                                        <span class="text">Borrar</span>
                                                    </button>
                                                </a>
                                            
                                                <form id="deleteUserForm{{ $user->id }}" method="post" action="{{ route('users.destroy', $user->id) }}" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            


                            @php
    function getFormattedRoleName($roleName)
    {
        $roleMappings = [
            'administrador' => 'Administrador',
            'mantenedor' => 'Mantenedor',
            'usuario_general' => 'Usuario General',
            // Add more mappings as needed
        ];

        $formattedRoleName = $roleMappings[$roleName] ?? $roleName;

        return "<strong>{$formattedRoleName}</strong>";
    }
@endphp
                                                        
</table>
</div>
</div>
</div>

</div>
<!-- /.container-fluid -->
@include('footer.footer')

