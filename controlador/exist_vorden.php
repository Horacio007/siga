<?php
    include("../modelo/class_vehiculo_dal.php");

    if (isset($_POST['id'])) {
        $id = $_POST["id"];
    
        $objeto = new vehiculo_dal();
        $resultado = $objeto->exist_vehiculo($id);

        if ($resultado == 1) {
            $r = $objeto->orden_trabajo($id);

            foreach ($r as $key => $value) {
                $marca = $value->getMarca();
                $linea = $value->getLinea();
                $color = $value->getColor();
                $modelo = $value->getModelo();
                $placas = $value->getPlacas();
                $cliente = $value->getCliente();
            }

            if ($cliente == 'GNP' || $cliente == 'Particular' || $cliente == 'HDI') {
                $asesor = "Raul Hernandez";
            }else {
                $asesor = 'Raul Hernandez';
            }


            $val = array(
                'resultado' => 1,
                'marca' => $marca,
                'linea' => $linea,
                'color' => $color,
                'modelo' => $modelo,
                'placas' => $placas,
                'cliente' => $cliente,
                'asesor' => $asesor
            );

            echo json_encode($val);
        }else {
            echo 0;
        }
    }
?>