<?php
    include("../modelo/class_tipo_servicio_dal.php");

    if(isset($_POST["select_tipo"])){

        $obj_lista = new tipo_servicio_dal();
        $lista_estatus = $obj_lista->select_Tservicios();

        if ($lista_estatus == NULL) {

            echo '<select name="tservicio" id="tservicio" class="form-control"><option value="0">No hay tipo de servicio</option>';
        }
        else {

            $output = '<select name="tservicio" id="tservicio" class="form-control"><option value="0">Seleccione Tipo de Servicio:</option>';

            foreach ($lista_estatus as $key => $value) {

                $output .= '<option value="'.$value->getId().'">'.$value->getTipo_servicio().'</option>';

            }

            $output .= '</select>';
            echo $output;
        }
    }
?>