<?php
    include("../modelo/class_vehiculo_dal.php");

    $obj = new vehiculo_dal();
    $exp = $_POST['expediente'];
    $estatus = $_POST['estatus'];
?>