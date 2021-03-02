<?php 
    include_once '../incluciones/sesion.php';

    if ($_SESSION['user'] == 'Ernesto' || $_SESSION['user'] == 'Alfredo' || $_SESSION['user'] == 'Raul' || $_SESSION['user'] == 'Karen') {
        header("Refresh:");
        echo 'No tienes permisos para acceder';
        die();
        exit();
    }
?>
    <link rel="stylesheet" href="/siga/vista/css/resumen_ingresos.css">
    <link rel="stylesheet" type="text/css" href="/siga/vista/libs/DataTables-1.10.22/css/jquery.dataTables.css"/>
    <link rel="stylesheet" type="text/css" href="/siga/vista/libs/Buttons-1.6.5/css/buttons.dataTables.css"/>
    <link rel="stylesheet" type="text/css" href="/siga/vista/libs/Responsive-2.2.6/css/responsive.dataTables.css"/>
    <div class="container-fluid">
        <form action="" class="formdata" id="formdata">
            <div class="row">
                <div class="col text-center">
                    <h3>Actualizar Ingresos</h3>
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
                <div class="col-md-3">
                    <label for="ltservicio">Tipo de Servicio</label><br>
                    <div id="select_servicio">
                    
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="">Fecha de Anticipo</label>
                    <input type="date" name="fanticipo" id="fanticipo" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="">Anticipo</label>
                    <input type="text" id="ianticipo" class="form-control" placeholder="Ingresa la Cantidad del Anticipo...">
                </div>
                <div class="col-md-3">
                    <label for="">Tipo de Pago de Anticipo</label>
                    <div id="select_tipo_pago_anticipo">

                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                    <label for="">Fecha Finiquito</label>
                    <input type="date" name="ffiniquito" id="ffiniquito" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="">Finiquito</label>
                    <input type="text" id="ifiniquito" class="form-control" placeholder="Ingresa la Cantidad del Finiquito...">
                </div>
                <div class="col-md-3">
                    <label for="">Tipo de Pago de Finiquito</label>
                    <div id="select_tipo_pago_finiquito"></div>
                </div>
                <div class="col-md-3">
                    <label for="">Total</label>
                    <input type="text" id="totla" class="form-control" placeholder="Ingresa el Total del Pago...">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <button type="button" class="btn btn-primary btn-lg btn-block" id="btn_registrar">Registrar</button>
                </div>
                <div class="col-md-4"></div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body" id="panel">
                            <div class="table-responsive">
                                <table id="lista_ingresos" class="table table-striped table-bordered" border="0">
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
                                            <th>Tipo Servicio</th>
                                            <th>Fecha de Anticipo</th>
                                            <th>Anticipo</th>
                                            <th>Tipo de Pago Anticipo</th>
                                            <th>Fecha Finiquito</th>
                                            <th>Finiquito</th>
                                            <th>Tipo de Pago Finiquito</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody id="listado_ingresos">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="/siga/vista/js/resumen_ingresos.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/pdfmake-0.1.36/pdfmake.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/DataTables-1.10.22/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Buttons-1.6.5/js/dataTables.buttons.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Buttons-1.6.5/js/buttons.flash.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Buttons-1.6.5/js/buttons.html5.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Responsive-2.2.6/js/dataTables.responsive.js"></script>