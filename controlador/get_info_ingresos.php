<?php

    include("../modelo/class_ingresos_dal.php");

    if (isset($_POST['id'])) {
       
        $objeto = new ingresos_dal();
        
        $id = $_POST['id'];

        $e = $objeto->exist_uingresoByid($id);
        
        if ($e == 1) {

            $info = $objeto->select_dataById($id);

            foreach ($info as $key => $value) {
                $id = $value->getId();
                $expediente = $value->getExpediente();
                $marca = $value->getMarca();
                $linea = $value->getLinea();
                $color = $value->getColor();
                $modelo = $value->getModelo();
                $placas = $value->getPlacas();
                $cliente = $value->getCliente();
                $tipo_servicio = $value->getTipo_servicio();
                $f_anticipo = $value->getFecha_anticipo();
                $anticipo = $value->getAnticipo();
                $tipo_pago_anticipo = $value->getTipo_pago_anticipo();
                $f_finiquito = $value->getFecha_finiquito();
                $finiquito = $value->getFiniquito();
                $tipo_pago_finiquito = $value->getTipo_pago_finiquito();
                $total = $value->getTotal();
            }


            $datos = array(
                'result' => 1,
                'id' => $id,
                'fecha' => $expediente,
                'marca' => $marca,
                'linea' => $linea,
                'color' => $color,
                'modelo' => $modelo,
                'placas' => $placas,
                'cliente' => $cliente,
                'tipo_servicio' => $tipo_servicio,
                'f_anticipo' => $f_anticipo,
                'anticipo' => $anticipo,
                'tipo_pago_anticipo' => $tipo_pago_anticipo,
                'f_finiquito' => $f_finiquito,
                'finiquito' => $finiquito,
                'tipo_pago_finiquito' => $tipo_pago_finiquito,
                'total' => $total
            ); 

            echo json_encode($datos);

        } else {
            $datos = array(
                'error' => 'Ingreso no Registrado'
            );

            echo json_encode($datos);
        }

    }

?>