<?php
    include("../modelo/class_auto_dal.php");

    if (isset($_POST['marcas_select'])) {
        $obj_lista = new autos_dal;
        $lista_autos = $obj_lista->select_autos();

        if ($lista_autos == NULL) {
            echo '<select name="sautos" id="sautos" class="form-control" onchange="cambiamarca()"><option value="0">No hay vehículos registradas</option>';
        }
        else {
            $output = '<select name="sautos" id="sautos" class="form-control"><option value="0">Seleccione Vehículo:</option>';

            foreach ($lista_autos as $key => $value) {

                $output .= '<option value="'.$value->getIdAuto().'">'.$value->getMarca().'</option>';

            }

            $output .= '</select>';
            echo $output;
        }
    }
?>

