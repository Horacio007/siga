<?php
    
    include("../modelo/class_isc_dal.php");

    if (isset($_POST['catalago_isccutotal'])) {
        
        $objeto = new isc_dal();

        $r = $objeto->select_ISCCUTOTAL_Actual();
        $rr = $objeto->select_ISCCUTOTAL_Actual_1();
        $rrr = $objeto->select_ISCCUTOTAL_Actual_2();
        $rrrr = $objeto->select_ISCCUTOTAL_Actual_3();

        if ($r != NULL) {
            $y = array();
            $yy = array();
            $yyy = array();
            $yyyy = array();

            foreach ($r as $key => $value) {
                //$linea = $value->get_p1();
                array_push($y, $value->get_p2());
            }

            foreach ($rr as $key => $value) {
                //$linea = $value->get_p1();
                array_push($yy, $value->get_p2());
            }

            foreach ($rrr as $key => $value) {
                //$linea = $value->get_p1();
                array_push($yyy, $value->get_p2());
            }

            foreach ($rrrr as $key => $value) {
                //$linea = $value->get_p1();
                array_push($yyyy, $value->get_p2());
            }

            $datos = array(
                'semanaA' => array('totalA' => $y, 'semanaA' => date("W")-1+1),
                'semana-1' => array('total-1' => $yy, 'semana-1' => date("W")-1),
                'semana-2' => array('total-2' => $yyy, 'semana-2' => date("W")-2),
                'semana-3' => array('total-3' => $yyyy, 'semana-3' => date("W")-3)
            );

            echo json_encode($datos);

        } else {
            echo 'No existen encuestas';
        }
        
    }

?>