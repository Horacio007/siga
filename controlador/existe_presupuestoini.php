<?php
    include("../modelo/class_presupuesto_dal.php");

    if (isset($_POST['id'])) {
        $id = $_POST["id"];
    
        $objeto = new presupuesto_dal();
        $resultado = $objeto->exist_presupuesto($id);

        if ($resultado == 1) {
            $btn = "<a href='/siga/controlador/presupuesto_inicialpdf.php?id=".$id."' class='ver btn btn-success btn-lg btn-block' target='_blank'>PDF</a>";
            echo $btn;
        }else {
            echo 1;
        }
    }
?>