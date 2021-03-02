<?php

    require("../vista/libs/fpdf/fpdf.php");
    include("../modelo/class_vehiculo_dal.php");
    include("../modelo/class_orden_retrabajo_dal.php");

    //obtengo la informacion del vehiculo
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $dia = date("d");
        $mes = date('m');
        $año = date('Y');
        $objeto2 = new orden_retrabajo_dal();
        $resultado2 = $objeto2->select_id($id);

        foreach ($resultado2 as $key => $value) {
            $exporden = $value->getIdVehiculo();
        }   

        $objeto = new vehiculo_dal();
        $resultado = $objeto->checklist_inicial($exporden);
       

        foreach ($resultado as $key => $value) {
            $expediente = $value->getId();
            $id_cliente = $value->getIdCliente();
            $marca = $value->getMarca();
            $linea = $value->getLinea();
            $modelo = $value->getModelo();
            $color = $value->getColor();
            $placas = $value->getPlacas();
            $aseguradora = $value->getCliente();
        }        
        
        $resultado3 = $objeto2->select_databyId($id);
        foreach ($resultado3 as $key => $value) {
            $fecha = $value->getFecha();
            $observaciones = $value->getObservaciones();
            $elaboro = $value->getElaboro();
        }     

        //creo el libro de pdf
        $pdf = new FPDF();
        //agrego una nueva pagina
        $pdf->AddPage();
        //agrego la imagen de fondo
        $pdf->Image('../vista/img/orden_retrabajo.jpg', 0, 2, 0, 280);
        //pongo la fuente y todo eso para el formato 
        $pdf->SetFont('Arial','B',22);
        //selecciono el tipo tamaño y color de letra
        $pdf->SetFont('Arial', '',10);
        //doy posiciones x y y de los elementos como en un plano cartesiano
        $pdf->setXY(103,13.5);
        $pdf->Cell(20,10,utf8_decode($expediente),0,20,'I');
        $pdf->setXY(40,13.5);
        $pdf->Cell(20,10,utf8_decode($marca),0,20,'I');
        $pdf->setXY(40,18.3);
        $pdf->Cell(20,10,utf8_decode($linea),0,20,'I');
        $pdf->setXY(103,18.3);
        $pdf->Cell(20,10,utf8_decode($aseguradora),0,20,'I');
        $pdf->setXY(40,28);
        $pdf->Cell(20,10,utf8_decode($color),0,20,'I');
        $pdf->setXY(40,23.3);
        $pdf->Cell(20,10,utf8_decode($modelo),0,20,'I');
        $pdf->setXY(40,32.8);
        $pdf->Cell(20,10,utf8_decode($placas),0,20,'I');
        $pdf->setXY(37,7.5);
        $pdf->Cell(20,10,utf8_decode($fecha),0,20,'I');

        $yyyyy = 48;
        $xxxxx = 48;
        $observaciones = explode('/', $observaciones);
        for ($i=0; $i < count($observaciones); $i++) { 
            if (strlen($observaciones[$i]) > 43) {
                $pdf->setXY(2,$yyyyy);
                $p1 = substr($observaciones[$i], 0, 80);
                $p2 = substr($observaciones[$i], 80, 160);
                $pdf->Cell(20,10,utf8_decode($p1),0,20,'I');
                $yyyyy = $yyyyy + 5.5;
                $pdf->Cell(20,10,utf8_decode($p2),0,20,'I');
                $yyyyy = $yyyyy + 5.5;
            } else {
                $pdf->setXY(2,$xxxxx);
                $p1 = substr($observaciones[$i], 0, 80);
                $pdf->Cell(20,10,utf8_decode($p1),0,20,'I');
                $xxxxx = $xxxxx + 5.5;
            }
        }
        //creo y mando el pdf
        $pdf->Output();
        
    }

?>