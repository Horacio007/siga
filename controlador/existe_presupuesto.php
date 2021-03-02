<?php
    include("../modelo/class_presupuesto_dal.php");

    if (isset($_POST['id'])) {
        $id = $_POST["id"];
    
        $objeto = new presupuesto_dal();
        $resultado = $objeto->exist_presupuesto($id);

        if ($resultado == 1) {
            echo 1;
        } else {
            echo 'Primero debes de crear el Presupuesto';
        }
        
    }

?>