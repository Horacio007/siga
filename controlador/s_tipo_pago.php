<?php
    include("../modelo/class_tipo_pago_dal.php");

    if(isset($_POST["select_tipo"])){

        $obj_lista = new tipo_pago_dal();
        $lista_estatus = $obj_lista->select_Tpagos();

        if ($lista_estatus == NULL) {

            echo '<select name="tpago" id="tpago" class="form-control"><option value="0">No hay tipo de pago</option>';
        }
        else {

            $output = '<select name="tpago" id="tpago" class="form-control"><option value="0">Seleccione Tipo de Pago:</option>';

            foreach ($lista_estatus as $key => $value) {

                $output .= '<option value="'.$value->getId().'">'.$value->getTipo_pago().'</option>';

            }

            $output .= '</select>';
            echo $output;
        }
    }
?>