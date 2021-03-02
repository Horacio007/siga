<?php
    include("../modelo/class_auto_linea_dal.php");
    
    if(isset($_POST["submarcas_select"]) && isset($_POST["id_marca"]))

        $marca = $_POST["id_marca"];
        $obj_lista = new auto_linea_dal;
        $lista_autos = $obj_lista->select_autos($marca);

        if ($lista_autos == NULL) {

            echo '<select name="sautoslinea" id="sautoslinea" class="form-control"><option value="0">No hay lineas para el vehículo registrado</option>';
        }
        else {

            $output = '<select name="sautoslinea" id="sautoslinea" class="form-control"><option value="0">Seleccione Linea del Vehículo:</option>';

            foreach ($lista_autos as $key => $value) {

                $output .= '<option value="'.$value->getId().'">'.$value->getSubMarca().'</option>';

            }

            $output .= '</select>';
            echo $output;
    }
?>