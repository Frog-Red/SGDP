<!-- resources/views/welcome.blade.php -->
@include ('Gradients.gradients')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rol Pastoral</title>
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
<body class="page6">
 <!-- Page Wrapper -->
 <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-sidebar sidebar sidebar-dark accordion" id="accordionSidebar">

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


        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">    
        
        <div class="sidebar-heading">
            Diaconos
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('diaconos.index') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Diaconos</span></a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="{{ route('hijos.index') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Hijos</span></a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="{{ route('historial_diacono.index') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Historial Diaconos</span></a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="{{ route('rol_diacono.index') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Roles de Diaconos</span></a>
        </li>        

        
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <div class="sidebar-heading">
           Iglesia
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item ">
            <a class="nav-link" href="{{ route('parroquia.index') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Parroquias</span></a>
        </li>
        
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item active">
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
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <div class="sidebar-heading">
            Vicarias
         </div>
         <li class="nav-item ">
            <a class="nav-link" href="{{ route('vicaria_ambiental.index') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Vicaria ambiental</span></a>
        </li>        <li class="nav-item ">
            <a class="nav-link" href="{{ route('vicaria_zonal.index') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Vicaria Zonal</span></a>
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
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                <button type="submit" class="btn btn-warning btn-icon-split"><span class="icon text-white-50">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </span> <span class="text">Salir</span></button>
                            </form></center>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

          

          