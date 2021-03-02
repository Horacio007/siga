<?php
    include("../modelo/class_vehiculo_dal.php");
    
    if (isset($_POST['id'])) {

        $id = $_POST['id'];
        //echo 'entro';

        $objeto = new vehiculo_dal();
        $asd = $objeto->exist_vehiculo($id);

        if ($asd == 1) {
            $r = $objeto->select_valuacionesbyId($id);
            $ar = array();
            
            foreach($r as $key => $value){
                // resto los dias de llegada contra los de falta de autorizacion
                if ($value->getFechaAutorizacion() == "" || $value->getFechaAutorizacion() == " " || $value->getFechaAutorizacion() == NULL || $value->getFechaAutorizacion() == null) {

                    //$fecha_ll = new DateTime($value->getFechaLlegada());
                    $fecha_ll = date_create($value->getFechaLlegada());
                    $fecha_a = date_create(date("Y-m-d"));
                    //$now = new DateTime('now');
                    $dife = date_diff($fecha_ll, $fecha_a);
                    //$dife = json_encode($dife);
                    //$dife = json_decode($dife);
                    //$dife = $fecha_ll->diff($now)->format('%d');
                    $difee = $dife->{'days'};
                } else {
                    $difee = $value->getDiferenciaTresDias();
                }

                //le agrego lo del porcentaje de reparacion
                if ($value->getPorcentajeAprobacion() == 0.00) {
                    $porcetaje = 0.00;
                } else {
                    $porcetaje = round(($value->getCantidadFinal()*100)/$value->getCantidadInicial(), 2);
                }
                
                $estatus = $value->getEstatus();
                $fecha_llegada = $value->getFechaLlegada();
                $fecha_llegada_taller = $value->getFechaLlegadaTaller();
                $fecha_valuacion = $value->getFechaValuacion();
                $diferencia = $difee;
                $cantidad_inicial = $value->getCantidadInicial();
                $piezas_cambio_inicial = $value->getPiezasCambioInicial();
                $piezas_reparacion_inicial = $value->getPiezasReparacionInicial();
                $fecha_autorizacion = $value->getFechaAutorizacion();
                $cantidad_final = $value->getCantidadFinal();
                $piezas_cambio_final = $value->getPiezasCambioFinal();
                $piezas_reparacion_final = $value->getPiezasReparacionFinal();
                $piezas_vendidas = $value->getPiezasVendidas();
                $importe_piezas_vendidas = $value->getImportePiezasVendidas();
                $porcentajep = $porcetaje;
            }

            $val = array(
                'result' => 1,
                'id' => $id,
                'estatus' => $estatus,
                'fecha_llegada' => $fecha_llegada,
                'fecha_llegada_taller' => $fecha_llegada_taller,
                'fecha_valuacion' => $fecha_valuacion,
                'diferencia' => $diferencia,
                'cantidad_inicial' => $cantidad_inicial,
                'piezas_cambio_inicial' => $piezas_cambio_inicial,
                'piezas_reparacion_inicial' => $piezas_reparacion_inicial,
                'fecha_autorizacion' => $fecha_autorizacion,
                'cantidad_final' => $cantidad_final,
                'piezas_cambio_final' => $piezas_cambio_final,
                'piezas_reparacion_final' => $piezas_reparacion_final,
                'piezas_vendidas' => $piezas_vendidas,
                'importe_piezas_vendidas' => $importe_piezas_vendidas,
                'porcentaje' => $porcentajep
            );
            
            echo json_encode($val);
        } else {
            echo 0;
        }
    } 
    
?>