<?php

    include("../modelo/class_vehiculo_dal.php");

    if (isset($_POST['id']) and isset($_POST['aplica_hojalateria']) and isset($_POST['fecha_hojalateria']) and isset($_POST['asignado_hojalateria'])  and isset($_POST['comentarios_hojalateria']) and  isset($_POST['aplica_pintura']) and isset($_POST['fecha_pintura']) and isset($_POST['asignado_pintura']) and isset($_POST['comentarios_pintura']) and isset($_POST['aplica_armado']) and isset($_POST['fecha_armado']) and isset($_POST['asignado_armado']) and isset($_POST['comentarios_armado']) and isset($_POST['aplica_detallado']) and isset($_POST['asignado_detallado']) and isset($_POST['comentarios_detallado']) and isset($_POST['aplica_mecanica']) and isset($_POST['fecha_mecanica']) and isset($_POST['asignado_mecanica']) and isset($_POST['comentarios_mecanica']) and isset($_POST['aplica_lavado']) and isset($_POST['fecha_lavado']) and isset($_POST['asignado_lavado']) and isset($_POST['comentarios_lavado'])) {
       
       $objeto = new vehiculo_dal();
        //echo 'siestan';
       $id = $_POST['id'];
       $aplica_hojalateria = $_POST['aplica_hojalateria'];
       $fecha_hojalateria = $_POST['fecha_hojalateria'];
       //$asignado_hojalateria = $_POST['asignado_hojalateria'];
       $comentarios_hojalateria = $_POST['comentarios_hojalateria'];
       //$aplica_preparacion = $_POST['aplica_preparacion'];
       //$fecha_preparacion = $_POST['fecha_preparacion'];
       //$asignado_preparacion = 'Felipe';
       //$comentarios_preparacion = $_POST['comentarios_preparacion'];
       $aplica_pintura = $_POST['aplica_pintura'];
       $fecha_pintura = $_POST['fecha_pintura'];
       //$asignado_pintura = 'Rodolfo';
       $comentarios_pintura = $_POST['comentarios_pintura'];
       $aplica_armado = $_POST['aplica_armado'];
       $fecha_armado = $_POST['fecha_armado'];
       //$asignado_armado = 'Christian';
       $comentarios_armado = $_POST['comentarios_armado'];
       $aplica_detallado = $_POST['aplica_detallado'];
       $fecha_detallado = $_POST['fecha_detallado'];
       //$asignado_detallado = 'Gerardo';
       $comentarios_detallado = $_POST['comentarios_detallado'];
       $aplica_mecanica = $_POST['aplica_mecanica'];
       $fecha_mecanica = $_POST['fecha_mecanica'];
       //$asignado_mecanica = 'Uriel';
       $comentarios_mecanica = $_POST['comentarios_mecanica'];
       $aplica_lavado = $_POST['aplica_lavado'];
       $fecha_lavado = $_POST['fecha_lavado'];
       //$asignado_lavado = 'Pablo';
       $comentarios_lavado = $_POST['comentarios_lavado'];

       switch ($_POST['asignado_hojalateria']) {
           case 1:
                $asignado_hojalateria = 'Marcial';
               break;

            case 3:
                $asignado_hojalateria = 'Luis Carlos';
               break;

           default:
                $asignado_hojalateria = 'No aplica';
               break;
        }
        /*
        switch ($_POST['asignado_preparacion']) {
            case 4:
                $asignado_preparacion = 'Felipe';
                break;
            
            case 10:
                $asignado_preparacion = 'Rodolfo';
                break;

            default:
                $asignado_preparacion = 'No aplica';
                break;
        }
        */
        switch ($_POST['asignado_pintura']) {
            case 11:
                $asignado_pintura = 'Felipe';
                break;
            
            default:
                $asignado_pintura = 'No aplica';
                break;
        }

        switch ($_POST['asignado_armado']) {
            case 12:
                $asignado_armado = 'Luis Carlos';
                break;

            case 13:
                $asignado_armado = 'Marcial';
                break;
            
            default:
                $asignado_armado = 'No aplica';
                break;
        }

        switch ($_POST['asignado_detallado']) {
            case 7:
                $asignado_detallado = 'Gerardo';
                break;

            case 14:
                $asignado_detallado = 'Juan Manuel';
                break;
            
            default:
                $asignado_detallado = 'No aplica';
                break;
        }

        switch ($_POST['asignado_mecanica']) {
            case 9:
                $asignado_mecanica = 'Uriel';
                break;
            
            default:
                $asignado_mecanica = 'No aplica';
                break;
        }

        switch ($_POST['asignado_lavado']) {
            case 8:
                $asignado_lavado = 'Pablo';
                break;
            
            default:
                $asignado_lavado = 'No aplica';
                break;
        }

        $r = $objeto->update_AsigPersonal($id, $aplica_hojalateria, $fecha_hojalateria, $asignado_hojalateria, $comentarios_hojalateria, $aplica_pintura, $fecha_pintura, $asignado_pintura, $comentarios_pintura, $aplica_armado, $fecha_armado, $asignado_armado, $comentarios_armado, $aplica_detallado, $fecha_detallado, $asignado_detallado, $comentarios_detallado, $aplica_mecanica, $fecha_mecanica, $asignado_mecanica, $comentarios_mecanica, $aplica_lavado, $fecha_lavado, $asignado_lavado, $comentarios_lavado);

        //echo $r;

        if ($r == 1) {
            echo 1;
        } else {
            echo 0;
        }
        

    }

?>