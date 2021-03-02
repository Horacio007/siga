<?php
    include("../modelo/class_conceptos_pagos_dal.php");

    if(isset($_POST["select_tipo"])){

        $obj_lista = new conceptos_pagos_dal();
        $lista_estatus = $obj_lista->select_cpagos();

        if ($lista_estatus == NULL) {

            echo '<select name="cpago" id="cpago" class="form-control"><option value="0">No hay concepto de pago</option>';
        }
        else {

            $output = '<select name="cpago" id="cpago" class="form-control"><option value="0">Seleccione Concepto de Pago:</option>';

            foreach ($lista_estatus as $key => $value) {

                $output .= '<option value="'.$value->getId().'">'.$value->getConcepto_pago().'</option>';

            }

            $output .= '</select>';
            echo $output;
        }
    }
?>