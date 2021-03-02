<?php
    include("../modelo/class_orden_retrabajo_dal.php");
    
    if (isset($_POST['catalago_ordenes_retrabajo'])) {
        $objeto = new orden_retrabajo_dal();

        $r = $objeto->select_data();

        if ($r!=NULL) {
            foreach($r as $key => $value){
                $salida ="<tr>
                <td>".$value->getIdVehiculo()."</td>
                <td>".$value->getFecha()."</td>
                <td>".$value->getObservaciones()."</td>
                <td>".$value->getElaboro()."</td>
                <td> <a href='/siga/controlador/orden_retrabajopdf.php?id=".$value->getId()."' class='ver btn btn-danger btn-sm' target='_blank'>PDF</a></td>
                </tr>";
                echo $salida;
            }
        } else {
            echo 'No se encontraron ordenes de trabajo rergistradas';
        }
        
    } 
    
?>