<?php 
  include_once '../incluciones/sesion.php';

    if ($_SESSION['user'] == 'Karen' || $_SESSION['user'] == 'Ernesto' || $_SESSION['user'] == 'Alfredo' || $_SESSION['user'] == 'Erika') {
        header("Refresh:");
        echo 'No tienes permisos para acceder';
        die();
        exit();
    }
?>
    <link rel="stylesheet" href="/siga/vista/css/refacciones.css">
    <div class="container-fluid">
        <form action="" enctype="multipart/form-data" method="post" id="formdata">
            <div class="row">
                <div class="col text-center">
                    <h3>Cotizar Refacciones</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="lexpediente">No. Expediente</label>
                    <input type="text" name="iexpediente" id="iexpediente" class="form-control" require>
                </div>
                <div class="col-md-4">
                    <label for=""></label>
                    <button type="button" class="btn btn-primary btn-lg btn-block" id="btn_buscar">Buscar</button>
                </div>
                <div class="col-md-4"></div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <label for="lconcepto" >Concepto</label>
                    <textarea name="tconcepto" id="tconcepto" cols="30" rows="12" class="form-control"></textarea>
                </div>
                <div class="col-md-1">
                    <label for="lcantidad">Cantidad</label>
                    <textarea name="tcantidad" id="tcantidad" cols="30" rows="12" class="form-control" placeholder="Agrega las Cantidades"></textarea>
                </div>
                <div class="col-md-2">
                    <label for="lproveedor1" >Proveedor 1</label>
                    <input type="text" name="nprovedor1" id="nprovedor1" class="form-control" require placeholder="Nombre">
                    <label for=""></label>
                    <textarea name="tproveedor1" id="tproveedor1" cols="30" rows="10" class="form-control" placeholder="Agrega los Precios"></textarea>
                </div>
                <div class="col-md-2">
                    <label for="lproveedor2" >Proveedor 2</label>
                    <input type="text" name="nprovedor2" id="nprovedor2" class="form-control" require placeholder="Nombre">
                    <label for=""></label>
                    <textarea name="tproveedor2" id="tproveedor2" cols="30" rows="10" class="form-control" placeholder="Agrega los Precios"></textarea>
                </div>
                <div class="col-md-2">
                    <label for="lproveedor3" >Proveedor 3</label>
                    <input type="text" name="nprovedor3" id="nprovedor3" class="form-control" require placeholder="Nombre">
                    <label for=""></label>
                    <textarea name="tproveedor3" id="tproveedor3" cols="30" rows="10" class="form-control" placeholder="Agrega los Precios"></textarea>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                    <label for="" id="lpremier">Total</label>
                    <input type="text" class="form-control" id="tpremier" require>
                </div>
                <div class="col-md-3">
                    <label for="" id="lroto">Total</label>
                    <input type="text" class="form-control" id="troto" require>
                </div>
                <div class="col-md-3">
                    <label for="" id="laldo">Total</label>
                    <input type="text" class="form-control" id="taldo" require>
                </div>
                <div class="col-md-3">
                    <label for=""></label>
                    <button type="button" class="btn btn-primary btn-lg btn-block" id="btn_calcular">Calcular Totales</button>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                    <label for="">Proveedror Final</label>
                    <textarea name="tproveedorf" id="tproveedorf" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="col-md-3">
                    <label for="">Costos</label>
                    <textarea name="tcostos" id="tcostos" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="col-md-3">
                    <label for="">Costos Finales</label>
                    <input type="text" class="form-control" id="tcostosf" require>
                </div>
                <div class="col-md-3">
                    <label for=""></label>
                    <button type="button" class="btn btn-primary btn-lg btn-block" id="btn_calcular2">Calcular Totales Finales</button>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <label for="" >Fecha Promesa</label>
                    <textarea name="tfechapromesa" id="tfechapromesa" cols="30" rows="10" class="form-control" placeholder="Agrega las Fechas Promesa"></textarea>
                </div>
                <div class="col-md-4">
                    <label for="" >Numero Guia</label>
                    <textarea name="tnumguia" id="tnumguia" cols="30" rows="10" class="form-control" placeholder="Agrega los Numeros de Guia"></textarea>
                </div>
                <div class="col-md-4">
                    <label for="" >Comentarios</label>
                    <textarea name="tcomentarios" id="tcomentarios" cols="30" rows="10" class="form-control" placeholder="Agrega los Comentarios"></textarea>
                </div>
            </div>
            <br>
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

    <script src="/siga/vista/js/refacciones.js"></script>