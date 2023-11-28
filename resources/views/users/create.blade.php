    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createUserModalLabel">Crear Usuario</h5>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route('users.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre de usuario:</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <hr>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo:</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <hr>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña:</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <hr>
                    <div class="mb-3">
                        <label class="form-label">Roles:</label>
                        @foreach($roles as $role)
                            <div class="form-check">
                                <input type="checkbox" name="roles[]" value="{{ $role->id }}" class="form-check-input">
                                <label class="form-check-label"> {!! getFormattedRoleName($role->name) !!}</label>
                            </div>
                        @endforeach
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Crear Usuario</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </form>
                
            </div>
            
        </div>
</div>

