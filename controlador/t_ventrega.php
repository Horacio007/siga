<?php
    include("../modelo/class_vehiculo_dal.php");
    
    if (isset($_POST['catalago_ventregados'])) {
        $objeto = new vehiculo_dal();

        $r = $objeto->select_vdentregados();

        if ($r!=NULL) {
            foreach($r as $key => $value){

                $salida ="<tr>
                <td>".$value->getId()."</td>
                <td>".$value->getEstatus()."</td>
                <td>".$value->getMarca()."</td>
                <td>".$value->getLinea()."</td>
                <td>".$value->getColor()."</td>
                <td>".$value->getModelo()."</td>
                <td>".$value->getPlacas()."</td>
                <td>".$value->getCliente()."</td>
                </tr>";
                echo $salida;
            }
        } else {
            echo 'No se encontraron vehiculos rergistradas';
        }
        
    } 
    
?>