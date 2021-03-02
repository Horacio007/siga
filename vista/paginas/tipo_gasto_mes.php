<?php 
    include_once '../incluciones/sesion.php';

    if ($_SESSION['user'] == 'Ernesto' || $_SESSION['user'] == 'Alfredo' || $_SESSION['user'] == 'Raul' || $_SESSION['user'] == 'Karen') {
        header("Refresh:");
        echo 'No tienes permisos para acceder';
        die();
        exit();
    }
?>
    <link rel="stylesheet" href="/siga/vista/css/tipo_gasto_mes.css">
    
    <div class="container-fluid">
        <form action="" class="formdata" id="formdata">
            <div class="row">
                <div class="col text-center">
                    <h3>Tipo de Gastos por Mes</h3>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col" id="tgmes"></div>
            </div>
        </form>
    </div>

    <script src="/siga/vista/js/tipo_gasto_mes.js"></script>
    <script src="/siga/vista/js/plotly-latest.min.js"></script>