<?php
    include("../modelo/class_vehiculo_dal.php");

    if (isset($_POST['id'])) {

        $obj = new vehiculo_dal();
        $id = $_POST['id'];
        $r = $obj->asignado($id);

        foreach ($r as $key => $value) {
            $aplicaLavado = $value->getAplica_Lavado();
        }

        if ($aplicaLavado == 1) {
            //echo 'si tiene personal';
            $rr = $obj->procesobyId($id);

            foreach ($rr as $key => $value) {
                $aplica_hoja = $value->getAplica_Hojalateria();
                $fecha_hoja = $value->getFecha_Hojalateria();
                $asignado_hoja = $value->getAsignado_Hojalateria();
                $comentarios_hoja = $value->getComentarios_Hojalateria();//
                $aplica_prepa = $value->getAplica_Preparacion();
                $fecha_prepa = $value->getFecha_Preparacion();
                $asignado_prepa = $value->getAsignado_Preparacion();
                $comentarios_prepa = $value->getComentarios_Preparacion();//
                $aplica_pin = $value->getAplica_Pintura();
                $fecha_pin = $value->getFecha_Pintura();
                $asignado_pin = $value->getAsignado_Pintura();
                $comentarios_pin = $value->getComentarios_Pintura();//
                $aplica_arm = $value->getAplica_Armado();
                $fecha_arm = $value->getFecha_Armado();
                $asignado_arm = $value->getAsignado_Armado();
                $comentarios_arm = $value->getComentarios_Armado();//
                $aplica_det = $value->getAplica_Detallado();
                $fecha_det = $value->getFecha_Detallado();
                $asignado_det = $value->getAsignado_Detallado();
                $comentarios_det = $value->getComentarios_Detallado();//
                $aplica_meca = $value->getAplica_Mecanica();
                $fecha_meca = $value->getFecha_Mecanica();
                $asignado_meca = $value->getAsignado_Mecanica();
                $comentarios_meca = $value->getComentarios_Mecanica();//
                $aplica_lava = $value->getAplica_Lavado();
                $fecha_lava = $value->getFecha_Lavado();
                $asignado_lava = $value->getAsignado_Lavado();
                $comentarios_lava = $value->getComentarios_Lavado();//
                $fecha_entrega = $value->getFecha_Entrega_Interna();
                $entrega = $value->getEntrego();
                $recibio = $value->getRecibio();
            }

            $data = array(
                'result' => 1,
                'id' => $id);
            
            //hoja
            if ($aplica_hoja == 1) {
                $data['aplica_hoja'] = 'Si';
                $data['fecha_hoja'] = $fecha_hoja;
                $data['asignado_hoja'] = $asignado_hoja;
                $data['comentarios_hoja'] = $comentarios_hoja;
            } else {
                $data['aplica_hoja'] = 'No';
                $data['fecha_hoja'] = $fecha_hoja;
                $data['asignado_hoja'] = 'No Aplica';
                $data['comentarios_hoja'] = 'No Aplica';
            }

            //prep
            if ($aplica_prepa == 1) {
                $data['aplica_prepa'] = 'Si';
                $data['fecha_prepa'] = $fecha_prepa;
                $data['asignado_prepa'] = $asignado_prepa;
                $data['comentarios_prepa'] = $comentarios_prepa;
            } else {
                $data['aplica_prepa'] = 'No';
                $data['fecha_prepa'] = $fecha_prepa;
                $data['asignado_prepa'] = 'No Aplica';
                $data['comentarios_prepa'] = 'No Aplica';
            }

            //pin
            if ($aplica_pin == 1) {
                $data['aplica_pin'] = 'Si';
                $data['fecha_pin'] = $fecha_pin;
                $data['asignado_pin'] = $asignado_pin;
                $data['comentarios_pin'] = $comentarios_pin;
            } else {
                $data['aplica_pin'] = 'No';
                $data['fecha_pin'] = $fecha_pin;
                $data['asignado_pin'] = 'No Aplica';
                $data['comentarios_pin'] = 'No Aplica';
            }

            //arm
            if ($aplica_arm == 1) {
                $data['aplica_arm'] = 'Si';
                $data['fecha_arm'] = $fecha_arm;
                $data['asignado_arm'] = $asignado_arm;
                $data['comentarios_arm'] = $comentarios_arm;
            } else {
                $data['aplica_arm'] = 'No';
                $data['fecha_arm'] = $fecha_arm;
                $data['asignado_arm'] = 'No Aplica';
                $data['comentarios_arm'] = 'No Aplica';
            }

            //det
            if ($aplica_det == 1) {
                $data['aplica_det'] = 'Si';
                $data['fecha_det'] = $fecha_det;
                $data['asignado_det'] = $asignado_det;
                $data['comentarios_det'] = $comentarios_det;
            } else {
                $data['aplica_det'] = 'No';
                $data['fecha_det'] = $fecha_det;
                $data['asignado_det'] = 'No Aplica';
                $data['comentarios_det'] = 'No Aplica';
            }

            //meca
            if ($aplica_meca == 1) {
                $data['aplica_meca'] = 'Si';
                $data['fecha_meca'] = $fecha_meca;
                $data['asignado_meca'] = $asignado_meca;
                $data['comentarios_meca'] = $comentarios_meca;
            } else {
                $data['aplica_meca'] = 'No';
                $data['fecha_meca'] = $fecha_meca;
                $data['asignado_meca'] = 'No Aplica';
                $data['comentarios_meca'] = 'No Aplica';
            }

            //lava
            if ($aplica_lava == 1) {
                $data['aplica_lava'] = 'Si';
                $data['fecha_lava'] = $fecha_lava;
                $data['asignado_lava'] = $asignado_lava;
                $data['comentarios_lava'] = $comentarios_lava;
            } else {
                $data['aplica_lava'] = 'No';
                $data['fecha_lava'] = $fecha_lava;
                $data['asignado_lava'] = 'No Aplica';
                $data['comentarios_lava'] = 'No Aplica';
            }

            //entrega
            $data['fecha_entrega'] = $fecha_entrega;
            $data['entrego'] = $entrega;
            $data['recibio'] = $recibio;

            echo json_encode($data);

        } else {
           echo 0;
        }
    }

?>