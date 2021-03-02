<?php
    include("../modelo/class_vehiculo_dal.php");

if (isset($_POST['idd']) and isset($_POST['refacciones']) and isset($_POST['proveedor1']) and isset($_POST['refaccionaria1']) and isset($_POST['fp1'])and isset($_POST['proveedor2']) and isset($_POST['refaccionaria2']) and isset($_POST['fp2'])and isset($_POST['proveedor3']) and isset($_POST['refaccionaria3']) and isset($_POST['fp3'])) {
        
    //echo 'entra al update';
    $objeto = new vehiculo_dal();

    $id = $_POST['idd'];
    //$fecha_llegada = $_POST['fecha_llegada'];
    //$refacciones = $_POST['refacciones'];
    $proveedor1 = $_POST['proveedor1'];
    $refaccionaria1 = $_POST['refaccionaria1'];
    $fp1 = $_POST['fp1'];
    $proveedor2 = $_POST['proveedor2'];
    $refaccionaria2 = $_POST['refaccionaria2'];
    $fp2 = $_POST['fp2'];
    $proveedor3 = $_POST['proveedor3'];
    $refaccionaria3 = $_POST['refaccionaria3'];
    $fp3 = $_POST['fp3'];

    switch ($_POST['refacciones']) {
        case 1:
            $refacciones = 'Revision';
            break;
        case 2:
            $refacciones = 'Cotizacion';
            break;
        case 3:
            $refacciones = 'Proveedores Asignados';
            break;
        case 4:
            $refacciones = 'Refacciones Disponibles';
            break;
        case 5:
            $refacciones = 'Complemento';
            break;

        case 6:
            $refacciones = 'N/A';
            break;
        default:
            $refacciones = 'No existe estatus de las refacciones';
            break;
    }

    // si diferencia es igual a 0 significa que aun no esta autorizado y le tengo que actyualizar con la diferencia del dia de hoy al dia de llegada
    // primero actualizo para que los 3 dias se guaqrden y despues sin guardar los 3 dias y por ende el porcentaje se calcula
    
    $r = $objeto->update_refacciones($id, $refacciones, $proveedor1, $refaccionaria1, $fp1, $proveedor2, $refaccionaria2, $fp2, $proveedor3, $refaccionaria3, $fp3);
    
    $rr = $objeto->select_Pasignado($id);

    foreach ($rr as $key => $value) {
        $output = $value->getPasignados();
    }

    if ($output == NULL && $refacciones == 'Proveedores Asignados') {
        $fecha = Date('Y-m-d');
        $p_asignados = $objeto->update_Pasignados($id, $fecha);
    }

    $rrr = $objeto->select_Rdisponibles($id);

    foreach ($rrr as $key => $value) {
        $output2 = $value->getRdisponibles();
    }

    if ($output2 == NULL && $refacciones == 'Refacciones Disponibles') {
        $fecha2 = Date('Y-m-d');
        $r_disponibles = $objeto->update_Rdisponibles($id, $fecha2);
    }
    //echo $r;
    if ($r == 1) {
        echo 1;
    } else {
        echo 0;
    }
    

}

?>