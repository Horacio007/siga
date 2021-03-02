<?php
    include("../modelo/class_almacen_dal.php");

    if (isset($_POST['idd']) and isset($_POST['ubicacion']) and isset($_POST['fecha_entrega']) and isset($_POST['status']) and isset($_POST['comentarios'])) {
        //echo 'entra al update';
        $objeto = new almacen_dal();

        $idd = $_POST['idd'];
        $ubicacion = $_POST['ubicacion'];
        $fecha_entrega = $_POST['fecha_entrega'];
        $comentarios = $_POST['comentarios'];

        switch ($_POST['status']) {
            case 1:
                $estatus = 'Asignado';
                break;
            
            case 2:
                $estatus = 'Disponible';
                break;

            case 3:
                $estatus = 'Entregado';
                break;

            case 4:
                $estatus = 'Devolución';
                break;

            default:
                echo 'estatus no encontrado';
                break;
        }

        $r = $objeto->update_pieza($idd, $ubicacion, $fecha_entrega, $estatus, $comentarios);
        //echo $r;
        
        if ($r == 1) {
            echo 1;
        } else {
            echo 'Refaccion no Actualizada';
        }
        

    }

?>