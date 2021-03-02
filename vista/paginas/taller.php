<?php 
    include_once '../incluciones/sesion.php';
    if ($_SESSION['user'] == 'Noel' || $_SESSION['user'] == 'Raul' ||  $_SESSION['user'] == 'Ernesto' || $_SESSION['user'] == 'Erika') {
        header("Refresh:");
        echo 'No tienes permisos para acceder';
        die();
        exit();
    }
?>
    <link rel="stylesheet" href="/siga/vista/css/taller.css">
    <link rel="stylesheet" type="text/css" href="/siga/vista/libs/DataTables-1.10.22/css/jquery.dataTables.css"/>
    <link rel="stylesheet" type="text/css" href="/siga/vista/libs/Buttons-1.6.5/css/buttons.dataTables.css"/>
    <link rel="stylesheet" type="text/css" href="/siga/vista/libs/Responsive-2.2.6/css/responsive.dataTables.css"/>
    <div class="container-fluid">
        <form action="" class="formdata" id="formdata">
            <div class="row">
                <div class="col text-center">
                    <h3>Taller</h3>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                    <label for="">No. Expediente (Id)</label>
                    <input type="text" class="form-control" id="id_vehiculo">
                </div>
                <div class="col-md-3">
                    <label for=""></label>
                    <button type="button" class="btn btn-primary btn-lg btn-block" id="btn_buscar">Buscar</button>
                </div>
                <div class="col-md-3">
                    <label for=""></label>
                    <button type="button" class="btn btn-success btn-lg btn-block" id="btnmodificar">Actualizar</button>
                </div>
                <div class="col-md-3">
                    <label for=""></label>
                    <button type="button" class="btn btn-info btn-lg btn-block" id="btnnvo" data-toggle="tooltip" data-placement="bottom" title="Buscar Nuevo Proceso del Vehiculo">Buscar Nuevo</button>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-2" id="tablaHoja">
                    <center><strong>Hojalateria</strong></center>
                    <label for="" id="laplicahoja">Aplica -> </label>
                    <br>
                    <label for="" id="lasignadohoja">Asignado -> </label>
                    <br>
                    <label for="">Fecha Ingreso</label>
                    <input type="date" name="" id="fechahoja" class="form-control">                
                    <label for="">Comentarios</label>
                    <input type="text" class="form-control" id="comentariosHoja" placeholder="Comentarios...">
                    <br>
                </div>
                <div class="col-md-2" id="tablapintura">
                    <center><strong>Pintura</strong></center>
                    <label for="" id="laplicapin">Aplica -> </label>
                    <br>
                    <label for="" id="lasignadopin">Asignado -> </label>
                    <br>
                    <label for="">Fecha Ingreso</label>
                    <input type="date" name="" id="fechapin" class="form-control">                
                    <label for="">Comentarios</label>
                    <input type="text" class="form-control" id="comentariospin" placeholder="Comentarios...">
                    <br>
                </div>
                <div class="col-md-2" id="tablaarmado">
                    <center><strong>Armado</strong></center>
                    <label for="" id="laplicaarm">Aplica -> </label>
                    <br>
                    <label for="" id="lasignadoarm">Asignado -> </label>
                    <br>
                    <label for="">Fecha Ingreso</label>
                    <input type="date" name="" id="fechaarm" class="form-control">                
                    <label for="">Comentarios</label>
                    <input type="text" class="form-control" id="comentariosarm" placeholder="Comentarios...">
                    <br>
                </div>
                <div class="col-md-2" id="tabladetallado">
                    <center><strong>Detallado</strong></center>
                    <label for="" id="laplicadeta">Aplica -> </label>
                    <br>
                    <label for="" id="lasignadodeta">Asignado -> </label>
                    <br>
                    <label for="">Fecha Ingreso</label>
                    <input type="date" name="" id="fechadeta" class="form-control">                
                    <label for="">Comentarios</label>
                    <input type="text" class="form-control" id="comentariosdeta" placeholder="Comentarios...">
                    <br>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-2" id="tablamecanica">
                    <center><strong>Mecanica</strong></center>
                    <label for="" id="laplicameca">Aplica -> </label>
                    <br>
                    <label for="" id="lasignadomeca">Asignado -> </label>
                    <br>
                    <label for="">Fecha Ingreso</label>
                    <input type="date" name="" id="fechameca" class="form-control">                
                    <label for="">Comentarios</label>
                    <input type="text" class="form-control" id="comentariosmeca" placeholder="Comentarios...">
                    <br>
                </div>
                <div class="col-md-2" id="tablalavado">
                    <center><strong>Lavado e Inspeccion</strong></center>
                    <label for="" id="laplicalava">Aplica -> </label>
                    <br>
                    <label for="" id="lasignadolava">Asignado -> </label>
                    <br>
                    <label for="">Fecha Ingreso</label>
                    <input type="date" name="" id="fechalava" class="form-control">                
                    <label for="">Comentarios</label>
                    <input type="text" class="form-control" id="comentarioslava" placeholder="Comentarios...">
                    <br>
                </div>
                <div class="col-md-2" id="tablaentrega">
                    <center><strong>Entrega al Cliente</strong></center>
                    <label for="">Fecha Entrega</label>
                    <input type="date" name="" id="fechainter" class="form-control">                
                    <label for="">Entrego</label>
                    <input type="text" class="form-control" id="entrego" placeholder="Entrego...">
                    <label for="">Recibio</label>
                    <input type="text" class="form-control" id="recibio" placeholder="Recibio...">
                    <br>
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
                                            <th>Expediente</th>
                                            <th>Estatus</th>
                                            <th>Fecha Llegada Taller</th>
                                            <th>Fecha Promesa</th>
                                            <th>Marca</th>
                                            <th>Linea</th>
                                            <th>Color</th>
                                            <th>Modelo</th>
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
    <script src="/siga/vista/js/taller.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/pdfmake-0.1.36/pdfmake.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/DataTables-1.10.22/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Buttons-1.6.5/js/dataTables.buttons.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Buttons-1.6.5/js/buttons.flash.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Buttons-1.6.5/js/buttons.html5.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Responsive-2.2.6/js/dataTables.responsive.js"></script>