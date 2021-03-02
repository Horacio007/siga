<?php
    include("../modelo/class_almacen_dal.php");
    
    if (isset($_POST['catalago_refacciones'])) {
        $objeto = new almacen_dal();

        $r = $objeto->select_data();

        if ($r!=NULL) {
            foreach($r as $key => $value){
                $salida ="<tr>
                <td>".$value->getFecha_llegada()."</td>
                <td>".$value->getAseguradora()."</td>
                <td>".$value->getDescripcion()."</td>
                <td>".$value->getMarca()."</td>
                <td>".$value->getLinea()."</td>
                <td>".$value->getModelo()."</td>
                <td>".$value->getExpediente()."</td>
                <td>".$value->getUbicacion()."</td>
                <td>".$value->getFecha_entrega()."</td>
                <td>".$value->getEstatus()."</td>
                <td>".$value->getComentarios()."</td>
                </tr>";
                echo $salida;
            }
        } else {
            echo 'No se encontraron refacciones rergistradas';
        }
        
    } 
    
?>