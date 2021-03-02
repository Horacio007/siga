<?php

    include("../modelo/class_isc_dal.php");

    if (isset($_POST['id']) and isset($_POST['n_cliente']) and isset($_POST['id_c']) and isset($_POST['atendio']) and isset($_POST['fecha']) and isset($_POST['p1']) and isset($_POST['p2']) and isset($_POST['p3']) and isset($_POST['p4']) and isset($_POST['p5']) and isset($_POST['p6']) and isset($_POST['p7']) and isset($_POST['total'])) {
        
        $objeto = new isc_dal();

        $id = $_POST['id'];
        $n_cliente = $_POST['n_cliente'];
        $id_C = $_POST['id_c'];
        $atendio = $_POST['atendio'];
        $fecha = $_POST['fecha'];
        $p1 = $_POST['p1'];
        $p2 = $_POST['p2'];
        $p3 = $_POST['p3'];
        $p4 = $_POST['p4'];
        $p5 = $_POST['p5'];
        $p6 = $_POST['p6'];
        $p7 = $_POST['p7'];
        $total = $_POST['total'];

        $ent = $objeto->exist_Ventregado($id);

        foreach ($ent as $key => $value) {
            $entregado = $value->get_atendio();
        }

        if ($entregado == 'Entregado') {
            $e = $objeto->exist_encuesta($id);

            if ($e == 1) {
                echo 'Ya existe una encuesta para este vehiculo';
            } else {
                $r = $objeto->insert_isc($id, $n_cliente, $atendio, $fecha, $p1, $p2, $p3, $p4, $p5, $p6, $p7, $total);

                if ($r == 1) {
                    echo 1;
                } else {
                    echo 'Encuesta no registrada';
                }
            }
        } else {
            echo 'Primero debes de cambiar el estatus del vehiculo a "Entregado"';
        }
        

        
    }

?>