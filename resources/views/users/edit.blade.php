@php
        $userRoles = \App\Models\User::all();
@endphp


<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="editUserLabel">Editar Usuario</h5>
        </div>
        <div class="modal-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('users.update', $user->id) }}">
                @csrf
                @method('PUT')

                <label for="name">Nombre:</label>
                <input class="form-control" type="text" name="name" value="{{ $user->name }}" required>
                <hr>
                <label for="email">Correo:</label>
                <input class="form-control" type="email" name="email" value="{{ $user->email }}" required>
                <hr>
                <label>Roles:</label>
                @foreach($roles as $role)
                    <div>
                        <input type="checkbox" name="roles[]" value="{{ $role->id }}" {{ $user->roles->contains('id', $role->id) ? 'checked' : '' }}>
                        <label>{!! getFormattedRoleName($role->name) !!}</label>
                    </div>
                @endforeach            

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </form>

        </div>
    </div>
</div>
