<?php 
    include_once '../incluciones/sesion.php';
    if ($_SESSION['user'] == 'Noel' || $_SESSION['user'] == 'Raul' || $_SESSION['user'] == 'Karen' || $_SESSION['user'] == 'Alfredo' || $_SESSION['user'] == 'Erika') {
        header("Refresh:");
        echo 'No tienes permisos para acceder';
        die();
        exit();
    }
?>
    <link rel="stylesheet" href="/siga/vista/css/baja_almacen.css">
    <link rel="stylesheet" type="text/css" href="/siga/vista/libs/DataTables-1.10.22/css/jquery.dataTables.css"/>
    <link rel="stylesheet" type="text/css" href="/siga/vista/libs/Buttons-1.6.5/css/buttons.dataTables.css"/>
    <link rel="stylesheet" type="text/css" href="/siga/vista/libs/Responsive-2.2.6/css/responsive.dataTables.css"/>
    <div class="container-fluid">
        <form action="" class="formdata" id="formdata">
            <div class="row">
                <div class="col text-center">
                    <h3>Baja de Refacciones en Almacen</h3>
                </div>
            </div>
            <br>
            <div class="row">
                    <div class="col-md-4">
                        <label for="">No. Expediente (Id)</label>
                        <input type="text" class="form-control" id="id_vehiculo">
                    </div>
                    <div class="col-md-4">
                        <label for=""></label>
                        <button type="button" class="btn btn-primary btn-lg btn-block" id="btn_buscar">Buscar</button>
                    </div>
                    <div class="col-md-4">
                        <label for=""></label>
                        <div id="inf" class="text-center">
                            <label for="" id="info"></label>
                        </div>
                    </div>
            </div>
            <div class="row">
                <div class="col-md-1">
                    <label for="lnombre">Ubicacion:</label><br>
                    <input type="text" class="form-control" id="aubicacion">
                </div>
                <div class="col-md-2">
                    <label for="ldescripcion">Fecha de Entrega:</label><br>
                    <input type="date" class="form-control" id="afechaentrega">
                </div>
                <div class="col-md-2">
                    <label for="lcosto">Estatus Actual:</label><br>
                    <input type="text" class="form-control" id="aestatus" readonly>
                </div>
                <div class="col-md-2">
                    <label for="lcosto">Nuevo Estatus:</label><br>
                    <div id="select_estatus">
                    
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="lstock">Comentatarios:</label><br>
                    <input type="text" class="form-control" id="acomentarios"><br>
                </div>
                <div class="col-md-2">
                    <label for=""></label>
                    <button type="button" class="btn btn-success btn-lg btn-block" id="btnmodificar">Actualizar</button>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="form-group col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body" id="panel">
                            <div class="table-responsive">
                                <table id="lista_refacciones" class="table table-striped table-bordered" border="0">
                                    <thead class="text-capitalize">
                                        <tr>
                                            <th>Id</th>
                                            <th>Fecha de Llegada</th>
                                            <th>Aseguradora</th>
                                            <th>Descripcion</th>
                                            <th>Marca</th>
                                            <th>Linea</th>
                                            <th>Modelo</th>
                                            <th>Expediente</th>
                                            <th>Ubicacion</th>
                                            <th>Fecha de Entrega</th>
                                            <th>Estatus</th>
                                            <th>Comentarios</th>
                                        </tr>
                                    </thead>
                                    <tbody id="listado_refacciones">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
        </form>
    </div>
    <script src="/siga/vista/js/baja_almacen.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/pdfmake-0.1.36/pdfmake.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/DataTables-1.10.22/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Buttons-1.6.5/js/dataTables.buttons.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Buttons-1.6.5/js/buttons.flash.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Buttons-1.6.5/js/buttons.html5.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Responsive-2.2.6/js/dataTables.responsive.js"></script>
    
</div>