<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cambiar Contraseña</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('{{ asset('img/bg.jpg') }}');
            background-size: cover;
            background-position: center;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.8); /* Adjust the alpha value for background opacity */
        }

        .logo {
            margin: 3% auto 0; /* Added margin to the top, auto for centering horizontally */
            display: block; /* Ensure the logo is centered */
        }
    </style>
</head>

<body>
    <div class="text-center">
        <img src="{{ asset('img/logo.png') }}" class=logo>
    </div>
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Cambiar Contraseña</h1>
                                    </div>
                                    <form class="user" method="POST" action="{{ route('contrasena.post') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="current_password" name="current_password" placeholder="Contraseña Actual">
                                        </div>

                                        <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" class="form-control form-control-user"
                                                id="new_password" name="new_password" placeholder="Nueva Contraseña">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control form-control-user"
                                                id="new_password_confirmation" name="new_password_confirmation"
                                                placeholder="Confirmar Nueva Contraseña">
                                        </div>
                                        </div>

                                        @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                        <div class="row">
                                            <div class="col">
                                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                                    Cambiar Contraseña
                                                </button>
                                            </div>
                                            <div class="col">
                                                <a href="{{ route('home') }}" class="btn btn-secondary btn-user btn-block">
                                                    Volver
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                    <hr>
                                    @if(session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    @if(session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
