<?php

include("../modelo/class_orden_mecanica_dal.php");

if (isset($_POST['id']) and isset($_POST['fecha']) and isset($_POST['diagnostico']) and isset($_POST['elaboro'])) {
    //echo 'si entra';

    $objeto = new orden_mecanica_dal();
    $id = $_POST['id'];
    $fecha = $_POST['fecha'];
    $diagnostico = $_POST['diagnostico'];
    $elaboro = $_POST['elaboro'];
    //echo count($reparacion);
    $d = '';

    $f =  Date('Y-m-d');

    for ($i=0; $i < count($diagnostico); $i++) { 
        $d .= $diagnostico[$i].'/';
    }

    $rr = $objeto->insert_orden($id, $f, $d, $elaboro);
    
    if ($rr == 1) {
        echo 1;
    } else {
        echo 0;
    }
    
}
?>