<?php 
    include_once '../incluciones/sesion.php';

    if ($_SESSION['user'] == 'Alfredo' || $_SESSION['user'] == 'Karen' || $_SESSION['user'] == 'Ernesto' || $_SESSION['user'] == 'Erika') {
        header("Refresh:");
        echo 'No tienes permisos para acceder';
        die();
        exit();
    }
?>
    <link rel="stylesheet" href="/siga/vista/css/actualizar_presupuesto.css">
    <div class="container-fluid">
        <form action="" method="post" id="formdata">
            <div class="row">
                <div class="col text-center">
                    <h3>Actualizar Presupuesto Inicial</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="lexpediente">No. Expediente</label>
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
                <div class="col text-center">
                    <h3>Inicio de Presupuesto</h3>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <label for="loperacion">Operacion</label>
                    <textarea name="toperacion" id="toperacion" cols="30" rows="5" class="form-control" placeholder="Agrega las operaciones"></textarea>
                </div>
                <div class="col-md-4">
                    <label for="loperacion">Nivel</label>
                    <textarea name="tnivel" id="tnivel" cols="30" rows="5" class="form-control" placeholder="Agrega los niveles de daño"></textarea>
                </div>
                <div class="col-md-4">
                    <label for="lconceptio">Concepto</label>
                    <textarea name="tconcepto" id="tconcepto" cols="30" rows="5" class="form-control" placeholder="Agrega los conceptos"></textarea>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-2">
                    <label for="loperacion">M.O.M.H</label>
                    <textarea name="tmomh" id="tmomh" cols="30" rows="5" class="form-control" placeholder="Agrega el costo de mano de obra y material de hojalateria"></textarea>
                </div>
                <div class="col-md-2">
                    <label for="loperacion">M.O.M.P</label>
                    <textarea name="tmomp" id="tmomp" cols="30" rows="5" class="form-control" placeholder="Agrega el costo de mano de obra y material de pintura"></textarea>
                </div>
                <div class="col-md-2">
                    <label for="lconceptio">M.O.M.M</label>
                    <textarea name="tmomm" id="tmomm" cols="30" rows="5" class="form-control" placeholder="Agrega el costo de mano de obra y material de mecanica"></textarea>
                </div>
                <div class="col-md-2">
                    <label for="lconceptio">T.O.T</label>
                    <textarea name="ttot" id="ttot" cols="30" rows="5" class="form-control" placeholder="Agrega el costo de trabajos en otro taller"></textarea>
                </div>
                <div class="col-md-2">
                    <label for="lconceptio">Refacciones</label>
                    <textarea name="ttot" id="trefacciones" cols="30" rows="5" class="form-control" placeholder="Agrega el costo de las refacciones"></textarea>
                </div>
                <div class="col-md-1"></div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2">
                    <label for="ltmomh">Total M.O.M.H</label>
                    <input type="text" class="form-control" id="itmomh">
                </div>
                <div class="col-md-2">
                    <label for="ltmomp">Total M.O.M.P</label>
                    <input type="text" class="form-control" id="itmomp">
                </div>
                <div class="col-md-2">
                    <label for="ltmomm">Total M.O.M.M</label>
                    <input type="text" class="form-control" id="itmomm">
                </div>
                <div class="col-md-2">
                    <label for="ltmomh">Total T.O.T</label>
                    <input type="text" class="form-control" id="ittot">
                </div>
                <div class="col-md-2">
                    <label for="ltrefacciones">Total Refacciones</label>
                    <input type="text" class="form-control" id="itrefacciones">
                </div>
                <div class="col-md-2">
                    <label for=""></label>
                    <button type="button" class="btn btn-primary btn-lg btn-block" id="btn_calcular">Calcular Totales</button>
                </div>
            </div>
            <br> 
            <div class="row">
                <div class="col-md-3">
                    <label for="lsubtotal">Sub-Total</label>
                    <input type="text" class="form-control" id="isubtotal">
                </div>
                <div class="col-md-3">
                    <label for="liva">IVA</label>
                    <input type="text" class="form-control" id="iiva">
                </div>
                <div class="col-md-3">
                    <label for="lsubtotal">Total</label>
                    <input type="text" class="form-control" id="itotal">
                </div>
                <div class="col-md-3">
                    <label for="lsubtotal"></label>
                    <button type="button" class="btn btn-primary btn-lg btn-block" id="btn_calcular2">Calcular Totales Finales</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <label for=""></label>
                    <button type="button" class="btn btn-primary btn-lg btn-block" id="btn_registrar">Actualizar</button>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
        </form>
    </div>

    <script src="/siga/vista/js/actualizar_presupuesto.js"></script>