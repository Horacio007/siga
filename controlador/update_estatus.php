<?php

    include("../modelo/class_estatus_dal.php");

    if (isset($_POST['id']) && isset($_POST['estatus']) && isset($_POST['fecha_sal'])) {
        
        $obj = new estatus_dal;
        $id = $_POST['id'];
        $estatus = $_POST['estatus'];
        $fecha = $_POST['fecha_sal'];

        switch ($estatus) {
            case 1:
                $estatus = 'Baja';
                break;
            
            case 2:
                $estatus = 'Cerrado';
                break;

            case 3:
                $estatus = 'Entregado';
                break;

            case 4:
                $estatus = 'Factura';
                break;

            case 5:
                $estatus = 'Taller';
                break;

            case 6:
                $estatus = 'Transito';
                break;
            
            default:
                echo 'estatus no econtrodo';
                break;
        }

        $r = $obj->updateEstatus($id, $estatus, $fecha);

        if ($r == 1) {
            echo 1;
        } else {
            echo 'Estatus no actualizado';
        }

        //echo $r;
    }

?>