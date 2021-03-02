<?php
    include("../modelo/class_vehiculo_dal.php");

    if (isset($_POST['id'])) {
        $id = $_POST["id"];
    
        $objeto = new vehiculo_dal();
        $resultado = $objeto->exist_vehiculo($id);

        if ($resultado == 1) {
            $btn = 1;
            echo 1;
        }else {
            echo 0;
        }
    }
?>