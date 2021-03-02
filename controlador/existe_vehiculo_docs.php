<?php
    include("../modelo/class_vehiculo_dal.php");

    if (isset($_POST['id'])) {
        $id = $_POST["id"];
    
        $objeto = new vehiculo_dal();
        $resultado = $objeto->exist_vehiculo($id);

        if ($resultado == 1) {
            $btn = "<a href='/siga/controlador/documentacion_entrega.php?id=".$id."' class='ver btn btn-success btn-lg btn-block' target='_blank'>PDF</a>";
            echo $btn;
        }else {
            echo 1;
        }
    }
?>