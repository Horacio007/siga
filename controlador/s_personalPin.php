<?php
    include("../modelo/class_personal_dal.php");

    if(isset($_POST["select_personalPin"])){

        $obj_lista = new personal_dal();
        $lista_estatus = $obj_lista->select_personalPin();

        if ($lista_estatus == NULL) {

            echo '<select name="spersonalPin" id="spersonalPin" class="form-control"><option value="0">No hay personal</option>';
        }
        else {

            $output = '<select name="spersonalPin" id="spersonalPin" class="form-control"><option value="0">Seleccione Personal del Vehículo:</option>';

            foreach ($lista_estatus as $key => $value) {

                $output .= '<option value="'.$value->getId().'">'.$value->getNombre().'</option>';

            }

            $output .= '</select>';
            echo $output;
        }
    }
?>