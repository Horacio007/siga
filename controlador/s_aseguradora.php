<?php
    include("../modelo/class_aseguradora_dal.php");

    if (isset($_POST["select_aseguradora"])) {
        $obj_lista = new aseguradora_dal;
        $lista_aseguradoras = $obj_lista->select_aseguradora();

        if ($lista_aseguradoras == NULL) {
            echo '<select name="saseguradora" id="saseguradora" class="form-control"><option value="0">No hay aseguradoras registradas</option>';
        }
        else {
            $output = '<select name="saseguradora" id="saseguradora" class="form-control"><option value="0">Seleccione Aseguradora:</option>';

            foreach ($lista_aseguradoras as $key => $value) {
                $output .= '<option value="'.$value->getIdAseguradora().'">'.$value->getNombre().'</option>';
            }

            $output .= '</select>';
            echo $output;
        }
    }
?>