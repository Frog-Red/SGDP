<!-- resources/views/welcome.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Diaconos</title>
   <!-- Custom fonts for this template -->
   <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
   <link
       href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
       rel="stylesheet">

   <!-- Custom styles for this template -->
   <link href="css/sb-admin-2.min.css" rel="stylesheet">

   <!-- Custom styles for this page -->
   <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>
<body>
 <!-- Page Wrapper -->
 <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('welcome') }}">
            <div class="sidebar-brand-icon rotate-n-15">
            </div>
            <div class="sidebar-brand-text mx-3">Iglesia de santiago </div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Iglesia de santiago
        </div>
        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('welcome') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Inicio</span></a>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item active">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Diaconos</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Diaconos:</h6>
                    <a class="collapse-item" href="{{ route('diaconos.index') }}">Lista de Diaconos</a>
                    <a class="collapse-item" href="{{ route('hijos.index') }}">Hijos</a>
                    <a class="collapse-item" href="{{ route('historial_diacono.index') }}">Historial</a>
                    <a class="collapse-item" href="{{ route('rol_diacono.index') }}">Roles</a>
                </div>
            </div>
        </li>
        
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item ">
            <a class="nav-link" href="{{ route('parroquia.index') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Parroquias</span></a>
        </li>
        
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item ">
            <a class="nav-link" href="{{ route('rol_pastoral.index') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Rol Pastoral</span></a>
        </li>
        
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item ">
            <a class="nav-link" href="{{ route('tipo_evento.index') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Eventos</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Vicarias</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Vicarias:</h6>
                    <a class="collapse-item" href="{{ route('vicaria_ambiental.index') }}">Vicaria ambiental</a>
                    <a class="collapse-item" href="{{ route('vicaria_zonal.index') }}">Vicaria Zonal</a>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <form class="form-inline">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                </form>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                            aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                        placeholder="Search for..." aria-label="Search"
                                        aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->email }}  </span>
                            <img class="img-profile rounded-circle"
                                src="img/undraw_profile.svg">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Settings
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                Activity Log
                            </a>
                            <div class="dropdown-divider"></div>
                            <center><form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-warning btn-icon-split"><i class="fas fa-exclamation-triangle"></i> Logout</button>
                            </form></center>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

          
          <!-- Begin Page Content -->
          <div class="container-fluid">
            <h1 class="h3 mb-2 text-gray-800">Lista de Diaconos</h1>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a href="{{ route('diaconos.create') }}" class="btn btn-success btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-right"></i>
                        </span>
                        <span class="text">Agregar Diacono</span>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-container table-responsive">
                        <table class="table table-bordered" id="dataTable" width="300%" cellspacing="0">
                            <thead>
                                <tr>
                                                    <th>Rut</th>
                                                    <th>Nombre</th>
                                                    <th>Estado de Vigencia</th>
                                                    <th>Fecha de Nacimiento</th>
                                                    <th>Fecha de Ordenacion</th>
                                                    <th>Lugar de Ordenacion</th>
                                                    <th>Obispo que Ordeno</th>
                                                    <th>Profesion/Oficio</th>
                                                    <th>Parroquia Asignada</th>
                                                    <th>Vicaria Ambiental Asignada</th>
                                                    <th>Direccion Particular</th>
                                                    <th>Telefono Celular</th>
                                                    <th>Telefono Fijo</th>
                                                    <th>Correo Electronico</th>
                                                    <th>Indicador Defuncion</th>
                                                    <th>Fecha Defuncion</th>
                                                    <th>Estado Civil</th>
                                                    <th>Nombre Esposa</th>
                                                    <th>Rut Esposa</th>
                                                    <th>Fecha Nacimiento Esposa</th> 
                                                    <th>Fecha Matrimonio</th>
                                                    <th>Fecha Defuncion Esposa</th>               
                                                <th>Actions</th> <!-- Add a new column for actions -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($diaconos as $DIACONO)
                                                <tr>
                                                    <td>{{ $DIACONO->Rut }}</td>
                                                    <td>{{ $DIACONO->Nombre }}</td>
                                                    <td>{{ $DIACONO->EstadoVigencia }}</td>
                                                    <td>{{ $DIACONO->FechaNacimiento }}</td>
                                                    <td>{{ $DIACONO->FechaOrdenacion }}</td>
                                                    <td>{{ $DIACONO->LugarOrdenacion }}</td>
                                                    <td>{{ $DIACONO->NombreObispoOrdeno }}</td>
                                                    <td>{{ $DIACONO->ProfesionOficio }}</td>
                                                    <td>{{ $DIACONO->ParroquiaAsignada }}</td>
                                                    <td>{{ $DIACONO->VicariaAmbientalAsignada }}</td>
                                                    <td>{{ $DIACONO->DireccionParticular }}</td>
                                                    <td>{{ $DIACONO->TelefonoCelular }}</td>
                                                    <td>{{ $DIACONO->TelefonoFijo }}</td>
                                                    <td>{{ $DIACONO->CorreoElectronico }}</td>
                                                    <td>{{ $DIACONO->IndicadorDefuncion }}</td>
                                                    <td>{{ $DIACONO->FechaDefuncion }}</td>
                                                    <td>{{ $DIACONO->EstadoCivil }}</td>
                                                    <td>{{ $DIACONO->NombreEsposa }}</td>
                                                    <td>{{ $DIACONO->RutEsposa }}</td>
                                                    <td>{{ $DIACONO->FechaNacimientoEsposa }}</td>
                                                    <td>{{ $DIACONO->FechaMatrimonio }}</td>
                                                    <td>{{ $DIACONO->FechaDefuncionEsposa }}</td>

                                                    <td>
                                                        <form method="post" action="{{ route('diaconos.destroy', $DIACONO->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger btn-circle btn-sm" type="submit"> <i class="fas fa-trash"></i></button>

                                                            <a href="{{ route('diaconos.edit', $DIACONO->id) }}" class="btn btn-info btn-circle btn-sm">
                                                                <i class="fas fa-info-circle"></i>
                                                            </a>

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

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
</body>
</html>
