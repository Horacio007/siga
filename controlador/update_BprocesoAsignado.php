<?php

    include("../modelo/class_vehiculo_dal.php");

    if (isset($_POST['id']) and isset($_POST['fecha_hojalateria']) and isset($_POST['comentarios_hojalateria']) and isset($_POST['fecha_pintura']) and isset($_POST['comentarios_pintura']) and isset($_POST['fecha_armado']) and isset($_POST['comentarios_armado'])  and isset($_POST['fecha_detallado']) and isset($_POST['comentarios_detallado']) and isset($_POST['fecha_mecanica']) and isset($_POST['comentarios_mecanica']) and isset($_POST['fecha_lavado']) and isset($_POST['comentarios_lavado']) and isset($_POST['fecha_entrega']) and isset($_POST['entrego']) and isset($_POST['recibio'])) {
       
       $objeto = new vehiculo_dal();
        //echo 'siestan';
       $id = $_POST['id'];
       $fecha_hojalateria = $_POST['fecha_hojalateria'];
       $comentarios_hojalateria = $_POST['comentarios_hojalateria'];
       //$fecha_preparacion = $_POST['fecha_preparacion'];
       //$comentarios_preparacion = $_POST['comentarios_preparacion'];
       $fecha_pintura = $_POST['fecha_pintura'];
       $comentarios_pintura = $_POST['comentarios_pintura'];
       $fecha_armado = $_POST['fecha_armado'];
       $comentarios_armado = $_POST['comentarios_armado'];
       $fecha_detallado = $_POST['fecha_detallado'];
       $comentarios_detallado = $_POST['comentarios_detallado'];
       $fecha_mecanica = $_POST['fecha_mecanica'];
       $comentarios_mecanica = $_POST['comentarios_mecanica'];
       $fecha_lavado = $_POST['fecha_lavado'];
       $comentarios_lavado = $_POST['comentarios_lavado'];
       $fecha_entrega = $_POST['fecha_entrega'];
       $entrego = $_POST['entrego'];
       $recibio = $_POST['recibio'];

        $r = $objeto->update_PersonalAsig($id, $fecha_hojalateria, $comentarios_hojalateria, $fecha_pintura, $comentarios_pintura, $fecha_armado, $comentarios_armado, $fecha_detallado, $comentarios_detallado, $fecha_mecanica, $comentarios_mecanica, $fecha_lavado, $comentarios_lavado, $fecha_entrega, $entrego, $recibio);

        //echo $r;

        if ($r == 1) {
            echo 1;
        } else {
            echo 0;
        }
        

    }

?>