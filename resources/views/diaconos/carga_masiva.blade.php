                
                <!-- Modal para cargar diáconos -->
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="cargarDiaconosModalLabel">Cargar Diáconos</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>


                            <form action="{{ route('diaconos.import') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="file" class="form-label">Seleccione un archivo Excel (.xlsx, .xls)</label>
                                        <input type="file" class="form-control" id="file" name="file" accept=".xlsx,.xls" required>
                                    </div>
                                </div>
                                <div class="modal-footer d-flex justify-content-between">
                                    <div> <!-- Contenedor para el botón de Descargar Plantilla -->
                                        <button type="button" class="btn btn-success" onclick="window.location='{{ route("diaconos.downloadTemplate") }}'">
                                            Descargar Plantilla
                                        </button>
                                    </div>
                                    <div> <!-- Contenedor para los otros dos botones -->
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary">Cargar</button>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                    </div>
