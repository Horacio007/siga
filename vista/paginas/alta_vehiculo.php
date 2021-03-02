<?php 
    include_once '../incluciones/sesion.php';

    if ($_SESSION['user'] == 'Ernesto' || $_SESSION['user'] == 'Alfredo' || $_SESSION['user'] == 'Erika') {
        header("Refresh:");
        echo 'No tienes permisos para acceder';
        die();
        exit();
    }
?>
    <link rel="stylesheet" href="/siga/vista/css/alta_vehiculo.css">
    <div class="container-fluid">
    <form action="" class="formdata" id="formdata">
        <div class="row">
            <div class="col text-center">
                <h3>Datos de Llegada</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for="ifecha">Fecha de Llegada</label>
                <input type="text" name="" id="ifecha" class="form-control" readonly>
            </div>
            <div class="col-md-4">
                <label for="iexpediente">No. Expediente</label>
                <input type="text" name="" id="iexpediente" class="form-control">       
            </div>
            <div class="col-md-4">
                <label for="iexpediente">No. Ultimo Expediente</label>
                <input type="text" name="" id="iuexpediente" class="form-control" readonly>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col text-center">
                <h3>Datos del Cliente</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for="inombre">Nombre del Cliente</label>
                <input type="text" class="form-control" id="inombre" placeholder="Nombre" require>
            </div>
            <div class="col-md-4">
                <label for="itelefono">Numero de Telefono</label>
                <input type="tel" class="form-control" id="itel" placeholder="Telefono" pattern="[0-9]{10}" require>          
            </div>
            <div class="col-md-4">
                <label for="icorreo">Correo Electronico</label>
                <input type="email" class="form-control" id="icorreo" placeholder="Correo" require>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col text-center">
                <h3>Datos del Vehículo</h3>
            </div>
        </div> 
        <div class="row">
            <div class="col-md-4">
                <label for="imarca">Marca</label>
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
                <label for="imodelo">Modelo</label>
                <input type="text" class="form-control" id="imodelo" placeholder="Modelo" require>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <label for="icolor">Color</label>
                <input type="text" class="form-control" id="icolor" placeholder="Color" require>            
            </div>
            <div class="col-md-4">
                <label for="iplacas">Placas</label>
                <input type="text" class="form-control" id="iplacas" placeholder="Placas" require>
            </div>
            <div class="col-md-4">
                <label for="isiniestro">Siniestro</label>
                <input type="text" class="form-control" id="isiniestro" placeholder="Siniestro" require>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <label for="iasesor">Asesor</label>
                <div id="select_asesor">
                    
                </div>            
            </div>
            <div class="col-md-4">
                <label for="iaseguradora">Aseguradora</label>
                <div id="select_aseguradora">
                    
                </div>
            </div>
            <div class="col-md-4">
                <label for="lestatus">Estatus</label>
                <div id="select_estatus">
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <label for=""></label>
                <button type="button" class="btn btn-primary btn-lg btn-block" id="btn_registrar">Registrar</button>
            </div>
            <div class="col-md-4"></div>
        </div>
    </form>
    </div>

    <script src="/siga/vista/js/alta_vehiculo.js"></script>