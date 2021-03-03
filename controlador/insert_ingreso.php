<?php

    include("../modelo/class_ingresos_dal.php");

    if (isset($_POST['id']) && isset($_POST['marca']) && isset($_POST['linea']) && isset($_POST['color']) && isset($_POST['modelo']) && isset($_POST['placas']) && isset($_POST['cliente']) && isset($_POST['tipo_servicio']) && isset($_POST['f_anticipo']) && isset($_POST['m_anticipo']) && isset($_POST['f_pago_anticipo']) && isset($_POST['f_finiquito']) && isset($_POST['m_finiquito']) && isset($_POST['f_pago_finiquito']) && isset($_POST['total'])) {

        $objeto = new ingresos_dal();

        $id = $_POST['id'];
        $marca = $_POST['marca'];
        $linea = $_POST['linea'];
        $color = $_POST['color'];
        $modelo = $_POST['modelo'];
        $placas = $_POST['placas'];
        $cliente = $_POST['cliente'];
        $tipo_servicio = $_POST['tipo_servicio'];
        $f_anticipo = $_POST['f_anticipo'];
        $m_anticipo = $_POST['m_anticipo'];
        $f_pago_anticipo = $_POST['f_pago_anticipo'];
        $f_finiquito = $_POST['f_finiquito'];
        $m_finiquito = $_POST['m_finiquito'];
        $f_pago_finiquito = $_POST['f_pago_finiquito'];
        $total = $_POST['total'];

        $r = $objeto->insert_ingreso($id, $marca, $linea, $color, $modelo, $placas, $cliente, $tipo_servicio, $f_anticipo, $m_anticipo, $f_pago_anticipo, $f_finiquito, $m_finiquito, $f_pago_finiquito, $total);

        if ($r == 1) {
            echo 1;
        } else {
            echo 'Ingreso no Registrado';
        }
        /*
        $ex = $objeto->exist_ingresoInicial($id);

        if ($ex == 1) {
            echo 'Ya Existe un Ingreso para este Vehiculo';
        } else {
            $r = $objeto->insert_ingreso($id, $marca, $linea, $color, $modelo, $placas, $cliente, $tipo_servicio, $f_anticipo, $m_anticipo, $f_pago_anticipo, $f_finiquito, $m_finiquito, $f_pago_finiquito, $total);

            if ($r == 1) {
                echo 1;
            } else {
                echo 'Ingreso no Registrado';
            }
        }
        */
    }

?>