<?php

    include("../modelo/class_vehiculo_dal.php");

    if (isset($_POST['id'])) {
        $objeto = new vehiculo_dal();
        $id = $_POST['id'];

        if ($id == 'N/A') {
            echo 'N/A';
        }

        if ($id != 'N/A') {
            $r = $objeto->search_idGastos($id);

            foreach ($r as $key => $value) {
                $output = $value->getId();
            }

            echo $output;
        }
        
    }

?>