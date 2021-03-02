<?php

    require("../vista/libs/fpdf/fpdf.php");
    include("../modelo/class_vehiculo_dal.php");
    include("../modelo/class_orden_trabajo_dal.php");

    //obtengo la informacion del vehiculo
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $dia = date("d");
        $mes = date('m');
        $año = date('Y');
        $objeto2 = new orden_trabajo_dal();
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
            $reparacion = $value->getReparacion();
            $hojalateria = $value->getHojalateria();
            $pintura = $value->getPintura();
            $mecanica = $value->getMecanica();
            $observaciones = $value->getObservaciones();
            $elaboro = $value->getElavoro();
        }     

        //creo el libro de pdf
        $pdf = new FPDF();
        //agrego una nueva pagina
        $pdf->AddPage();
        //agrego la imagen de fondo
        $pdf->Image('../vista/img/orden_trabajo.jpg', 0, 2, 0, 280);
        //pongo la fuente y todo eso para el formato 
        $pdf->SetFont('Arial','B',22);
        //selecciono el tipo tamaño y color de letra
        $pdf->SetFont('Arial', '',10);
        //doy posiciones x y y de los elementos como en un plano cartesiano
        $pdf->setXY(103,16);
        $pdf->Cell(20,10,utf8_decode($expediente),0,20,'I');
        $pdf->setXY(40,16);
        $pdf->Cell(20,10,utf8_decode($marca),0,20,'I');
        $pdf->setXY(40,21);
        $pdf->Cell(20,10,utf8_decode($linea),0,20,'I');
        $pdf->setXY(103,21.5);
        $pdf->Cell(20,10,utf8_decode($aseguradora),0,20,'I');
        $pdf->setXY(40,32.5);
        $pdf->Cell(20,10,utf8_decode($color),0,20,'I');
        $pdf->setXY(40,27);
        $pdf->Cell(20,10,utf8_decode($modelo),0,20,'I');
        $pdf->setXY(40,38.5);
        $pdf->Cell(20,10,utf8_decode($placas),0,20,'I');
        $pdf->setXY(40,9.5);
        $pdf->Cell(20,10,utf8_decode($fecha),0,20,'I');
        //saco los conceptos de reparacion porque es una ordend e jales
        $y = 55;
        $reparacion = explode('/', $reparacion);
        for ($i=0; $i < count($reparacion); $i++) { 
            $pdf->setXY(25,$y);
            $pdf->Cell(20,10,utf8_decode(strtoupper($reparacion[$i])),0,20,'I');
            $y = $y + 5.5;
        }

        $yy = 55;
        $hojalateria = explode('/', $hojalateria);
        for ($i=0; $i < count($hojalateria); $i++) { 
            $pdf->setXY(144,$yy);
            if ($hojalateria[$i] == 1) {
                $pdf->Cell(20,10,strtoupper('x'),0,20,'I');
            } else {
                $pdf->Cell(20,10,strtoupper(''),0,20,'I');
            }
            
            
            $yy = $yy + 5.5;
        }

        $yyy = 55;
        $pintura = explode('/', $pintura);
        for ($i=0; $i < count($pintura); $i++) { 
            $pdf->setXY(168.5,$yyy);
            if ($pintura[$i] == 1) {
                $pdf->Cell(20,10,strtoupper('x'),0,20,'I');
            } else {
                $pdf->Cell(20,10,strtoupper(''),0,20,'I');
            }
            
            
            $yyy = $yyy + 5.5;
        }

        $yyyy = 55;
        $mecanica = explode('/', $mecanica);
        for ($i=0; $i < count($mecanica); $i++) { 
            $pdf->setXY(193,$yyyy);
            if ($mecanica[$i] == 1) {
                $pdf->Cell(20,10,strtoupper('x'),0,20,'I');
            } else {
                $pdf->Cell(20,10,strtoupper(''),0,20,'I');
            }
            
            
            $yyyy = $yyyy + 5.5;
        }

        $yyyyy = 211;
        $xxxxx = 211;
        $observaciones = explode('/', $observaciones);
        for ($i=0; $i < count($observaciones); $i++) { 
            if (strlen($observaciones[$i]) > 43) {
                $pdf->setXY(68,$yyyyy);
                $p1 = substr($observaciones[$i], 0, 80);
                $p2 = substr($observaciones[$i], 80, 160);
                $pdf->Cell(20,10,utf8_decode($p1),0,20,'I');
                $yyyyy = $yyyyy + 5.5;
                $pdf->Cell(20,10,utf8_decode($p2),0,20,'I');
                $yyyyy = $yyyyy + 5.5;
            } else {
                $pdf->setXY(68,$xxxxx);
                $p1 = substr($observaciones[$i], 0, 80);
                $pdf->Cell(20,10,utf8_decode($p1),0,20,'I');
                $xxxxx = $xxxxx + 5.5;
            }
        }

        $pdf->setXY(85,274);
        $pdf->Cell(5,0,utf8_decode($elaboro),0,20,'I');
        //creo y mando el pdf
        $pdf->Output();
        
    }

?>