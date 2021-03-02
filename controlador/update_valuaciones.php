<?php
    include("../modelo/class_vehiculo_dal.php");

    if (isset($_POST['id']) and isset($_POST['estatus']) and isset($_POST['fecha_envio']) and isset($_POST['fecha_llegada']) and isset($_POST['diferencia']) and isset($_POST['cantidad_ini']) and isset($_POST['piezas_cambio_ini']) and isset($_POST['piezas_repara_ini']) and isset($_POST['fecha_autorizacion']) and isset($_POST['cantidad_fini']) and isset($_POST['piezas_cambio_fin']) and isset($_POST['piezas_repara_fin']) and isset($_POST['piezas_vendidas']) and isset($_POST['importe_piezas_vend']) and isset($_POST['porcentaje_aprob'])) {
        
        //echo 'entra al update';
        $objeto = new vehiculo_dal();

        $id = $_POST['id'];
        //$fecha_llegada = $_POST['fecha_llegada'];
        $fecha_envio = $_POST['fecha_envio'];
        $fecha_llegada = $_POST['fecha_llegada'];
        $diferencia = $_POST['diferencia'];
        $cantidad_ini = $_POST['cantidad_ini'];
        $piezas_cambio_ini = $_POST['piezas_cambio_ini'];
        $piezas_repara_ini = $_POST['piezas_repara_ini'];
        $fecha_autorizacion = $_POST['fecha_autorizacion'];
        $cantidad_fini = $_POST['cantidad_fini'];
        $piezas_cambio_fin = $_POST['piezas_cambio_fin'];
        $piezas_repara_fin = $_POST['piezas_repara_fin'];
        $piezas_vendidas = $_POST['piezas_vendidas'];
        $importe_piezas_vend = $_POST['importe_piezas_vend'];
        $porcentaje_aprob = $_POST['porcentaje_aprob'];

        switch ($_POST['estatus']) {
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

        // si diferencia es igual a 0 significa que aun no esta autorizado y le tengo que actyualizar con la diferencia del dia de hoy al dia de llegada
        // primero actualizo para que los 3 dias se guaqrden y despues sin guardar los 3 dias y por ende el porcentaje se calcula
        if ($fecha_autorizacion != "" && $cantidad_fini !=0) {
            $porcentaje = round(($cantidad_fini * 100)/$cantidad_ini, 2);

            $r = $objeto->update_valconFA($id, $estatus, $fecha_envio, $fecha_llegada, $diferencia, $cantidad_ini, $piezas_cambio_ini, $piezas_repara_ini, $fecha_autorizacion, $cantidad_fini, $piezas_cambio_fin, $piezas_repara_fin, $piezas_vendidas, $importe_piezas_vend, $porcentaje);
            //echo $r;
            if ($r == 1) {
                echo 1;
            } else {
                echo 0;
            }
            
            //echo $r;
        } else {

            $rr = $objeto->update_valconFSA($id, $estatus, $fecha_envio, $fecha_llegada, $cantidad_ini, $piezas_cambio_ini, $piezas_repara_ini, $piezas_vendidas, $importe_piezas_vend);
            
            if ($rr == 1) {
                echo 1;
            } else {
                echo 0;
            }
        }

    }

?>