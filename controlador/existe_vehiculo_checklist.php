<?php
    include("../modelo/class_vehiculo_dal.php");

    if (isset($_POST['id'])) {
        $id = $_POST["id"];
    
        $objeto = new vehiculo_dal();
        $resultado = $objeto->exist_vehiculo($id);

        if ($resultado == 1) {
            echo $resultado;
        }else {
            echo 0;
        }
    }
?>