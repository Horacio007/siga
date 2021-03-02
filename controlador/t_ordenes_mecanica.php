<?php
    include("../modelo/class_orden_mecanica_dal.php");
    
    if (isset($_POST['catalago_ordenes_mecanica'])) {
        $objeto = new orden_mecanica_dal();

        $r = $objeto->select_data();

        if ($r!=NULL) {
            foreach($r as $key => $value){
                $salida ="<tr>
                <td>".$value->getIdVehiculo()."</td>
                <td>".$value->getFecha()."</td>
                <td>".$value->getDiagnostico()."</td>
                <td>".$value->getElaboro()."</td>
                <td> <a href='/siga/controlador/orden_mecanicapdf.php?id=".$value->getId()."' class='ver btn btn-danger btn-sm' target='_blank'>PDF</a></td>
                </tr>";
                echo $salida;
            }
        } else {
            echo 'No se encontraron ordenes de trabajo rergistradas';
        }
        
    } 
    
?>