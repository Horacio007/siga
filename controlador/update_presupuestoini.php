<?php
    include("../modelo/class_vehiculo_dal.php");
    include("../modelo/class_presupuesto_dal.php");

    if (isset($_POST['expediente']) && isset($_POST['operacion']) && isset($_POST['nivel']) && isset($_POST['concepto']) && isset($_POST['momh']) && isset($_POST['momp']) && isset($_POST['momm']) && isset($_POST['tot']) && isset($_POST['refacciones']) && isset($_POST['tmomh']) && isset($_POST['tmomp']) && isset($_POST['tmomm']) && isset($_POST['ttot']) && isset($_POST['trefacciones']) && isset($_POST['subtotal']) && isset($_POST['iva']) && isset($_POST['total'])) {
        $objeto = new vehiculo_dal();
        $objeto2 = new presupuesto_dal();
        $expediente = $_POST['expediente'];

        $resultado = $objeto->exist_vehiculo($expediente);

        if ($resultado == 1) {
            $operacion = $_POST['operacion'];
            $nivel = $_POST['nivel'];
            $concepto = $_POST['concepto'];
            $momh = $_POST['momh'];
            $momp = $_POST['momp'];
            $momm = $_POST['momm'];
            $tot = $_POST['tot'];
            $refacciones = $_POST['refacciones'];
            $tmomh = $_POST['tmomh'];
            $tmomp = $_POST['tmomp'];
            $tmomm = $_POST['tmomm'];
            $ttot = $_POST['ttot'];
            $trefacciones = $_POST['trefacciones'];
            $subtotal = $_POST['subtotal'];
            $iva = $_POST['iva'];
            $total = $_POST['total'];

            $res = $objeto2->update_presupuesto($expediente, $operacion, $nivel, $concepto, $momh, $momp, $momm, $tot, $refacciones, $tmomh, $tmomp, $tmomm, $ttot, $trefacciones, $subtotal, $iva, $total);
            if ($res == 1) {
                echo 1;
            } else {
                echo 'Presupuesto no actualizado';
            }
        
            
        } else {
            echo 'No existe el vehiculo al cual se le quiere hacer el presupuesto';
        }
        
    }

?>