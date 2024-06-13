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
        
        @if(auth()->check() && auth()->user()->hasAnyRole(3))
        <div class="sidebar-heading">
            Consultas
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item ">
            <a class="nav-link" href="{{ route('consultas') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Consultas</span></a>
        </li>
        <hr class="sidebar-divider d-none d-md-block">
        @endif
        
        @if(auth()->check() && auth()->user()->hasAnyRole(2))
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
        @endif
        @if(auth()->check() && auth()->user()->hasAnyRole(1))
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
        @endif
        @if(auth()->check() && auth()->user()->hasAnyRole(2))
        <div class="sidebar-heading">
            Sacerdotes (experimental)
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('sacerdotes.index') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Sacerdotes</span></a>
        </li>
        <hr class="sidebar-divider d-none d-md-block">      
        @endif
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
            @include ('headers.topbar')