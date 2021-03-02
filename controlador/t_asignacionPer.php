<?php
    include("../modelo/class_vehiculo_dal.php");
    
    if (isset($_POST['catalago_tallertransito'])) {
        $objeto = new vehiculo_dal();

        $r = $objeto->select_EstatusVehiEntrega();

        if ($r!=NULL) {
            foreach($r as $key => $value){

                if ($value->getAplica_Lavado() == 1) {
                    $personal = 'Asignado';
                } else {
                    $personal = 'No Asignado';
                }
                

                $salida ="<tr>
                <td>".$value->getId()."</td>
                <td>".$value->getEstatus()."</td>
                <td>".$value->getFechaLlegadaTaller()."</td>
                <td>".$value->getMarca()."</td>
                <td>".$value->getLinea()."</td>
                <td>".$value->getColor()."</td>
                <td>".$value->getModelo()."</td>
                <td>".$value->getPlacas()."</td>
                <td>".$value->getCliente()."</td>
                <td>".$personal."</td>
                </tr>";
                echo $salida;
            }
        } else {
            echo 'No se encontraron vehiculos rergistrados';
        }
        
    } 
    
?>