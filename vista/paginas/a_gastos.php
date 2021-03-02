<?php 
    include_once '../incluciones/sesion.php';

    if ($_SESSION['user'] == 'Ernesto' || $_SESSION['user'] == 'Alfredo' || $_SESSION['user'] == 'Raul' || $_SESSION['user'] == 'Karen') {
        header("Refresh:");
        echo 'No tienes permisos para acceder';
        die();
        exit();
    }
?>
    <link rel="stylesheet" href="/siga/vista/css/a_gastos.css">
    <link rel="stylesheet" type="text/css" href="/siga/vista/libs/DataTables-1.10.22/css/jquery.dataTables.css"/>
    <link rel="stylesheet" type="text/css" href="/siga/vista/libs/Buttons-1.6.5/css/buttons.dataTables.css"/>
    <link rel="stylesheet" type="text/css" href="/siga/vista/libs/Responsive-2.2.6/css/responsive.dataTables.css"/>
    <div class="container-fluid">
        <form action="" class="formdata" id="formdata">
            <div class="row">
                <div class="col text-center">
                    <h3>Actualizar Gastos</h3>
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
                <div class="col-md-3">
                    <label for="">Fecha</label>
                    <input type="date" id="fecha" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="">Articulos</label>
                    <input type="text" id="articulo" class="form-control" placeholder="Ingresa el articulo...">
                </div>
                <div class="col-md-3">
                    <label for="">Cantidad</label>
                    <input type="text" name="" id="cantidad" class="form-control" placeholder="Ingresa la cantidad...">
                </div>
                <div class="col-md-3">
                    <label for="">Forma de Pago</label>
                    <div id="select_fpago">
                    
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                    <label for="">Factura</label>
                    <select name="" id="sfactura" class="form-control">
                        <option value="0">Aplica factura...</option>
                        <option value="1">Si</option>
                        <option value="2">No</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="">Tipo de Gasto</label>
                    <div id="select_tipo">
                    
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="">Proveedor</label>
                    <input type="text" id="proveedor" class="form-control" placeholder="Ingrese Proveedor...">
                </div>
                <div class="col-md-3">
                    <label for="">Expediente</label>
                    <input type="text" id="expediente" class="form-control" placeholder="Ingrese el numero de expediente">
                    <div id="expp" class="text-center">
                        <label for="" id="exp"></label>
                    </div>
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
                                <table id="lista_gastos" class="table table-striped table-bordered" border="0">
                                    <thead class="text-capitalize">
                                        <tr>
                                            <th>Id</th>
                                            <th>Fecha</th>
                                            <th>Articulo</th>
                                            <th>Cantidad</th>
                                            <th>Forma Pago</th>
                                            <th>Factura</th>
                                            <th>Tipo Gasto</th>
                                            <th>Proveedor</th>
                                            <th>Expediente</th>
                                        </tr>
                                    </thead>
                                    <tbody id="listado_gastos">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="/siga/vista/js/a_gastos.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/pdfmake-0.1.36/pdfmake.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/DataTables-1.10.22/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Buttons-1.6.5/js/dataTables.buttons.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Buttons-1.6.5/js/buttons.flash.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Buttons-1.6.5/js/buttons.html5.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Responsive-2.2.6/js/dataTables.responsive.js"></script>