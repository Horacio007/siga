<?php

    include("../modelo/class_gastos_dal.php");

    if (isset($_POST['id'])) {
       
        $objeto = new gastos_dal();
        
        $id = $_POST['id'];

        $e = $objeto->existe_gastobyId($id);
        
        if ($e == 1) {

            $info = $objeto->select_databyId($id);

            foreach ($info as $key => $value) {
                $id = $value->getId();
                $fecha = $value->getFecha();
                $articulos = $value->getArticulos();
                $gastos = $value->getGastos();
                $forma_pago = $value->getForma_pago();
                $factura = $value->getFactura();
                $tipo = $value->getTipo();
                $proveedor = $value->getProveedor();
                $expediente = $value->getExpediente();
            }


            $datos = array(
                'result' => 1,
                'id' => $id,
                'fecha' => $fecha,
                'articulos' => $articulos,
                'gastos' => $gastos,
                'forma_pago' => $forma_pago,
                'factura' => $factura,
                'tipo' => $tipo,
                'proveedor' => $proveedor,
                'expediente' => $expediente
            ); 

            echo json_encode($datos);

        } else {
            $datos = array(
                'error' => 'Gasto no Registrado'
            );

            echo json_encode($datos);
        }

    }

?>