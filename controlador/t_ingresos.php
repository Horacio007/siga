<?php
    include("../modelo/class_ingresos_dal.php");
    
    if (isset($_POST['catalago_ingresos'])) {
        $objeto = new ingresos_dal();

        $r = $objeto->select_data();

        if ($r!=NULL) {
            foreach($r as $key => $value){

                switch ($value->getTipo_servicio()) {
                    case 1:
                        $tipo_servicio = 'Estetica';
                        break;

                    case 2:
                        $tipo_servicio = 'Hojalateria/Pintura';
                        break;

                    case 3:
                        $tipo_servicio = 'Mecanica';
                        break;

                    case 4:
                        $tipo_servicio = 'Pendiente';
                        break;

                    case 5:
                        $tipo_servicio = 'Otros';
                        break;

                    default:
                    $tipo_servicio = 'No hay servicio registrado';
                        break;
                }

                switch ($value->getTipo_pago_anticipo()) {
                    case 1:
                        $tipo_pant = 'Cheque';
                        break;

                    case 2:
                        $tipo_pant = 'Efectivo';
                        break;

                    case 3:
                        $tipo_pant = 'Transferencia';
                        break;

                    default:
                        $tipo_pant = 'No hay tipo de pago registrado';
                        break;
                }

                switch ($value->getTipo_pago_finiquito()) {
                    case 1:
                        $tipo_pfin= 'Cheque';
                        break;

                    case 2:
                        $tipo_pfin = 'Efectivo';
                        break;

                    case 3:
                        $tipo_pfin = 'Transferencia';
                        break;

                    default:
                        $tipo_pfin = 'No hay tipo de pago registrado';
                        break;
                }
                

                $salida ="<tr>
                <td>".$value->getId()."</td>
                <td>".$value->getExpediente()."</td>
                <td>".$value->getMarca()."</td>
                <td>".$value->getLinea()."</td>
                <td>".$value->getColor()."</td>
                <td>".$value->getModelo()."</td>
                <td>".$value->getPlacas()."</td>
                <td>".$value->getCliente()."</td>
                <td>".$tipo_servicio."</td>
                <td>".$value->getFecha_anticipo()."</td>
                <td>".$value->getAnticipo()."</td>
                <td>".$tipo_pant."</td>
                <td>".$value->getFecha_finiquito()."</td>
                <td>".$value->getFiniquito()."</td>
                <td>".$tipo_pfin."</td>
                <td>".$value->getTotal()."</td>
                </tr>";
                echo $salida;
            }
        } else {
            echo 'No se encontraron facturas rergistradas';
        }
        
    } 
    
?>