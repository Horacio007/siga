<?php
    include("../modelo/class_cliente_dal.php");
    include("../modelo/class_vehiculo_dal.php");

    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        $objeto = new cliente_dal();
        $objeto2 = new vehiculo_dal();
        $n = $objeto2->select_IdAux($id);

        foreach ($n as $key => $value) {
            $id_aux = $value->getIdaux();
        }

        $nn = $objeto->get_nombre($id_aux);

        foreach ($nn as $key => $value) {
            $nombre = $value->getNombre();
        }

        $val = array(
            'resultado' => 1,
            'cliente' => $nombre
        ); 
        echo json_encode($val);
        /*
        if ($nombre != '') {
            echo $nombre;
        }
        else{
            echo 'Cliento no Registrado';
        }
        */
    }
?>