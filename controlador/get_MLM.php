<?php

    include("../modelo/class_vehiculo_dal.php");
    include("../modelo/class_auto_dal.php");
    include("../modelo/class_auto_linea_dal.php");

    if (isset($_POST['id'])) {
        $objeto = new vehiculo_dal();
        $objeto3 = new autos_dal();
        $objeto4 = new auto_linea_dal();
        $id = $_POST['id'];

        $nn = $objeto->select_MLM($id);

        foreach ($nn as $key => $value) {
            $marca = $value->getMarca();
            $linea = $value->getLinea();
            $modelo = $value->getModelo();
        }

        $datos = array(
            'marca' => $marca,
            'linea' => $linea,
            'modelo' => $modelo
        );

        echo json_encode($datos);
        
    }

?>