<?php
    include("../modelo/class_almacen_dal.php");

    if (isset($_POST['id'])) {
        $id = $_POST["id"];
    
        $objeto = new almacen_dal();
        $resultado = $objeto->exist_Id($id);

        if ($resultado == 1) {
            //echo 'entro al uno';
            $r = $objeto->select_databyId($id);

            foreach ($r as $key => $value) {
                $ubicacion = $value->getUbicacion();
                $fecha_entrega = $value->getFecha_entrega();
                $estatus = $value->getEstatus();
                $comentarios = $value->getComentarios();
                $descripcion = $value->getDescripcion();
            }

            $refa = array(
                'result' => 1,
                'id' => $id,
                'ubicacion' => $ubicacion,
                'fecha_entrega' => $fecha_entrega,
                'estatus' => $estatus,
                'comentarios' => $comentarios,
                'descripcion' => $descripcion
            );

            echo json_encode($refa);

        }else {
            echo 0;
        }
    }
?>