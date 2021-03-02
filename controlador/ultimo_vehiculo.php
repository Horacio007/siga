<?php
    include("../modelo/class_vehiculo_dal.php");

    if(isset($_POST["nouexpediente"])){
        $objeto = new vehiculo_dal();
        $resultado = $objeto->ultimo_registro();

        foreach ($resultado as $key => $value) {
            $output = $value->getId();
        }

        echo $output;
    }
?>