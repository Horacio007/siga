<?php
    include("../modelo/class_gastos_dal.php");
    
    if (isset($_POST['catalago_gastos'])) {
        $objeto = new gastos_dal();

        $r = $objeto->select_data();

        if ($r!=NULL) {
            foreach($r as $key => $value){

                switch ($value->getForma_pago()) {
                    case 1:
                        $f_pago = 'Debito';
                        break;

                    case 2:
                        $f_pago = 'Efectivo';
                        break;
                    case 3:
                        $f_pago = 'Transferencia';
                        break;
                        
                    case 4:
                        $f_pago = 'Transferencia Ramon';
                        break;

                    default:
                        $f_pago = 'No se uso una forma de pago';
                        break;
                }

                switch ($value->getFactura()) {
                    case 1:
                        $factura = 'Si';
                        break;
                    
                    case 2:
                        $factura = 'No';
                        break;

                    default:
                        $factura = 'No se ocupo factura';
                        break;
                }

                switch ($value->getTipo()) {
                    case 1:
                        $tipo = 'Renta';
                        break;
                    
                    case 2:
                        $tipo = 'Impuestos';
                        break;

                    case 3:
                        $tipo = 'Nomina';
                        break;

                    case 4:
                        $tipo = 'Equipo';
                        break;

                    case 5:
                        $tipo = 'Materiales de Acabado';
                        break;

                    case 6:
                        $tipo = 'Refacciones';
                        break;

                    case 7:
                        $tipo = 'Servicios';
                        break;

                    case 8:
                        $tipo = 'Administracion';
                        break;

                    case 9:
                        $tipo = 'T.O.T';
                        break;

                    case 10:
                        $tipo = 'Papeleria';
                        break;

                    case 11:
                        $tipo = 'Herramienta';
                        break;

                    case 12:
                        $tipo = 'Miscelaneos';
                        break;

                    case 13:
                        $tipo = 'Limpieza';
                        break;

                    case 14:
                        $tipo = 'Materiales de Proceso';
                        break;

                    default:
                        $tipo = 'No se existe tipo';
                        break;
                }

                $salida ="<tr>
                <td>".$value->getFecha()."</td>
                <td>".$value->getArticulos()."</td>
                <td>".$value->getGastos()."</td>
                <td>".$f_pago."</td>
                <td>".$factura."</td>
                <td>".$tipo."</td>
                <td>".$value->getProveedor()."</td>
                <td>".$value->getExpediente()."</td>
                </tr>";
                echo $salida;
            }
        } else {
            echo 'No se encontraron gastos rergistrados';
        }
        
    } 
    
?>