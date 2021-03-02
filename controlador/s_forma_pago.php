<?php
    include("../modelo/class_forma_pago_dal.php");

    if(isset($_POST["select_fpago"])){

        $obj_lista = new forma_pago_dal();
        $lista_estatus = $obj_lista->select_fpago();

        if ($lista_estatus == NULL) {

            echo '<select name="sfpago" id="sfpago" class="form-control"><option value="0">No hay forma de pago</option>';
        }
        else {

            $output = '<select name="sfpago" id="sfpago" class="form-control"><option value="0">Seleccione Forma de Pago:</option>';

            foreach ($lista_estatus as $key => $value) {

                $output .= '<option value="'.$value->getId().'">'.$value->getForma_pago().'</option>';

            }

            $output .= '</select>';
            echo $output;
        }
    }
?>