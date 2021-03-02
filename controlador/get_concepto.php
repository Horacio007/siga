<?php

    include("../modelo/class_presupuesto_dal.php");
    
    if (isset($_POST['id'])) {
        //$p = array('Saludo' => 'entra a buscar la operacion y el concepto', );
        $id = $_POST['id'];
        $objeto = new presupuesto_dal();
        $exs = $objeto->exist_presupuesto($id);
            
        if ($exs == 1) {
            $resultado = $objeto->getOpCon($id);

            foreach ($resultado as $key => $value) {
                $op = $value->getOp();
                $concepto = $value->getConcepto();
            }

            $op = explode('/', $op);
            $concepto = explode('/', $concepto);

            $r = array();

            for ($i=0; $i < count($op); $i++) { 
                if ($op[$i] == 'c' || $op[$i] == 'C' || $op[$i] == ' C' || $op[$i] == ' c') {
                    array_push($r, $concepto[$i]);
                }
            }

            echo json_encode($r);
        } else {
            echo 'Primero debes crear el Presupuesto Inicial';
        }
        
        
    }

?>