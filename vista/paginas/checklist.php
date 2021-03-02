<?php
    include_once '../incluciones/sesion.php';

    if ($_SESSION['user'] == 'Ernesto' || $_SESSION['user'] == 'Alfredo' || $_SESSION['user'] == 'Erika') {
        header("Refresh:");
        echo 'No tienes permisos para acceder';
        die();
        exit();
    }
?>
    <link rel="stylesheet" href="/siga/vista/css/checklist.css">
    <div class="container-fluid">
        <form action="" id="formdata" method="post">
            <div class="row">
                <div class="col text-center">
                    <h3>Alta Checklist</h3>
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
                    <h3>Inicio Checklist</h3>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="row">Exterior</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="lucesfrontales" checked>
                                        <label class="form-check-label" for="defaultCheck1">Luces Frontales</label>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="cuartoluces" checked>
                                        <label class="form-check-label" for="defaultCheck1">1/4 de Luces</label>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="direccionalizq" checked>
                                        <label class="form-check-label" for="defaultCheck1">Direccional Izq.</label>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="direccionalder" checked>
                                        <label class="form-check-label" for="defaultCheck1">Direccional Der.</label>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="espejoder" checked>
                                        <label class="form-check-label" for="defaultCheck1">Espejo Der.</label>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="espejoizq" checked>
                                        <label class="form-check-label" for="defaultCheck1">Espejo Izq.</label>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="cristales" checked>
                                        <label class="form-check-label" for="defaultCheck1">Cristales</label>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="emblemas" checked>
                                        <label class="form-check-label" for="defaultCheck1">Emblemas</label>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="llantas" checked>
                                        <label class="form-check-label" for="defaultCheck1">Lantas</label>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="tapon_ruedas" checked>
                                        <label class="form-check-label" for="defaultCheck1">Tapon de Ruedas</label>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="molduras" checked>
                                        <label class="form-check-label" for="defaultCheck1">Molduras</label>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="tapa_gasolina" checked>
                                        <label class="form-check-label" for="defaultCheck1">Tapa de Gasolina</label>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="stop" checked>
                                        <label class="form-check-label" for="defaultCheck1">Stop</label>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="luz_tras_izq" checked>
                                        <label class="form-check-label" for="defaultCheck1">Luz Tras. Izq.</label>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="luz_tras_der" checked>
                                        <label class="form-check-label" for="defaultCheck1">Luz Tras. Der.</label>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="direccional_tras_izq" checked>
                                        <label class="form-check-label" for="defaultCheck1">Direccional Tras. Izq</label>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="direccional_tras_der" checked>
                                        <label class="form-check-label" for="defaultCheck1">Direccional Tras. Der</label>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="luz_placa" checked>
                                        <label class="form-check-label" for="defaultCheck1">Luz Placa</label>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="luz_cajuela" checked>
                                        <label class="form-check-label" for="defaultCheck1">Luz de Cajuela</label>
                                    </div>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                    
                </div>
                <div class="col-md-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="row">Interior</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="luztablero" checked>
                                        <label class="form-check-label" for="defaultCheck1">Luz de Tablero</label>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="instrumentostablero" checked>
                                        <label class="form-check-label" for="defaultCheck1">Instrumentos de Tablero</label>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="llaves" checked>
                                        <label class="form-check-label" for="defaultCheck1">Llaves</label>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="limpiaparabrisasfront" checked>
                                        <label class="form-check-label" for="defaultCheck1">Limpiaparabrisas Frontal</label>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="limpiaparabrisastras" checked>
                                        <label class="form-check-label" for="defaultCheck1">Limpiaparabrisas Trasero</label>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="estereo" checked>
                                        <label class="form-check-label" for="defaultCheck1">Estereo</label>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="bocinasfront" checked>
                                        <label class="form-check-label" for="defaultCheck1">Bocinas Frontales</label>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="bocinastras" checked>
                                        <label class="form-check-label" for="defaultCheck1">Bocinas Traseras</label>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="encendedor" checked>
                                        <label class="form-check-label" for="defaultCheck1">Encendedor</label>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="espejoretro" checked>
                                        <label class="form-check-label" for="defaultCheck1">Espejo Retrovisor</label>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="cenicero" checked>
                                        <label class="form-check-label" for="defaultCheck1">Cenicero</label>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="cinturones" checked>
                                        <label class="form-check-label" for="defaultCheck1">Cinturones</label>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="luzinterior" checked>
                                        <label class="form-check-label" for="defaultCheck1">Luz de Interior</label>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="parasolizq" checked>
                                        <label class="form-check-label" for="defaultCheck1">Parasol Izq.</label>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="parasolder" checked>
                                        <label class="form-check-label" for="defaultCheck1">Parasol Der.</label>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="vestidurastela" checked>
                                        <label class="form-check-label" for="defaultCheck1">Vestiduras de Tela</label>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="vestiduraspiel" checked>
                                        <label class="form-check-label" for="defaultCheck1">Vestiduras de Piel</label>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="testigostablero" checked>
                                        <label class="form-check-label" for="defaultCheck1">Testigos de Tablero</label>
                                    </div>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="row">Accesorios</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="refaccion" checked>
                                        <label class="form-check-label" for="defaultCheck1">Refaccion</label>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="dadoseguridad" checked>
                                        <label class="form-check-label" for="defaultCheck1">Dado de Seguridad</label>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="gato" checked>
                                        <label class="form-check-label" for="defaultCheck1">Gato</label>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="maneral" checked>
                                        <label class="form-check-label" for="defaultCheck1">Maneral</label>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="herramientas" checked>
                                        <label class="form-check-label" for="defaultCheck1">Herramientas</label>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="triangulo" checked>
                                        <label class="form-check-label" for="defaultCheck1">Triangulo</label>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="botiquin" checked>
                                        <label class="form-check-label" for="defaultCheck1">Botiquin</label>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="extintor" checked>
                                        <label class="form-check-label" for="defaultCheck1">Extintor</label>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="cables" checked>
                                        <label class="form-check-label" for="defaultCheck1">Cables</label>
                                    </div>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="row">Componentes Mecanicos</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="claxon" checked>
                                        <label class="form-check-label" for="defaultCheck1">Claxon</label>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="taponaceite" checked>
                                        <label class="form-check-label" for="defaultCheck1">Tapon Aceite</label>
                                    </div>
                                </th>
                            </tr> 
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="tapongasolin" checked>
                                        <label class="form-check-label" for="defaultCheck1">Tapon de Gasolina</label>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="taponradiador" checked>
                                        <label class="form-check-label" for="defaultCheck1">Tapon de Radiador</label>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="vayoneta" checked>
                                        <label class="form-check-label" for="defaultCheck1">Vayoneta de Aceite</label>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="bateria" checked>
                                        <label class="form-check-label" for="defaultCheck1">Bateria</label>
                                    </div>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="">Combustible</label>
                    <select name="" id="sgasolina" class="form-control">
                        <option value="0">Seleccione el nivel de Combustible:</option>
                        <option value="1">0</option>
                        <option value="2">1/4</option>
                        <option value="3">1/2</option>
                        <option value="4">3/4</option>
                        <option value="5">1</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="">Kilometraje</label>
                    <input type="text" name="" id="kilometraje" class="form-control">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <label for="">Observaciones</label>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <textarea name="" id="observaciones" cols="100" rows="10" class="form-control" placeholder="Documentar daños y daños preexistentes"></textarea>
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

    <script src="/siga/vista/js/checklist.js"></script>