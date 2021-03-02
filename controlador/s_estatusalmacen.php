<?php
    include("../modelo/class_estatus_almacen_dal.php");

    if(isset($_POST["select_estatus"])){

        $obj_lista = new estatus_dal();
        $lista_estatus = $obj_lista->select_estatus();

        if ($lista_estatus == NULL) {

            echo '<select name="sestatus" id="sestatus" class="form-control"><option value="0">No hay estatus</option>';
        }
        else {

            $output = '<select name="sestatus" id="sestatus" class="form-control"><option value="0">Seleccione Estatus de la Refaccion:</option>';

            foreach ($lista_estatus as $key => $value) {

                $output .= '<option value="'.$value->getId().'">'.$value->getEstatus().'</option>';

            }

            $output .= '</select>';
            echo $output;
        }
    }
?>