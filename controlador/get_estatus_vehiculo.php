<?php
    include("../modelo/class_vehiculo_dal.php");

    if (isset($_POST['id'])) {

        $obj = new vehiculo_dal();
        $id = $_POST['id'];
        $resultado = $obj->get_Estatus($id);

        foreach ($resultado as $key => $value) {
            $output = $value->getEstatus();
        }

        echo $output;
    }
?>