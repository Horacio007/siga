<?php
    
    include("../modelo/class_gastos_dal.php");

    if (isset($_POST['id']) && isset($_POST['fecha']) && isset($_POST['articulos']) && isset($_POST['cantidad']) && isset($_POST['fpago']) && isset($_POST['factura']) && isset($_POST['tipogasto']) && isset($_POST['proveedor']) && isset($_POST['expediente'])) {

        $objeto = new gastos_dal();

        $id = $_POST['id'];
        $fecha = $_POST['fecha'];
        $articulos = $_POST['articulos'];
        $cantidad = $_POST['cantidad'];
        $fpago = $_POST['fpago'];
        $factura = $_POST['factura'];
        $tipogasto = $_POST['tipogasto'];
        $proveedor = $_POST['proveedor'];
        $expediente = $_POST['expediente'];

        //echo $entra;
        
        $r = $objeto->update_gasto($id, $fecha, $articulos, $cantidad, $fpago, $factura, $tipogasto, $proveedor, $expediente);
        //echo $r;
        
        if ($r == 1) {
            echo 1;
        } else {
            echo 'Gasto No Actualizado';
        }
        

    }

?>