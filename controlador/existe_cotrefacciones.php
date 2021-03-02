<?php
    include("../modelo/class_refacciones_dal.php");

    if (isset($_POST['id'])) {
        $id = $_POST["id"];
    
        $objeto = new refacciones_dal();
        $resultado = $objeto->exist_cotrefaccion($id);

        if ($resultado == 1) {
            $btn = "<a href='/siga/controlador/cotrefaccionespdf.php?id=".$id."' class='ver btn btn-success btn-lg btn-block' target='_blank'>PDF</a>";
            echo $btn;
        }else {
            echo 1;
        }
    }



?>