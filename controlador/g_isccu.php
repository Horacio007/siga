<?php
    
    include("../modelo/class_isc_dal.php");

    if (isset($_POST['catalago_isccu'])) {
        
        $objeto = new isc_dal();

        $r = $objeto->select_ISCCU();

        if ($r != NULL) {
            $x = array();
            $y = array();
            foreach ($r as $key => $value) {
                array_push($x, $value->get_p3().' '.$value->get_p1().' '.$value->get_p4());
                array_push($y, $value->get_p2());
            }

            $datos = array(
                'linea' => $x,
                'total' => $y,
                'semana' => date('W')-1
            );

            echo json_encode($datos);

        } else {
            echo 'No existen encuestas';
        }
        
    }

?>