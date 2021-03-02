<?php 
    include_once '../incluciones/sesion.php';

    if ($_SESSION['user'] == 'Ernesto' || $_SESSION['user'] == 'Alfredo' || $_SESSION['user'] == 'Raul' || $_SESSION['user'] == 'Karen') {
        header("Refresh:");
        echo 'No tienes permisos para acceder';
        die();
        exit();
    }
?>
    <link rel="stylesheet" href="/siga/vista/css/metricos.css">
    <link rel="stylesheet" type="text/css" href="/siga/vista/libs/DataTables-1.10.22/css/jquery.dataTables.css"/>
    <link rel="stylesheet" type="text/css" href="/siga/vista/libs/Buttons-1.6.5/css/buttons.dataTables.css"/>
    <link rel="stylesheet" type="text/css" href="/siga/vista/libs/Responsive-2.2.6/css/responsive.dataTables.css"/>
    <div class="container-fluid">
        <form action="" class="formdata" id="formdata">
            <div class="row">
                <div class="col text-center">
                    <h3>Metricos</h3>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col text-center">
                    <h3>Vehiculos Entregados y Recibidos por Mes</h3>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6 text-center">
                    <h3>Vehiculos Entregados por Mes</h3>
                    <br>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-body" id="panel">
                                    <div class="table-responsive">
                                        <table id="lista_ventregados" class="table table-striped table-bordered" border="0">
                                            <thead class="text-capitalize">
                                                <tr>
                                                    <th>Cliente</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody id="listado_ventregados">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <h3>Vehiculos Recibidos por Mes</h3>
                    <br>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-body" id="panel">
                                    <div class="table-responsive">
                                        <table id="lista_vrecibidos" class="table table-striped table-bordered" border="0">
                                            <thead class="text-capitalize">
                                                <tr>
                                                    <th>Cliente</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody id="listado_vrecibidos">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6 text-center">
                    <h3>Vehiculos Entregados por Mes</h3>
                    <br>
                    <div class="row">
                        <div class="col" id="vem"></div>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <h3>Vehiculos Recibidos por Mes</h3>
                    <br>
                    <div class="row">
                        <div class="col" id="rem"></div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col text-center">
                    <h3>Indice de Satisfacción del Cliente</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 text-center">
                    <h3>ISC por semana</h3>
                    <br>
                    <div class="row">
                        <div class="col" id="iscsem"></div>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <h3>Total ISC por Semana</h3>
                    <br>
                    <div class="row">
                        <div class="col" id="isctotal"></div>
                    </div>
                </div>
            </div>
            <br>
        </form>
    </div>

    <script src="/siga/vista/js/metricos.js"></script>
    <script src="/siga/vista/js/plotly-latest.min.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/pdfmake-0.1.36/pdfmake.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/DataTables-1.10.22/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Buttons-1.6.5/js/dataTables.buttons.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Buttons-1.6.5/js/buttons.flash.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Buttons-1.6.5/js/buttons.html5.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Responsive-2.2.6/js/dataTables.responsive.js"></script>