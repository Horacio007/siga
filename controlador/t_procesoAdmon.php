<?php
    include("../modelo/class_vehiculo_dal.php");
    
    if (isset($_POST['catalago_proceso'])) {
        $objeto = new vehiculo_dal();

        $r = $objeto->select_ProcesoAdm();

        if ($r!=NULL) {
            foreach($r as $key => $value){
                //fecha de llegada simepre es oki
                $f_llegada = 0;
                //sguie el presupuesto no matyort a dos dias desde que llego saco la dif
                $f_llegadaTaller =  date_create($value->getFechaLlegada());
                $f_presupuestoIni = date_create($value->getFechaValuacion());
                //$dife = date_diff($f_presupuestoIni, $f_llegadaTaller);
                $diferencia_alta_presupuesto = date_diff($f_llegadaTaller, $f_presupuestoIni);
                $dife1 = $diferencia_alta_presupuesto->{'days'};
                //lo de arriba a funcionar siemppre y cuando no sean fechas en nulo
                if ($value->getFechaValuacion() == NULL || $value->getFechaValuacion() == '0000-00-00') {
                    $f_v = date_create(date("Y-m-d"));
                    $dife_valuacion = date_diff($f_llegadaTaller, $f_v);
                    $dife1 = $dife_valuacion->{'days'};
                }
                
                //saco la diferencia de dias en lo que se tardo en autorizar la valuacion
                $f_autorizacion = date_create($value->getFechaAutorizacion());
                $difrencia_presupuesto_autorizacion = date_diff($f_presupuestoIni, $f_autorizacion);
                $dife2 = $difrencia_presupuesto_autorizacion->{'days'};
                // si el primer lo de fecha de autorizacion es nulo o lo otro poner en automatico el numero 0
                if ($value->getFechaValuacion() == NULL || $value->getFechaValuacion() == '0000-00-00') {
                    $dife2 = 0;
                } else {
                    $f_va = date_create(date("Y-m-d"));
                    $dife_val_autorizada = date_diff($f_presupuestoIni, $f_va);
                    $dife2 = $dife_val_autorizada->{'days'};
                }
                //saco la diferencia de la valuacion y de los de los proveedores asigfandos
                $f_pasigandos = date_create($value->getPasignados());
                $diferencia_aprovada_pasignados = date_diff($f_autorizacion, $f_pasigandos);
                $dife3 = $diferencia_aprovada_pasignados->{'days'};
                //si la fecha de autorizacion es vacia o nula que sea 0 o se compare con el numero de dias reales
                if ($value->getFechaAutorizacion() == NULL || $value->getFechaAutorizacion() == '0000-00-00') {
                    $dife3 = 0;
                } else {
                    $f_pasi = date_create(date("Y-m-d"));
                    $dife_p_asig = date_diff($f_autorizacion, $f_pasi);
                    $dife3 = $diferencia_aprovada_pasignados->{'days'};
                }
                
                //saco la diferencia de las refaccinoes disponibles
                $f_rdisponibles = date_create($value->getRdisponibles());
                $diferencia_pasignados_rdisponibles = date_diff($f_pasigandos, $f_rdisponibles);
                $dife4 = $diferencia_pasignados_rdisponibles->{'days'};
                //si la fecha de de los p asiganods ya ssabes lo demas
                if ($value->getPasignados() == NULL || $value->getPasignados() == '0000-00-00') {
                    $dife4 = 0;
                } else {
                    $f_rdiso = date_create(date("Y-m-d"));
                    $dife_rdis = date_diff($f_pasigandos, $f_rdiso);
                    $dife4 = $dife_rdis->{'days'};
                }
                
                //aqui van los estatus de las valuaciones
                if ($value->getFechaValuacion() == NULL || $value->getFechaValuacion() == '0000-00-00') {
                    $estatusFechavaluacion = 'Pendiente';
                } else {
                    $estatusFechavaluacion = 'Autorizado';
                }
                //
                if ($value->getFechaAutorizacion() == NULL || $value->getFechaAutorizacion() == '0000-00-00') {
                    $estatusFechaautorizacion = 'Pendiente';
                } else {
                    $estatusFechaautorizacion = 'Autorizado';
                }
                //
                if ($value->getPasignados() == NULL || $value->getPasignados() == '0000-00-00') {
                    $estatusFechapasignados = 'Pendiente';
                } else {
                    $estatusFechapasignados = 'Autorizado';
                }
                //
                if ($value->getRdisponibles() == NULL || $value->getRdisponibles() == '0000-00-00') {
                    $estatusFechardisponibles = 'Pendiente';
                } else {
                    $estatusFechardisponibles = 'Autorizado';
                }


                $salida ="<tr>
                <td>".$value->getId()."</td>
                <td>".$value->getEstatus()."</td>
                <td>".$value->getMarca()."</td>
                <td>".$value->getLinea()."</td>
                <td>".$value->getColor()."</td>
                <td>".$value->getModelo()."</td>
                <td>".$value->getCliente()."</td>
                <td>".$f_llegada."</td>
                <td>".$dife1."</td>
                <td>".$estatusFechavaluacion."</td>
                <td>".$dife2."</td>
                <td>".$estatusFechaautorizacion."</td>
                <td>".$dife3."</td>
                <td>".$estatusFechapasignados."</td>
                <td>".$dife4."</td>
                <td>".$estatusFechardisponibles."</td>
                </tr>";
                echo $salida;
                

                
            }
        } else {
            echo 'No se encontraron vehiculos rergistrados';
        }
        
    } 
    
?>