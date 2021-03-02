<?php

    include("../modelo/class_vehiculo_dal.php");

    if (isset($_POST['id'])) {
        $objeto = new vehiculo_dal();
        $id = $_POST['id'];

        $e = $objeto->exist_vehiculoE($id);

        if ($e == 1) {
            $r = $objeto->select_VinfoF($id);

            foreach ($r as $key => $value) {
                $marca = $value->getMarca();
                $linea = $value->getLinea();
                $color = $value->getColor();
                $modelo = $value->getModelo();
                $placas = $value->getPlacas();
                $cliente = $value->getCliente();
            }

            $datos = array(
                'result' => 1,
                'marca' => $marca,
                'linea' => $linea,
                'color' => $color,
                'modelo' => $modelo,
                'placas' => $placas,
                'cliente' => $cliente
            );

            echo json_encode($datos);
        } else {
           $datos = array(
               'error' => 'Vehiculo aun no Entregado'
           );

           echo json_encode($datos);
        }
        
        
    }

?>