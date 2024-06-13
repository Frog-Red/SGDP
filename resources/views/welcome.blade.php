@include('headers.welcome')
@php
    use Carbon\Carbon;
@endphp
<body>
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Bienvenido al Sistema de Gestión del Área del Diaconado Permanente!</h1>
        </div>

        <div class="row">

            <!-- Cumpleaneros -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2 @if (!empty($proximoCumpleanos) && collect($proximoCumpleanos)->contains(function ($cumpleanos) use ($hoy) {
                    return $cumpleanos->isSameDay($hoy);
                }))
                    page11
                @endif">
                <div class="card-body d-flex flex-column justify-content-center"> <!-- Utiliza flexbox para centrar verticalmente el contenido -->
                    <div class="row no-gutters align-items-center">
                            <div class="col mr-2">

                                @if (!empty($proximoCumpleanos) && collect($proximoCumpleanos)->contains(function ($cumpleanos) use ($hoy) {
                                    return $cumpleanos->isSameDay($hoy);
                                }))
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                      Hay Cumpleaños Hoy!
                                    </div>                              
                                @elseif (!empty($proximoCumpleanos))                              
                                     <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                      Próximo(s) Cumpleaños
                                     </div>
                                @endif

                                @php
                                $cantidadCumpleaneros = count($nombrecumpleanero);
                                @endphp

                                @if ($cantidadCumpleaneros ==1)
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    @if (!empty($proximoCumpleanos) && collect($proximoCumpleanos)->contains(function ($cumpleanos) use ($hoy) {
                                        return $cumpleanos->isToday();
                                    }))
                                        ¡Hoy es el cumpleaños de:
                                        @foreach ($nombrecumpleanero as $key => $nombre)
                                            {{ $nombre }}{{ $loop->last ? '' : ', ' }}
                                        @endforeach
                                        !
                                    @elseif (!empty($proximoCumpleanos))
                                        @foreach ($nombrecumpleanero as $key => $nombre)
                                            {{ $nombre }}: {{ $proximoCumpleanos[$key]->format('d/m/Y') }}{{ $loop->last ? '' : ', ' }}
                                        @endforeach
                                    @else
                                        N/A
                                    @endif
                                </div>
                                @endif

                                @if ($cantidadCumpleaneros > 1)
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    @if (!empty($proximoCumpleanos) && collect($proximoCumpleanos)->contains(function ($cumpleanos) use ($hoy) {
                                        return $cumpleanos->isToday();
                                    }))
                                        ¡Hoy hay mas de una persona de cumpleaños!
                                        <button type="button" class="btn btn-warning mt-3" data-bs-toggle="modal" data-bs-target="#cumpleanerosModal">
                                            Ver Cumpleañeros
                                        </button>                                       
                                        
                                    @elseif (!empty($proximoCumpleanos))
                                        ¡Cumpleaños múltiples el día {{ $proximoCumpleanos[0]->format('d/m/Y') }}!
                                        <button type="button" class="btn btn-warning mt-3" data-bs-toggle="modal" data-bs-target="#cumpleanerosModal">
                                            Ver Cumpleañeros
                                        </button>
                                    @else
                                        N/A
                                    @endif
                                </div>
                                @endif

                                <div class="modal fade text-dark" id="cumpleanerosModal" tabindex="-1" aria-labelledby="cumpleanerosModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="cumpleanerosModalLabel">Cumpleañeros</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-dark"> <!-- Agrega la clase text-dark para establecer el color del texto a negro -->
                                            @foreach ($nombrecumpleanero as $key => $nombre)
                                                <p>{{ $nombre }}: {{ $proximoCumpleanos[$key]->format('d/m/Y') }}</p>
                                            @endforeach
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  

                            </div>
                            <div class="col-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-cake" viewBox="0 0 16 16">
                                    <path d="m7.994.013-.595.79a.747.747 0 0 0 .101 1.01V4H5a2 2 0 0 0-2 2v3H2a2 2 0 0 0-2 2v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a2 2 0 0 0-2-2h-1V6a2 2 0 0 0-2-2H8.5V1.806A.747.747 0 0 0 8.592.802l-.598-.79ZM4 6a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v.414a.911.911 0 0 1-.646-.268 1.914 1.914 0 0 0-2.708 0 .914.914 0 0 1-1.292 0 1.914 1.914 0 0 0-2.708 0A.911.911 0 0 1 4 6.414zm0 1.414c.49 0 .98-.187 1.354-.56a.914.914 0 0 1 1.292 0c.748.747 1.96.747 2.708 0a.914.914 0 0 1 1.292 0c.374.373.864.56 1.354.56V9H4zM1 11a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.793l-.354.354a.914.914 0 0 1-1.293 0 1.914 1.914 0 0 0-2.707 0 .914.914 0 0 1-1.292 0 1.914 1.914 0 0 0-2.708 0 .914.914 0 0 1-1.292 0 1.914 1.914 0 0 0-2.708 0 .914.914 0 0 1-1.292 0L1 11.793zm11.646 1.854a1.915 1.915 0 0 0 2.354.279V15H1v-1.867c.737.452 1.715.36 2.354-.28a.914.914 0 0 1 1.292 0c.748.748 1.96.748 2.708 0a.914.914 0 0 1 1.292 0c.748.748 1.96.748 2.707 0a.914.914 0 0 1 1.293 0Z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            


            <!-- Ordenaciones -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2 @if (!empty($proximoOrdenacion) && collect($proximoOrdenacion)->contains(function ($ordenacion) use ($hoy) {
                    return $ordenacion->isSameDay($hoy);
                }))
                    page11
                @endif">
                <div class="card-body d-flex flex-column justify-content-center"> <!-- Utiliza flexbox para centrar verticalmente el contenido -->
                    <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
            
                                @if (!empty($proximoOrdenacion) && collect($proximoOrdenacion)->contains(function ($ordenacion) use ($hoy) {
                                    return $ordenacion->isSameDay($hoy);
                                }))
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                      ¡Hay Aniversario de Ordenacion!
                                    </div>                              
                                @elseif (!empty($proximoOrdenacion))                              
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                      Próximos Aniversarios de Ordenación
                                     </div>
                                @endif
            
                                @php
                                $cantidadOrdenacion = count($nombreOrdenacion);
                                @endphp
            
                                @if ($cantidadOrdenacion ==1)
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    @if (!empty($proximoOrdenacion) && collect($proximoOrdenacion)->contains(function ($ordenacion) use ($hoy) {
                                        return $ordenacion->isToday();
                                    }))
                                        ¡Hoy es el Aniversario de ordenación de:
                                        @foreach ($nombreOrdenacion as $key => $nombre)
                                            {{ $nombre }}{{ $loop->last ? '' : ', ' }}
                                        @endforeach
                                        !
                                    @elseif (!empty($proximoOrdenacion))
                                        @foreach ($nombreOrdenacion as $key => $nombre)
                                            {{ $nombre }}: {{ $proximoOrdenacion[$key]->format('d/m/Y') }}{{ $loop->last ? '' : ', ' }}
                                        @endforeach
                                    @else
                                        N/A
                                    @endif
                                </div>
                                @endif
            
                                @if ($cantidadOrdenacion > 1)
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    @if (!empty($proximoOrdenacion) && collect($proximoOrdenacion)->contains(function ($ordenacion) use ($hoy) {
                                        return $ordenacion->isToday();
                                    }))
                                        ¡Hoy hay más de un Aniversario!
                                        <button type="button" class="btn btn-warning mt-3" data-bs-toggle="modal" data-bs-target="#ordenacionModal">
                                            Ver Aniversarios
                                        </button>                                       
                                        
                                    @elseif (!empty($proximoOrdenacion))
                                        ¡Aniversarios múltiples el día {{ $proximoOrdenacion[0]->format('d/m/Y') }}!
                                        <button type="button" class="btn btn-warning mt-3" data-bs-toggle="modal" data-bs-target="#ordenacionModal">
                                            Ver Aniversarios
                                        </button>
                                    @else
                                        N/A
                                    @endif
                                </div>
                                @endif
            
                                <div class="modal fade text-dark" id="ordenacionModal" tabindex="-1" aria-labelledby="ordenacionModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="cordenacionModalLabel">Aniversarios de Ordenacion</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-dark"> <!-- Agrega la clase text-dark para establecer el color del texto a negro -->
                                            @foreach ($nombreOrdenacion as $key => $nombre)
                                                <p>{{ $nombre }}: {{ $proximoOrdenacion[$key]->format('d/m/Y') }}</p>
                                            @endforeach
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  
            
                            </div>
                            <div class="col-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">            
                                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- total diaconos -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body d-flex flex-column justify-content-center"> <!-- Utiliza flexbox para centrar verticalmente el contenido -->
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total de Diaconos en el sistema
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ $totalDiaconos ?? 0 }}
                                </div>
                            </div>
                            
                            <div class="col-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-person-check" viewBox="0 0 16 16">
                                    <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
                                    <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1z"/>
                                  </svg>                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-6">
                <!-- Basic Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary"> {{ $titulotarjeta1 }}</h6>
                    </div>
                    <div class="card-body">
                        {{ $salmoAleatorio }}
                        <p class="text-right">{{ $salmoAleatorioNumero }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <!-- Basic Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{ $titulotarjeta2 }}</h6>
                    </div>
                    <div class="card-body">
                        {{ $salmoAleatorio2 }}
                        <p class="text-right">{{ $salmoAleatorioNumero2 }}</p>
                    </div>
                </div>
            </div>
        </div>
        

            <div class="row">
                <div class="col-lg-12">
                    <!-- Basic Card Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">{{ $titulotarjeta3 }}</h6>
                        </div>
                        <div class="card-body">
                            {{ $proverbioAleatorio }}
                            <p class="text-right">{{ $proverbioAleatorioNumero }}</p>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>


      




    @include('footer.footer')
