<?php

    include("../modelo/class_gastos_dal.php");

    if (isset($_POST['tpgmes'])) {
        $objeto = new gastos_dal();
        //saco lo de la renta
        $renta = $objeto->get_renta();

        foreach($renta as $key => $value){
            $trenta = $value->getTipo();
            if ($value->getGastos() == NULL) {
                $grenta = 0;
            } else {
                $grenta = $value->getGastos();
            }
        }
        //saco lo de impuestos
        $impuesto = $objeto->get_impuestos();

        foreach($impuesto as $key => $value){
            $timpuesto = $value->getTipo();
            if ($value->getGastos() == NULL) {
                $gimpuesto = 0;
            } else {
                $gimpuesto = $value->getGastos();
            }
        }
        //saco lo de la nomina
        $nomina = $objeto->get_nomina();

        foreach($nomina as $key => $value){
            $tnomina = $value->getTipo();
            if ($value->getGastos() == NULL) {
                $gnomina = 0;
            } else {
                $gnomina = $value->getGastos();
            }
        }

        //saco el gasto de equipo
        $equipo = $objeto->get_equipo();

        foreach($equipo as $key => $value){
            $tequipo = $value->getTipo();
            if ($value->getGastos() == NULL) {
                $gequipo = 0;
            } else {
                $gequipo = $value->getGastos();
            }
        }
        
        //saco lo materiales de acabado
        $materiales_acabado = $objeto->get_matAcabado();

        foreach($materiales_acabado as $key => $value){
            $tmatacaba = $value->getTipo();
            if ($value->getGastos() == NULL) {
                $gmatacaba = 0;
            } else {
                $gmatacaba = $value->getGastos();
            }
        }

        //saco lo de Refacciones
        $refacciones = $objeto->get_refacciones();

        foreach($refacciones as $key => $value){
            $trefacciones = $value->getTipo();
            if ($value->getGastos() == NULL) {
                $grefacciones = 0;
            } else {
                $grefacciones = $value->getGastos();
            }
        }

        //saco lo de servicioes
        $servicios = $objeto->get_servicios();

        foreach($servicios as $key => $value){
            $tservicios = $value->getTipo();
            if ($value->getGastos() == NULL) {
                $gservicios = 0;
            } else {
                $gservicios = $value->getGastos();
            }
        }

        //saco lo de administracion
        $administracion = $objeto->get_administracion();

        foreach($administracion as $key => $value){
            $tadministracion = $value->getTipo();
            if ($value->getGastos() == NULL) {
                $gadministracion = 0;
            } else {
                $gadministracion = $value->getGastos();
            }
        }

        //saco lo de tot
        $tot = $objeto->get_tot();

        foreach($tot as $key => $value){
            $ttot = $value->getTipo();
            if ($value->getGastos() == NULL) {
                $gtot = 0;
            } else {
                $gtot = $value->getGastos();
            }
        }

        //saco lo de papeleria
        $papeleria = $objeto->get_papeleria();

        foreach($papeleria as $key => $value){
            $tpapeleria = $value->getTipo();
            if ($value->getGastos() == NULL) {
                $gpapeleria = 0;
            } else {
                $gpapeleria = $value->getGastos();
            }
        }

        //saco lo de herramienta
        $herramienta = $objeto->get_herramienta();

        foreach($herramienta as $key => $value){
            $therramienta = $value->getTipo();
            if ($value->getGastos() == NULL) {
                $gherramienta = 0;
            } else {
                $gherramienta = $value->getGastos();
            }
        }

        //saco lo de Miscelaneos
        $miscelaneos = $objeto->get_miscelaneos();

        foreach($miscelaneos as $key => $value){
            $tmiscelaneos = $value->getTipo();
            if ($value->getGastos() == NULL) {
                $gmiscelaneos = 0;
            } else {
                $gmiscelaneos = $value->getGastos();
            }
        }

        //saco lo de limpieza
        $limpieza = $objeto->get_limpieza();

        foreach($limpieza as $key => $value){
            $tlimpieza = $value->getTipo();
            if ($value->getGastos() == NULL) {
                $glimpieza = 0;
            } else {
                $glimpieza = $value->getGastos();
            }
        }

        //saco lo de Materiales de Proceso

        $materiales_proceso = $objeto->get_materiales_proceso();

        foreach($materiales_proceso as $key => $value){
            $tmateriales_proceso = $value->getTipo();
            if ($value->getGastos() == NULL) {
                $gmateriales_proceso = 0;
            } else {
                $gmateriales_proceso = $value->getGastos();
            }
        }
        /*
        $datos = array(
            'renta' => array('trenta' => 'Renta','grenta' => $grenta),
            'impuesto' => array('timpuesto' => 'Impuestos', 'gimpuesto' => $gimpuesto),
            'nomina' => array('tnomina' => 'Nomina', 'gnomina' => $gnomina),
            'equipo' => array('tequipo' => 'Equipo', 'gequipo' => $gequipo),
            'matacaba' => array('tmatacaba' => 'Materiales de Acabado', 'gmatacaba' => $gmatacaba),
            'refacciones' => array('trefacciones' => 'Refacciónes', 'grefacciones' => $grefacciones),
            'servicios' => array('tservicios' => 'Servicios', 'gservicios' => $gservicios),
            'administracion' => array('tadministracion' => 'Administración', 'gadministracion' => $gadministracion),
            'tot' => array('ttot' => 'T.O.T', 'gtot' => $gtot),
            'papeleria' => array('tpapeleria' => 'Papeleria', 'gpapeleria' => $gpapeleria),
            'herramienta' => array('therramienta' => 'Herramientas', 'gherramienta' => $gherramienta),
            'miscelaneos' => array('tmiscelaneos' => 'Miscelaneos', 'gmiscelaneos' => $gmiscelaneos),
            'limpieza' => array('tlimpieza' => 'Limpieza', 'glimpieza' => $glimpieza),
            'materiales_proceso' => array('tmateriales_proceso' => 'Materiales de Proceso', 'gmateriales_proceso' => $gmateriales_proceso)
        );
        */
        $datos = array(
            array('Renta' => 'Renta', 'cantidad' => $grenta),
            array('Impuestos' => 'Impuestos', 'cantidad' => $gimpuesto),
            array('Nomina' => 'Nomina', 'cantidad' => $gnomina),
            array('Equipo' => 'Equipo', 'cantidad' => $gequipo),
            array('Materiales de Acabado' => 'Materiales de Acabado', 'cantidad' => $gmatacaba),
            array('Refacciónes' => 'Refacciónes', 'cantidad' => $grefacciones),
            array('Servicios' => 'Servicios', 'cantidad' => $gservicios),
            array('Administración' => 'Administración', 'cantidad' => $gadministracion),
            array('T.O.T' => 'T.O.T', 'cantidad' => $gtot),
            array('Papeleria' => 'Papeleria', 'cantidad' => $gpapeleria),
            array('Herramientas' => 'Herramientas', 'cantidad' => $gherramienta),
            array('Miscelaneos' => 'Miscelaneos', 'cantidad' => $gmiscelaneos),
            array('Limpieza' => 'Limpieza', 'cantidad' => $glimpieza),
            array('Materiales' => 'Materiales de Proceso', 'cantidad' => $gmateriales_proceso)
        );

        foreach ($datos as $key => $row) {
            $aux[$key] = $row['cantidad'];
        }

        array_multisort($aux, SORT_DESC, $datos);

        echo json_encode($datos);
    }

?>