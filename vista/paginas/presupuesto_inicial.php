<?php 
    include_once '../incluciones/sesion.php';

    if ($_SESSION['user'] == 'Alfredo' || $_SESSION['user'] == 'Karen' || $_SESSION['user'] == 'Ernesto' || $_SESSION['user'] == 'Erika') {
        header("Refresh:");
        echo 'No tienes permisos para acceder';
        die();
        exit();
    }
?>
    <link rel="stylesheet" href="/siga/vista/css/presupuesto_inicial.css">
    <div class="container-fluid">
        <form action="" method="post" id="formdata">
            <div class="row">
                <div class="col text-center">
                    <h3>Presupuesto Inicial</h3>
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
                <div class="col-md-4">
                    <label for=""></label>
                    <div id="inf" class="text-center">
                        <label for="" id="info"></label>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col text-center">
                    <h3>Inicio de Presupuesto</h3>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2">
                    <label for="loperacion">Operacion</label>
                    <input type="text" name="toperacion" id="toperacion" class="form-control" placeholder="Agrega la operacion...">
                </div>
                <div class="col-md-2">
                    <label for="loperacion">Nivel</label>
                    <input type="text" name="tnivel" id="tnivel" class="form-control" placeholder="Agrega el nivel de daño...">
                </div>
                <div class="col-md-2">
                    <label for="lconceptio">Concepto</label>
                    <input type="text" name="tconcepto" id="tconcepto" class="form-control" placeholder="Agrega el concepto...">
                </div>
                <div class="col-md-1">
                    <label for="loperacion">M.O.M.H</label>
                    <input type="text" name="tmomh" id="tmomh" class="form-control" placeholder="Agrega el costo de mano de obra y material de hojalateria">
                </div>
                <div class="col-md-1">
                    <label for="loperacion">M.O.M.P</label>
                    <input type="text" name="tmomp" id="tmomp" class="form-control" placeholder="Agrega el costo de mano de obra y material de pintura">
                </div>
                <div class="col-md-1">
                    <label for="lconceptio">M.O.M.M</label>
                    <input type="text" name="tmomm" id="tmomm" class="form-control" placeholder="Agrega el costo de mano de obra y material de mecanica">
                </div>
                <div class="col-md-1">
                    <label for="lconceptio">T.O.T</label>
                    <input type="text"  name="ttot" id="ttot" class="form-control" placeholder="Agrega el costo de trabajos en otro taller">
                </div>
                <div class="col-md-1">
                    <label for="lconceptio">Refacciones</label>
                    <input type="text" name="ttot" id="trefacciones" class="form-control" placeholder="Agrega el costo de las refacciones">
                </div>
                <div class="col-md-1">
                    <label for=""></label>
                    <button type="button" class="btn btn-success btn-lg btn-block" id="btn_agregar">Agregar</button>
                </div>
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
                    <button type="button" class="btn btn-primary btn-lg btn-block" id="btn_registrar">Registrar</button>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
        </form>
    </div>

    <script src="/siga/vista/js/presupuesto_inicial.js"></script>
    <script  src = " https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.debug.js"  integrity = "sha384-THVO / sM0mFD9h7dfSndI6TS0PgAGavwKvB5hAxRRvc0o9cPLohB0wb / PTA7LdUHs "  crossorigin = " anonymous " > </script>