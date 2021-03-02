<?php
    include("../modelo/class_vehiculo_dal.php");
    
    if (isset($_POST['catalago_refacciones'])) {
        $objeto = new vehiculo_dal();

        $r = $objeto->select_refacciones();

        if ($r!=NULL) {
            foreach($r as $key => $value){

                $salida ="<tr>
                <td>".$value->getId()."</td>
                <td>".$value->getEstatus()."</td>
                <td>".$value->getMarca()."</td>
                <td>".$value->getLinea()."</td>
                <td>".$value->getColor()."</td>
                <td>".$value->getModelo()."</td>
                <td>".$value->getCliente()."</td>
                <td>".$value->getRefacciones()."</td>
                <td>".$value->getProveedor_1()."</td>
                <td>".$value->getRefaccionaria_1()."</td>
                <td>".$value->getFechaPromesa_1()."</td>
                <td>".$value->getProveedor_2()."</td>
                <td>".$value->getRefaccionaria_2()."</td>
                <td>".$value->getFechaPromesa_2()."</td>
                <td>".$value->getProveedor_3()."</td>
                <td>".$value->getRefaccionaria_3()."</td>
                <td>".$value->getFechaPromesa_3()."</td>
                </tr>";
                echo $salida;
            }
        } else {
            echo 'No se encontraron refacciones rergistradas';
        }
        
    } 

?>