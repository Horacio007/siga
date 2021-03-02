<?php
    
    include("../modelo/class_auto_linea_dal.php");

    if (isset($_POST['marca']) && isset($_POST['linea'])) {

        $autoslinea = new auto_linea_dal();
        $marca = $_POST['marca'];
        $linea = $_POST['linea'];
        $r = $autoslinea->insertLinea($marca, $linea);

        if ($r == 1) {
            echo '1';
        } else {
            echo 'Linea no agregada';
        }
        

    }

?>