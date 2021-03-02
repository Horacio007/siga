<?php
    include("../modelo/class_asesores_dal.php");

    if (isset($_POST["select_asesor"])) {
        $obj_lista = new asesores_dal;
        $lista_asesores = $obj_lista->select_asesores();

        if ($lista_asesores == NULL) {
            echo '<select name="sasesores" id="sasesores" class="form-control"><option value="0">No hay asesores registradas</option>';
        }
        else {
            $output = '<select name="sasesores" id="sasesores" class="form-control"><option value="0">Seleccione Asesor:</option>';

            foreach ($lista_asesores as $key => $value) {
                if ($value->getIdAseguradora() == 1) {

                    $nombre_completo = $value->getNombre().' '.$value->getA_paterno().' '.$value->getA_materno();
                    $output .= '<option value="'.$value->getIdAsesor().'">'.$nombre_completo.'</option>';
                } 

                if ($value->getIdAseguradora() == 4) {

                    $nombre_completo = $value->getNombre().' '.$value->getA_paterno().' '.$value->getA_materno();
                    $output .= '<option value="'.$value->getIdAsesor().'">'.$nombre_completo.'</option>';
                }
            }

            $output .= '</select>';
            echo $output;
        }
    }
?>