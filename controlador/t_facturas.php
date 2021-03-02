<?php
    include("../modelo/class_facturas_dal.php");
    
    if (isset($_POST['catalago_facturas'])) {
        $objeto = new facturas_dal();

        $r = $objeto->select_data();

        if ($r!=NULL) {
            foreach($r as $key => $value){

                switch ($value->getEstatus()) {
                    case 1:
                        $estatus = 'Facturado';
                        break;

                    case 2:
                        $estatus = 'Pagado';
                        break;

                    case 3:
                        $estatus = 'Pendiente';
                        break;
                    
                    default:
                        $estatus = 'No hay estatus';
                        break;
                }

                $salida ="<tr>
                <td>".$value->getId()."</td>
                <td>".$value->getIdVehiculo()."</td>
                <td>".$value->getMarca()."</td>
                <td>".$value->getLinea()."</td>
                <td>".$value->getColor()."</td>
                <td>".$value->getModelo()."</td>
                <td>".$value->getPlacas()."</td>
                <td>".$value->getCliente()."</td>
                <td>".$value->getCantidad()."</td>
                <td>".$value->getFechaF()."</td>
                <td>".$estatus."</td>
                <td>".$value->getFechaBBVA()."</td>
                <td>".$value->getComentarios()."</td>
                </tr>";
                echo $salida;
            }
        } else {
            echo 'No se encontraron facturas rergistradas';
        }
        
    } 
    
?>