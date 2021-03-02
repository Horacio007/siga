<?php
    include("../modelo/class_refacciones_dal.php");

    if (isset($_POST['id'])) {
        $id = $_POST["id"];
    
        $objeto = new refacciones_dal();
        $resultado = $objeto->exist_cotrefaccion($id);
        $r = $objeto->exist_expediente($id);
        //recordar quitar lo de la r cuando se carguen las cosas de lo de lexpeidente y la refacciones
        if ($resultado == 1 || $r == 1) {
           echo 1;
        }else {
            echo 0;
        }
    }



?>