<?php

include("../modelo/class_orden_retrabajo_dal.php");

if (isset($_POST['id']) and isset($_POST['fecha']) and isset($_POST['observaciones']) and isset($_POST['elaboro'])) {
    //echo 'si entra';

    $objeto = new orden_retrabajo_dal();
    $id = $_POST['id'];
    $fecha = $_POST['fecha'];
    $observaciones = $_POST['observaciones'];
    $elaboro = $_POST['elaboro'];
    //echo count($reparacion);
    $o = '';

    $f =  Date('Y-m-d');

    for ($i=0; $i < count($observaciones); $i++) { 
        $o .= $observaciones[$i].'/';
    }

    $rr = $objeto->insert_orden($id, $f, $o, $elaboro);
    
    if ($rr == 1) {
        echo 1;
    } else {
        echo 0;
    }
    
}
?>