<?php
    include("../modelo/class_almacen_dal.php");
    include("../modelo/class_vehiculo_dal.php");

    if (isset($_POST['id'])) {
        $objeto = new vehiculo_dal();
        $objeto2 = new almacen_dal();

        $id = $_POST['id'];

        $e = $objeto->exist_vehiculo($id);

        if ($e == 1) {
            echo 'existe';
        } else {
            echo 0;
        }
        
    }
?>