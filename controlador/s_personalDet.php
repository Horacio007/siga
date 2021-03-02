<?php
    include("../modelo/class_personal_dal.php");

    if(isset($_POST["select_personalDet"])){

        $obj_lista = new personal_dal();
        $lista_estatus = $obj_lista->select_personalDet();

        if ($lista_estatus == NULL) {

            echo '<select name="spersonalDet" id="spersonalDet" class="form-control"><option value="0">No hay personal</option>';
        }
        else {

            $output = '<select name="spersonalDet" id="spersonalDet" class="form-control"><option value="0">Seleccione Personal del Vehículo:</option>';

            foreach ($lista_estatus as $key => $value) {

                $output .= '<option value="'.$value->getId().'">'.$value->getNombre().'</option>';

            }

            $output .= '</select>';
            echo $output;
        }
    }
?>