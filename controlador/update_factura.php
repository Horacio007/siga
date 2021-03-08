<?php

    include("../modelo/class_facturas_dal.php");
    include("../modelo/class_ingresos_dal.php");
    include("../modelo/class_vehiculo_dal.php");

    if (isset($_POST['id']) && isset($_POST['marca']) && isset($_POST['linea']) && isset($_POST['color']) && isset($_POST['modelo']) && isset($_POST['placas']) && isset($_POST['cliente']) && isset($_POST['cantidad']) && isset($_POST['fechaf']) && isset($_POST['estatusA']) && isset($_POST['fechabbva']) && isset($_POST['comentarios'])) {

        $objeto = new facturas_dal();
        $objeto1 =  new ingresos_dal();
        $objeto2 =  new vehiculo_dal();

        $id = $_POST['id'];
        $marca = $_POST['marca'];
        $linea = $_POST['linea'];
        $color = $_POST['color'];
        $modelo = $_POST['modelo'];
        $placas = $_POST['placas'];
        $cliente = $_POST['cliente'];
        $cantidad = $_POST['cantidad'];
        $fechaf = $_POST['fechaf'];
        $estatusA = $_POST['estatusA'];
        $fechabbva = $_POST['fechabbva'];
        $comentarios = $_POST['comentarios'];

        $r = $objeto->update_factura($id, $cantidad, $fechaf, $estatusA, $fechabbva, $comentarios);

        if ($r == 1) {

            if (strlen($fechabbva) == 10) {
                $infv = $objeto2->select_VinfoF($id);

                foreach ($infv as $key => $value) {
                    $marca = $value->getMarca();
                    $linea = $value->getLinea();
                    $color = $value->getColor();
                    $modelo = $value->getModelo();
                    $placas = $value->getPlacas();
                    $cliente = $value->getCliente();
                }

                $idve = $objeto->select_IdVe_byId($id);

                foreach ($idve as $key => $value) {
                    $id_vehiculo = $value->getIdVehiculo();
                }

                $tipo_servicio = 2;
                $f_finiquito = $fechabbva;
                $m_finiquito = $cantidad;
                $f_pago_finiquito = 3;
                $total = $cantidad;

                $insingresos = $objeto1->insert_ingresoByFactura($id_vehiculo, $marca, $linea, $color, $modelo, $placas, $cliente, $tipo_servicio, $f_finiquito, $m_finiquito, $f_pago_finiquito, $total);
                
                echo $insingresos;
            } else {
                echo 1;
            }
        } else {
            echo 0;
        }
        

    }

?>