<?php

include("../modelo/class_orden_trabajo_dal.php");

if (isset($_POST['id']) and isset($_POST['fecha']) and isset($_POST['reparacion']) and isset($_POST['hojalateria']) and isset($_POST['pintura']) and isset($_POST['mecanica']) and isset($_POST['observaciones']) and isset($_POST['elaboro'])) {
    //echo 'si entra';

    $objeto = new orden_trabajo_dal();
    $id = $_POST['id'];
    $fecha = $_POST['fecha'];
    $reparacion = $_POST['reparacion'];
    $hojalateria = $_POST['hojalateria'];
    $pintura = $_POST['pintura'];
    $mecanica = $_POST['mecanica'];
    $observaciones = $_POST['observaciones'];
    $elaboro = $_POST['elaboro'];
    //echo count($reparacion);
    $r = '';
    $h = '';
    $p = '';
    $m = '';

    $f =  Date('Y-m-d');

    for ($i=0; $i < count($reparacion); $i++) { 
        $r .= $reparacion[$i].'/';
        $h .= strval($hojalateria[$i]).'/';
        $p .= strval($pintura[$i]).'/';
        $m .= strval($mecanica[$i]).'/';
    }

    $rr = $objeto->insert_orden($id, $f, $r, $h, $p, $m, $observaciones, $elaboro);
    
    if ($rr == 1) {
        echo 1;
    } else {
        echo 0;
    }
    
}
?>