<?php 
    include_once '../incluciones/sesion.php';

    if ($_SESSION['user'] == 'Raul' || $_SESSION['user'] == 'Karen' || $_SESSION['user'] == 'Alfredo' || $_SESSION['user'] == 'Erika') {
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
    <link rel="stylesheet" type="text/css" href="/siga/vista/libs/Select-1.3.1/css/select.dataTables.css"/>
    <link rel="stylesheet" href="/siga/vista/css/alta_almacen.css">
    <div class="container-fluid">
        <form action="" class="formdata" id="formdata">
            <div class="row">
                <div class="col text-center">
                    <h3>Alta de Refacciones en Almacen</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="">No. Expediente</label>
                    <input type="text" name="iexpediente" id="iexpediente" class="form-control" require>
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
                <div class="col-md-4">
                    <label for="">Fecha de Llegada</label>
                    <input type="date" name="ifechallegada" id="ifechallegada" class="form-control" require>
                </div>
                <div class="col-md-4">
                    <label for="">Aseguradora</label>
                    <div id="select_aseguradora">
                        
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="">Descripcion</label>
                    <input type="text" name="idescripcion" id="idescripcion" class="form-control" require>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="">Marca</label>
                    <select name="sautos" id="sautos" class="form-control">
                        <option value="0">Seleccione Vehículo:</option>
                        <option value="32">Acura</option>
                        <option value="1">Audi</option>
                        <option value="2">BMW</option>
                        <option value="3">Buick</option>
                        <option value="4">Cadillac</option>
                        <option value="5">Chevrolet</option>
                        <option value="6">Chrysler</option>
                        <option value="7">Dodge</option>
                        <option value="8">Fiat</option>
                        <option value="9">Ford</option>
                        <option value="10">GMC</option>
                        <option value="11">Honda</option>
                        <option value="12">Hyundai</option>
                        <option value="30">JAC</option>
                        <option value="13">Jaguar</option>
                        <option value="14">Jeep</option>
                        <option value="15">KIA</option>
                        <option value="16">Lincoln</option>
                        <option value="17">Mazda</option>
                        <option value="18">Mercedes-Benz</option>
                        <option value="19">Mercury</option>
                        <option value="20">MINI</option>
                        <option value="21">Mitsubishi</option>
                        <option value="22">Nissan</option>
                        <option value="23">Peugeot</option>
                        <option value="31">Pontiac</option>
                        <option value="24">Renault</option>
                        <option value="25">Seat</option>
                        <option value="26">Subaru</option>
                        <option value="27">Suzuki</option>
                        <option value="28">Toyota</option>
                        <option value="29">Volkswagen</option>
                    </select>            
                </div>
                <div class="col-md-4">
                    <label for="isubmarca">Sub-marca</label>
                    <div id="select_submarca"></div>
                </div>
                <div class="col-md-4">
                    <label for="">Modelo</label>
                    <input type="text" name="imodelo" id="imodelo" class="form-control" require>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="">No. Expediente</label>
                    <input type="text" name="iexpediente2" id="iexpediente2" class="form-control" require>
                </div>
                <div class="col-md-4">
                    <label for="isubmarca">Ubicacion</label>
                    <input type="text" name="iubicacion" id="iubicacion" class="form-control" require>
                </div>
                <div class="col-md-4">
                    <label for="">Fecha de Entrega</label>
                    <input type="date" name="ifechaentrega" id="ifechaentrega" class="form-control" require>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="lestatus">Estatus</label>
                    <div id="select_estatus">
                        
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="">Comentarios</label>
                    <input type="text" name="icomentarios" id="icomentarios" class="form-control" require>
                </div>
                <div class="col-md-4">
                    <label for=""></label>
                    <button type="button" class="btn btn-primary btn-lg btn-block" id="btn_registrar">Registrar</button>
                </div>
                <div class="col-md-1"></div>
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
                                            <th>Fecha de Llegada</th>
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
        </form>
    </div>
    <script src="/siga/vista/js/alta_almacen.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/pdfmake-0.1.36/pdfmake.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/DataTables-1.10.22/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Buttons-1.6.5/js/dataTables.buttons.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Buttons-1.6.5/js/buttons.flash.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Buttons-1.6.5/js/buttons.html5.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Responsive-2.2.6/js/dataTables.responsive.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Select-1.3.1/js/dataTables.select.js"></script>