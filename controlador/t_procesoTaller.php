<?php
    include("../modelo/class_vehiculo_dal.php");
    
    if (isset($_POST['catalago_proceso'])) {
        $objeto = new vehiculo_dal();

        $r = $objeto->select_ProcesoTaller();

        if ($r!=NULL) {
            foreach($r as $key => $value){

                if ($value->getAplica_Hojalateria() == 1) {
                    if ($value->getFecha_Hojalateria() == '0000-00-00') {
                        $aplihoja = 2;
                    } else {
                        $aplihoja = 1;
                    }
                } else {
                    $aplihoja = 0;
                }
                /* //aqui quite lo de prepara cion 
                if ($value->getAplica_Preparacion() == 1) {
                    if ($value->getFecha_Preparacion() == '0000-00-00') {
                        $apliprep = 2;
                    } else {
                        $apliprep = 1;
                    }
                } else {
                   $apliprep = 0;
                }
                */
                if ($value->getAplica_Pintura() == 1) {
                    if ($value->getFecha_Pintura() == '0000-00-00') {
                        $aplipint = 2;
                    } else {
                        $aplipint = 1;
                    }
                } else {
                   $aplipint = 0;
                }

                if ($value->getAplica_Armado() == 1) {
                    if ($value->getFecha_Armado() == '0000-00-00') {
                        $apliarma = 2;
                    } else {
                        $apliarma = 1;
                    }
                } else {
                   $apliarma = 0;
                }

                if ($value->getAplica_Detallado() == 1) {
                    if ($value->getFecha_Detallado() == '0000-00-00') {
                        $aplideta = 2;
                    } else {
                        $aplideta = 1;
                    }
                } else {
                   $aplideta = 0;
                }

                if ($value->getAplica_Mecanica() == 1) {
                    if ($value->getFecha_Mecanica() == '0000-00-00') {
                        $aplimeca = 2;
                    } else {
                        $aplimeca = 1;
                    }
                } else {
                   $aplimeca = 0;
                }

                if ($value->getAplica_Lavado() == 1) {
                    if ($value->getFecha_Lavado() == '0000-00-00') {
                        $aplilava = 2;
                    } else {
                        $aplilava = 1;
                    }
                } else {
                   $aplilava = 0;
                }
                
                $salida ="<tr>
                <td>".$value->getId()."</td>
                <td>".$value->getEstatus()."</td>
                <td>".$value->getMarca()."</td>
                <td>".$value->getLinea()."</td>
                <td>".$value->getColor()."</td>
                <td>".$value->getModelo()."</td>
                <td>".$value->getCliente()."</td>
                <td>".$value->getFecha_Entrega_Interna()."</td>
                <td>".$aplihoja."</td>
                <td>".$aplipint."</td>
                <td>".$apliarma."</td>
                <td>".$aplideta."</td>
                <td>".$aplimeca."</td>
                <td>".$aplilava."</td>
                </tr>";
                echo $salida;
                            
            }
        } else {
            echo 'No se encontraron vehiculos rergistrados';
        }
        
    } 
    
?>