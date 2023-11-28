@include('headers.consultas')
          <!-- Begin Page Content -->
          <div class="container-fluid">
            <h1 class="h3 mb-2 text-gray-800">Consultar Diaconos</h1>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">


                <div class="card-header py-3">
                    <button id="exportButton" class="btn btn-success btn-icon-split">
                       <span class="icon text-white-50">
                          <i class="fas fa-check"></i>
                       </span>
                       <span class="text">Importar a Excel</span>
                    </button>
                 </div>

                 
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-gray-800" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                                    <th>Detalles</th>
                                                    <th>Roles</th>
                                                    <th>Eventos</th>
                                                    <th>Rut</th>
                                                    <th>Nombre</th>
                                                    <th>Estado</th>
                                                    <th>Direccion</th>
                                                    <th>Parroquia</th>
                                                    <th>Telefono</th>
                                                    <th>Correo</th>        
                                                    <th>Estado Civil</th>       
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($diaconos as $DIACONO)
                                                <tr>
                                                    <td>
                                                        <button type="button" class="btn btn-Primary btn-icon-split" data-bs-toggle="modal" data-bs-target="#viewDiaconoModal{{ $DIACONO->id }}" > <span class="icon text-white-50">
                                                            <i class="fas fa-info-circle"></i>
                                                        </span> <span class="text">Info</span></button>
                                                        
                                                        <div class="modal fade" id="viewDiaconoModal{{ $DIACONO->id }}" tabindex="-1" role="dialog" aria-labelledby="viewDiaconoModalLabel{{ $DIACONO->id }}" aria-hidden="true">
                                                            @include('diaconos.view', ['diacono' => $DIACONO])
                                                        </div>
                                                     </td>


                                                     <td>
                                                        <button type="button" class="btn btn-info btn-icon-split" data-bs-toggle="modal" data-bs-target="#rolesModal{{ $DIACONO->id }}" > <span class="icon text-white-50">
                                                            <i class="fas fa-info-circle"></i>
                                                        </span> <span class="text">Roles</span></button>
                                                        
                                                        <div class="modal fade" id="rolesModal{{ $DIACONO->id }}" tabindex="-1" role="dialog" aria-labelledby="rolesModalLabel{{ $DIACONO->id }}" aria-hidden="true">
                                                            @include('diaconos.roles', ['diacono' => $DIACONO])
                                                        </div>
                                                 </td>


                                                 <td>
                                                    <button type="button" class="btn btn-Secondary btn-icon-split" data-bs-toggle="modal" data-bs-target="#eventosModal{{ $DIACONO->id }}" > <span class="icon text-white-50">
                                                        <i class="fas fa-info-circle"></i>
                                                    </span> <span class="text">Eventos</span></button>
                                                    
                                                    <div class="modal fade" id="eventosModal{{ $DIACONO->id }}" tabindex="-1" role="dialog" aria-labelledby="eventosModalLabel{{ $DIACONO->id }}" aria-hidden="true">
                                                        @include('diaconos.eventos', ['diacono' => $DIACONO])
                                                    </div>
                                             </td>

                                             
                                                    <td>{{ $DIACONO->Rut }}</td>
                                                    <td>{{ $DIACONO->Nombre }}</td>
                                                    <td>{{ $DIACONO->EstadoVigencia }}</td>
                                                    <td>{{ $DIACONO->DireccionParticular }}</td>
                                                    <td>{{ $DIACONO->ParroquiaAsignada }}</td>
                                                    <td>{{ $DIACONO->TelefonoCelular }}</td>
                                                    <td>{{ $DIACONO->CorreoElectronico }}</td>
                                                    <td>{{ $DIACONO->EstadoCivil}}</td>

                                                </tr>
                                            @endforeach                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                            <script>
                                document.getElementById('exportButton').addEventListener('click', function () {
                                    exportToExcel();
                                });
                            
                                function exportToExcel() {
                                               // Original table
                                    var originalTable = document.getElementById('dataTable');
                                    
                                    // Clone the original table
                                    var tableClone = originalTable.cloneNode(true);

                                    // Specify columns to exclude (0-based index)
                                    var columnsToExclude = [0, 1, 2];

                                    // Iterate through rows and remove specified columns in the cloned table
                                    for (var i = 0; i < tableClone.rows.length; i++) {
                                        for (var j = columnsToExclude.length - 1; j >= 0; j--) {
                                            tableClone.rows[i].deleteCell(columnsToExclude[j]);
                                        }
                                    }

                                    // Create a new worksheet from the cloned table
                                    var ws = XLSX.utils.table_to_sheet(tableClone);
                                    var wb = XLSX.utils.book_new();
                                    XLSX.utils.book_append_sheet(wb, ws, 'Sheet1');
                                    XLSX.writeFile(wb, 'Diaconos_exportados.xlsx');
                                }
                            </script>

                            
                        </div>
    
                    </div>
@include('footer.footer')






    