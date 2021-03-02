<?php
    include("../modelo/class_cliente_dal.php");

    if (isset($_POST['ncliente']) and isset($_POST['tel']) and isset($_POST['correo'])) {
        $nombre = $_POST['ncliente'];
        $telefono = $_POST['tel'];
        $correo = $_POST['correo'];

        $objeto = new cliente_dal();
        $resultado = $objeto->registra_cliente($nombre, $telefono, $correo);
        $resultado2 = $objeto->ultimo_registro();
        foreach ($resultado2 as $key => $value) {
            $output = $value->getId();
        }

        $resultado3 = $objeto->maxid();
        foreach ($resultado3 as $key => $value) {
            $output2 = $value->getId();
        }

        if ($resultado == 1) {
            echo 'Cliente Registrado';
        }
        else{
            echo 'Cliento no Registrado';
        }
    }
?>