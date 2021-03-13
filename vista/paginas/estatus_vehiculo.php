<?php 
    include_once '../incluciones/sesion.php';

    if ($_SESSION['user'] == 'Ernesto' || $_SESSION['user'] == 'Noel' || $_SESSION['user'] == 'Alfredo' || $_SESSION['user'] == 'Erika') {
        header("Refresh:");
        echo 'No tienes permisos para acceder';
        die();
        exit();
    }
?>

    <link rel="stylesheet" href="/siga/vista/css/estatus_vehiculo.css">
    <link rel="stylesheet" type="text/css" href="/siga/vista/libs/DataTables-1.10.22/css/jquery.dataTables.css"/>
    <link rel="stylesheet" type="text/css" href="/siga/vista/libs/Buttons-1.6.5/css/buttons.dataTables.css"/>
    <link rel="stylesheet" type="text/css" href="/siga/vista/libs/Responsive-2.2.6/css/responsive.dataTables.css"/>
    <div class="container-fluid">
        <form action="" method="post" id="formdata">
            <div class="row">
                <div class="col text-center">
                    <h3>Cambiar Estatus</h3>
                </div>
            </div> 
            <div class="row">
                <div class="col-md-4">
                    <label for="lexpediente">No. Expediente</label>
                    <input type="text" id="iexpediente" class="form-control"> 
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
                <div class="col-md-3">
                    <label for="ldescripcion">Estatus Actual:</label><br>
                    <input type="text" class="form-control" id="iestatusA" readonly>
                </div>
                <div class="col-md-3">
                    <label for="larea">Estatus Nuevo:</label>
                    <div id="select_estatus">

                    </div>
                </div>
                <div class="col-md-3">
                    <label for="">Fecha de Salida</label><br>
                    <input type="date" class="form-control" name="" id="dfecha_salida">
                </div>
                <div class="col-md-3">
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
                                <table id="lista_tallerTransito" class="table table-striped table-bordered" border="0">
                                    <thead class="text-capitalize">
                                        <tr>
                                            <th>Expediente</th>
                                            <th>Estatus</th>
                                            <th>Fecha Salida Taller</th>
                                            <th>Marca</th>
                                            <th>Linea</th>
                                            <th>Color</th>
                                            <th>Modelo</th>
                                            <th>Placas</th>
                                            <th>Cliente</th>
                                        </tr>
                                    </thead>
                                    <tbody id="listado_tallerTransito">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="/siga/vista/js/estatus_vehiculo.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/pdfmake-0.1.36/pdfmake.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/DataTables-1.10.22/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Buttons-1.6.5/js/dataTables.buttons.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Buttons-1.6.5/js/buttons.flash.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Buttons-1.6.5/js/buttons.html5.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Responsive-2.2.6/js/dataTables.responsive.js"></script>