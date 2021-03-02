<?php
    include("../modelo/class_vehiculo_dal.php");
    
    if (isset($_POST['catalago_valuaciones'])) {
        $objeto = new vehiculo_dal();

        $r = $objeto->select_valuaciones();

        if ($r!=NULL) {
            foreach($r as $key => $value){
                // resto los dias de llegada contra los de falta de autorizacion
                if ($value->getFechaAutorizacion() == "" || $value->getFechaAutorizacion() == " " || $value->getFechaAutorizacion() == NULL || $value->getFechaAutorizacion() == null) {

                    //$fecha_ll = new DateTime($value->getFechaLlegada());
                    $fecha_ll = date_create($value->getFechaLlegada());
                    $fecha_a = date_create(date("Y-m-d"));
                    //$now = new DateTime('now');
                    $dife = date_diff($fecha_ll, $fecha_a);
                    //$dife = json_encode($dife);
                    //$dife = json_decode($dife);
                    //$dife = $fecha_ll->diff($now)->format('%d');
                    $difee = $dife->{'days'};
                } else {
                    $difee = $value->getDiferenciaTresDias();
                }

                //le agrego lo del porcentaje de reparacion
                if ($value->getPorcentajeAprobacion() == 0.00) {
                    $porcetaje = 0.00;
                } else {
                    $porcetaje = round(($value->getCantidadFinal()*100)/$value->getCantidadInicial(), 2);
                }
                

                $salida ="<tr>
                <td>".$value->getId()."</td>
                <td>".$value->getEstatus()."</td>
                <td>".$value->getFechaLlegada()."</td>
                <td>".$value->getFechaLlegadaTaller()."</td>
                <td>".$value->getMarca()."</td>
                <td>".$value->getLinea()."</td>
                <td>".$value->getColor()."</td>
                <td>".$value->getModelo()."</td>
                <td>".$value->getCliente()."</td>
                <td>".$value->getFechaValuacion()."</td>
                <td>".$difee."</td>
                <td>".$value->getCantidadInicial()."</td>
                <td>".$value->getPiezasCambioInicial()."</td>
                <td>".$value->getPiezasReparacionInicial()."</td>
                <td>".$value->getFechaAutorizacion()."</td>
                <td>".$value->getCantidadFinal()."</td>
                <td>".$value->getPiezasCambioFinal()."</td>
                <td>".$value->getPiezasReparacionFinal()."</td>
                <td>".$value->getPiezasVendidas()."</td>
                <td>".$value->getImportePiezasVendidas()."</td>
                <td>".$porcetaje."</td>
                </tr>";
                echo $salida;
            }
        } else {
            echo 'No se encontraron valuaciones rergistradas';
        }
        
    } 
    
?>