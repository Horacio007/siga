<?php 
    include_once '../incluciones/sesion.php';
    if ($_SESSION['user'] == 'Noel' || $_SESSION['user'] == 'Raul' || $_SESSION['user'] == 'Ernesto' || $_SESSION['user'] == 'Erika') {
        header("Refresh:");
        echo 'No tienes permisos para acceder';
        die();
        exit();
    }
?>
    <link rel="stylesheet" href="/siga/vista/css/asignacion_personal.css">
    <link rel="stylesheet" type="text/css" href="/siga/vista/libs/DataTables-1.10.22/css/jquery.dataTables.css"/>
    <link rel="stylesheet" type="text/css" href="/siga/vista/libs/Buttons-1.6.5/css/buttons.dataTables.css"/>
    <link rel="stylesheet" type="text/css" href="/siga/vista/libs/Responsive-2.2.6/css/responsive.dataTables.css"/>
    <div class="container-fluid">
        <form action="" class="formdata" id="formdata">
            <div class="row">
                <div class="col text-center">
                    <h3>Asignacion de Personal</h3>
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
                    <button type="button" class="btn btn-success btn-lg btn-block" id="btnmodificar">Actualizar</button>
                </div>
                </div>
            </div>
            <br>
            <div class='row'>
                <div class="col-md-2">
                    <table class="table" id="tablaHoja">
                        <thead>
                            <tr>
                                <th scope="row"><center>Hojalateria</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="aplicaHoja" checked>
                                        <label class="form-check-label" for="defaultCheck1">Aplica</label>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <label for="">Fecha Ingreso</label>
                                    <input type="date" name="" id="fechahoja" class="form-control">
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <label for="">Asignado</label>
                                    <div id="selec_hoja">
                                    
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <label for="">Comentarios</label>
                                    <input type="text" class="form-control" id="comentariosHoja" placeholder="Comentarios...">
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-2">
                    <table class="table" id="tablapintura">
                        <thead>
                            <tr>
                                <th scope="row"><center>Pintura</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="aplicaPin" checked>
                                        <label class="form-check-label" for="defaultCheck1">Aplica</label>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <label for="">Fecha Ingreso</label>
                                    <input type="date" name="" id="fechaPin" class="form-control">
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <label for="">Asignado</label>
                                    <div id="selec_Pin">
                                    
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <label for="">Comentarios</label>
                                    <input type="text" class="form-control" id="comentariosPin" placeholder="Comentarios...">
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-2">
                    <table class="table" id="tablaarmado">
                        <thead>
                            <tr>
                                <th scope="row"><center>Armado</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="aplicaArm" checked>
                                        <label class="form-check-label" for="defaultCheck1">Aplica</label>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <label for="">Fecha Ingreso</label>
                                    <input type="date" name="" id="fechaArm" class="form-control">
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <label for="">Asignado</label>
                                    <div id="selec_Arm">
                                    
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <label for="">Comentarios</label>
                                    <input type="text" class="form-control" id="comentariosArm" placeholder="Comentarios...">
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-2">
                    <table class="table" id="tabladetallado">
                        <thead>
                            <tr>
                                <th scope="row"><center>Detallado</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="aplicaDet" checked>
                                        <label class="form-check-label" for="defaultCheck1">Aplica</label>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <label for="">Fecha Ingreso</label>
                                    <input type="date" name="" id="fechaDet" class="form-control">
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <label for="">Asignado</label>
                                    <div id="selec_Det">
                                    
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <label for="">Comentarios</label>
                                    <input type="text" class="form-control" id="comentariosDet" placeholder="Comentarios...">
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-2">
                    <table class="table" id="tablamecanica">
                        <thead>
                            <tr>
                                <th scope="row"><center>Mecanica</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="aplicaMeca" checked>
                                        <label class="form-check-label" for="defaultCheck1">Aplica</label>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <label for="">Fecha Ingreso</label>
                                    <input type="date" name="" id="fechaMeca" class="form-control">
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <label for="">Asignado</label>
                                    <div id="selec_Meca">
                                    
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <label for="">Comentarios</label>
                                    <input type="text" class="form-control" id="comentariosMeca" placeholder="Comentarios...">
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-2">
                    <table class="table" id="tablalavado">
                        <thead>
                            <tr>
                                <th scope="row"><center>Lavado e Inspeccion</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="aplicaLava" checked>
                                        <label class="form-check-label" for="defaultCheck1">Aplica</label>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <label for="">Fecha Ingreso</label>
                                    <input type="date" name="" id="fechaLava" class="form-control">
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <label for="">Asignado</label>
                                    <div id="selec_Lava">
                                    
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <label for="">Comentarios</label>
                                    <input type="text" class="form-control" id="comentariosLava" placeholder="Comentarios...">
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <div class="panel panel-default">
                        <div class="panel-body" id="panel">
                            <div class="table-responsive">
                                <table id="lista_refacciones" class="table table-striped table-bordered" border="0">
                                    <thead class="text-capitalize">
                                        <tr>
                                            <th>Expediente</th>
                                            <th>Estatus</th>
                                            <th>Fecha Llegada Taller</th>
                                            <th>Marca</th>
                                            <th>Linea</th>
                                            <th>Color</th>
                                            <th>Modelo</th>
                                            <th>Placas</th>
                                            <th>Cliente</th>
                                            <th>Personal</th>
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
    <script src="/siga/vista/js/asignacion_personal.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/pdfmake-0.1.36/pdfmake.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/DataTables-1.10.22/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Buttons-1.6.5/js/dataTables.buttons.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Buttons-1.6.5/js/buttons.flash.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Buttons-1.6.5/js/buttons.html5.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Responsive-2.2.6/js/dataTables.responsive.js"></script>