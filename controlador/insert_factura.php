<?php

    include("../modelo/class_facturas_dal.php");

    if (isset($_POST['id']) && isset($_POST['marca']) && isset($_POST['linea']) && isset($_POST['color']) && isset($_POST['modelo']) && isset($_POST['placas']) && isset($_POST['cliente']) && isset($_POST['cantidad']) && isset($_POST['fechaf']) && isset($_POST['estatusA']) && isset($_POST['fechabbva']) && isset($_POST['comentarios'])) {

        $objeto = new facturas_dal();

        $id = $_POST['id'];
        $marca = $_POST['marca'];
        $linea = $_POST['linea'];
        $color = $_POST['color'];
        $modelo = $_POST['modelo'];
        $placas = $_POST['placas'];
        $cliente = $_POST['cliente'];
        $cantidad = $_POST['cantidad'];
        $fechaf = $_POST['fechaf'];
        $estatusA = $_POST['estatusA'];
        $fechabbva = $_POST['fechabbva'];
        $comentarios = $_POST['comentarios'];

        if ($fechabbva == '') {
            $r = $objeto->insert_facturaSin($id, $marca, $linea, $color, $modelo, $placas, $cliente, $cantidad, $fechaf, $estatusA, $comentarios);
            //echo $r;
            if ($r == 1) {
                echo 1;
            } else {
                echo 'Factura No Registrada';
            }
        } else {
            //echo $expediente;
        
            $r = $objeto->insert_facturaT($id, $marca, $linea, $color, $modelo, $placas, $cliente, $cantidad, $fechaf, $estatusA, $fechabbva, $comentarios);
            //echo $r;
            if ($r == 1) {
                echo 1;
            } else {
                echo 'Factura No Registrada';
            }
        }

    }

?>