<?php 
    include_once '../incluciones/sesion.php';

    if ($_SESSION['user'] == 'Ernesto' || $_SESSION['user'] == 'Alfredo' || $_SESSION['user'] == 'Raul' || $_SESSION['user'] == 'Karen') {
        header("Refresh:");
        echo 'No tienes permisos para acceder';
        die();
        exit();
    }
?>
    <link rel="stylesheet" href="/siga/vista/css/a_facturas.css">
    <link rel="stylesheet" type="text/css" href="/siga/vista/libs/DataTables-1.10.22/css/jquery.dataTables.css"/>
    <link rel="stylesheet" type="text/css" href="/siga/vista/libs/Buttons-1.6.5/css/buttons.dataTables.css"/>
    <link rel="stylesheet" type="text/css" href="/siga/vista/libs/Responsive-2.2.6/css/responsive.dataTables.css"/>
    <div class="container-fluid">
        <form action="" class="formdata" id="formdata">
            <div class="row">
                <div class="col text-center">
                    <h3>Actualizar Facturas por Aseguradora</h3>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <label for="lexpediente">No. Expediente (Id)</label>
                    <input type="text" class="form-control" id="iexpediente">
                </div>
                <div class="col-md-4">
                    <label for=""></label>
                    <button type="button" class="btn btn-primary btn-lg btn-block" id="btn_buscar">Buscar</button>
                </div>
                <div class="col-md-4"></div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2">
                    <label for="">Marca</label>
                    <input type="text" id="marca" class="form-control">
                </div>
                <div class="col-md-2">
                    <label for="">Linea</label>
                    <input type="text" id="linea" class="form-control">
                </div>
                <div class="col-md-2">
                    <label for="">Color</label>
                    <input type="text" name="color" id="color" class="form-control">
                </div>
                <div class="col-md-2">
                    <label for="">Modelo</label>
                    <input type="text" name="modelo" id="modelo" class="form-control">
                </div>
                <div class="col-md-2">
                    <label for="">Placas</label>
                    <input type="text" name="placas" id="placas" class="form-control">
                </div>
                <div class="col-md-2">
                    <label for="">Cliente</label>
                    <input type="text" name="cliente" id="cliente" class="form-control">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2">
                    <label for="">Cantidad</label>
                    <input type="text" name="cantidad" id="cantidad" class="form-control">
                </div>
                <div class="col-md-2">
                    <label for="">Fecha de Facturacíon</label>
                    <input type="date" name="fechaf" id="fechaf" class="form-control">
                </div>
                <div class="col-md-2">
                    <label for="">Estatus Aseguradora</label>
                    <select name="sestatus" id="sestatus" class="form-control">
                        <option value="0">Seleccione el Estatus</option>
                        <option value="1">Facturado</option>
                        <option value="2">Pagado</option>
                        <option value="3">Pendiente</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="">Fecha BBVA</label>
                    <input type="date" id="fbbva" class="form-control">
                </div>
                <div class="col-md-4">
                    <label for="">Comentarios</label>
                    <input type="text" id="comentarios" class="form-control" placeholder="Agrega un comentario...">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <button type="button" class="btn btn-primary btn-lg btn-block" id="btn_registrar">Actualizar</button>
                </div>
                <div class="col-md-4"></div>
            </div>
            <br>
            <div class="row">
                <div class="form-group col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body" id="panel">
                            <div class="table-responsive">
                                <table id="lista_vehiculos" class="table table-striped table-bordered" border="0">
                                    <thead class="text-capitalize">
                                        <tr>
                                            <th>Id</th>
                                            <th>Expediente</th>
                                            <th>Marca</th>
                                            <th>Linea</th>
                                            <th>Color</th>
                                            <th>Modelo</th>
                                            <th>Placas</th>
                                            <th>Cliente</th>
                                            <th>Cantidad</th>
                                            <th>Fecha Autorizacion</th>
                                            <th>Estatus</th>
                                            <th>Fecha BBVA</th>
                                            <th>Comentarios</th>
                                        </tr>
                                    </thead>
                                    <tbody id="listado_vehiculos">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="/siga/vista/js/a_facturas.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/pdfmake-0.1.36/pdfmake.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/DataTables-1.10.22/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Buttons-1.6.5/js/dataTables.buttons.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Buttons-1.6.5/js/buttons.flash.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Buttons-1.6.5/js/buttons.html5.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Responsive-2.2.6/js/dataTables.responsive.js"></script>