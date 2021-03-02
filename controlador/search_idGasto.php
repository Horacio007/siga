<?php
    include("../modelo/class_vehiculo_dal.php");

    if (isset($_POST['dataa'])) {
        echo 'si entra a datps';
        $objeto = new vehiculo_dal();
        $id = $_POST['data'];
        $r = $objeto->search_idGastos($id);

        echo $r;

        foreach ($r as $key => $value) {
            $output = $value->getId();
        }

        echo $output;
        /*
        $ev = $objeto->exist_vehiculo($output);
        echo $ev;
        if ($ev == 1) {
            echo 1;
        } else {
            echo 0;
        }
        */
    }
?>