<?php
    include("../modelo/class_orden_trabajo_dal.php");
    
    if (isset($_POST['catalago_ordenes_trabajo'])) {
        $objeto = new orden_trabajo_dal();

        $r = $objeto->select_data();

        if ($r!=NULL) {
            foreach($r as $key => $value){
                $salida ="<tr>
                <td>".$value->getIdVehiculo()."</td>
                <td>".$value->getFecha()."</td>
                <td>".$value->getReparacion()."</td>
                <td>".$value->getHojalateria()."</td>
                <td>".$value->getPintura()."</td>
                <td>".$value->getMecanica()."</td>
                <td>".$value->getObservaciones()."</td>
                <td>".$value->getElavoro()."</td>
                <td> <a href='/siga/controlador/orden_trabajopdf.php?id=".$value->getId()."' class='ver btn btn-danger btn-sm' target='_blank'>PDF</a></td>
                </tr>";
                echo $salida;
            }
        } else {
            echo 'No se encontraron ordenes de trabajo rergistradas';
        }
        
    } 
    
?>