<?php

    include("../modelo/class_facturas_dal.php");

    if (isset($_POST['id'])) {

        $objeto = new facturas_dal();
        $id = $_POST['id'];

        $e = $objeto->exist_factura($id);

        if ($e == 1) {

            $r = $objeto->select_Data_byId($id);

            foreach ($r as $key => $value) {
                $expediente = $value->getIdVehiculo();
                $marca = $value->getMarca();
                $linea = $value->getLinea();
                $color = $value->getColor();
                $modelo = $value->getModelo();
                $placas = $value->getPlacas();
                $cliente = $value->getCliente();
                $cantidad = $value->getCantidad();
                $fechaf = $value->getFechaF();
                $estatus = $value->getEstatus();
                $fechabbva = $value->getFechaBBVA();
                $comentarios = $value->getComentarios();
            }

            $datos = array(
                'result' => 1,
                'marca' => $marca,
                'linea' => $linea,
                'color' => $color,
                'modelo' => $modelo,
                'placas' => $placas,
                'cliente' => $cliente,
                'cantidad' => $cantidad,
                'fechaf' => $fechaf,
                'estatus' => $estatus,
                'fechabbva' => $fechabbva,
                'comentarios' => $comentarios
            );

            echo json_encode($datos);
        } else {
           $datos = array(
               'error' => 'Factura no Creada'
           );

           echo json_encode($datos);
        }
        
        
    }

?>