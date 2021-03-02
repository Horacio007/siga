<?php 
    include_once '../incluciones/sesion.php';

    if ($_SESSION['user'] == 'Ernesto' || $_SESSION['user'] == 'Noel' || $_SESSION['user'] == 'Raul' || $_SESSION['user'] == 'Alfredo' || $_SESSION['user'] == 'Erika') {
        header("Refresh:");
        echo 'No tienes permisos para acceder';
        die();
        exit();
    }
?>

    <link rel="stylesheet" href="/siga/vista/css/iscliente.css">
    <link rel="stylesheet" type="text/css" href="/siga/vista/libs/DataTables-1.10.22/css/jquery.dataTables.css"/>
    <link rel="stylesheet" type="text/css" href="/siga/vista/libs/Buttons-1.6.5/css/buttons.dataTables.css"/>
    <link rel="stylesheet" type="text/css" href="/siga/vista/libs/Responsive-2.2.6/css/responsive.dataTables.css"/>
    <div class="container-fluid">
        <form action="" method="post" id="formdata">
            <div class="row">
                <div class="col text-center">
                    <h3>Indice de Satisfacción del Cliente</h3>
                </div>
            </div>
            <br> 
            <div class="row">
                <div class="col-md-3">
                    <label for="iexpediente">No. Expediente</label>
                    <input type="text" name="" id="iexpediente" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="">Cliente</label>
                    <input type="text" id="icliente" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="">Atendio</label>
                    <input type="text" id="iatendio" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for=""></label>
                    <button type="button" class="btn btn-primary btn-lg btn-block" id="btn_Buscar">Buscar</button>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                    <label for="">Fecha</label>
                    <input type="date" name="ifecha" id="ifecha" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="">1.- ¿Como considera el nivel de nuestras instalaciones?</label>
                    <select name="pr1" id="pr1" class="form-control">
                        <option value="0">Selecciona una respuesta</option>
                        <option value="1">Buena</option>
                        <option value="2">Regular</option>
                        <option value="3">Mala</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="">2.- ¿La atencion recibida por nuestro personal es adecuada?</label>
                    <select name="pr2" id="pr2" class="form-control">
                        <option value="0">Selecciona una respuesta</option>
                        <option value="1">Buena</option>
                        <option value="2">Regular</option>
                        <option value="3">Mala</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="">3.- ¿Se dio solucion inmediata a alguna anomalia o queja?</label>
                    <select name="pr3" id="pr3" class="form-control">
                        <option value="0">Selecciona una respuesta</option>
                        <option value="1">Si</option>
                        <option value="2">No</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                    <label for="">4.- ¿Como considera la calidad del trabajo de la reparacion de su vehiculo?</label>
                    <select name="pr4" id="pr4" class="form-control">
                        <option value="0">Selecciona una respuesta</option>
                        <option value="1">Excelente</option>
                        <option value="2">Buena</option>
                        <option value="3">Mala</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="">5.- ¿Se le comunico oportunamente el estatus de la reparacion?</label>
                    <select name="pr5" id="pr5" class="form-control">
                        <option value="0">Selecciona una respuesta</option>
                        <option value="1">Si</option>
                        <option value="2">No</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="">6.- ¿Se le ofrecio alguna reparacion adicional a la del siniestro?</label>
                    <select name="pr6" id="pr6" class="form-control">
                        <option value="0">Selecciona una respuesta</option>
                        <option value="1">Si</option>
                        <option value="2">No</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="">7.- ¿Se le ofrecio alguna reparacion adicional a la del siniestro?</label>
                    <select name="pr7" id="pr7" class="form-control">
                        <option value="0">Selecciona una respuesta</option>
                        <option value="1">Si</option>
                        <option value="2">Tal Vez</option>
                        <option value="3">No</option>
                    </select>
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
            <br>
            <div class="row">
                <div class="col text-center">
                    <h3>Listado de Vehiculos Entregados</h3>
                </div>
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
                                    <tbody id="listado_vehiculos">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col text-center">
                    <h3>Listado de Encuestas</h3>
                </div>
            </div>
            <br>
            <div class="form-group col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body" id="panel">
                            <div class="table-responsive">
                                <table id="lista_encuestas" class="table table-striped table-bordered" border="0">
                                    <thead class="text-capitalize">
                                        <tr>
                                            <th>Expediente</th>
                                            <th>Cliente</th>
                                            <th>Atendio</th>
                                            <th>Fecha</th>
                                            <th>Pregunta 1</th>
                                            <th>Pregunta 2</th>
                                            <th>Pregunta 3</th>
                                            <th>Pregunta 4</th>
                                            <th>Pregunta 5</th>
                                            <th>Pregunta 6</th>
                                            <th>Pregunta 7</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody id="listado_encuestas">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
    </div>

    <script src="/siga/vista/js/iscliente.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/pdfmake-0.1.36/pdfmake.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/DataTables-1.10.22/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Buttons-1.6.5/js/dataTables.buttons.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Buttons-1.6.5/js/buttons.flash.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Buttons-1.6.5/js/buttons.html5.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Responsive-2.2.6/js/dataTables.responsive.js"></script>