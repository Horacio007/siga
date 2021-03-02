<?php

    include("../modelo/class_vehiculo_dal.php");
    include("../modelo/class_cliente_dal.php");

    if (isset($_POST['id'])) {
        $objeto = new cliente_dal();
        $objeto2 = new vehiculo_dal();

        $id = $_POST['id'];

        $ev = $objeto2->exist_vehiculoE($id);

        //echo $ev;

        if ($ev == 1) {
            $id_aux = $objeto2->select_IdAux($id);

            foreach ($id_aux as $key => $value) {
                $id_cliente = $value->getIdAux();
            }

            $n = $objeto->get_nombre($id_cliente);

            foreach ($n as $key => $value) {
                $nombre = $value->getNombre();
            }

            $data = array(
                'result' => 1,
                'id_cliente' => $id_cliente,
                'nombre' => $nombre
            );

            echo json_encode($data);

        } else {
            echo 0;
        }
        

    }

?>