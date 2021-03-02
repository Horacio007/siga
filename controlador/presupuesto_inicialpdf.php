<?php
    require("../vista/libs/fpdf/fpdf.php");
    include("../modelo/class_vehiculo_dal.php");
    include("../modelo/class_cliente_dal.php");
    include("../modelo/class_presupuesto_dal.php");

    //obtengo la informacion del vehiculo
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $objv = new vehiculo_dal();
        $objp = new presupuesto_dal();

        $exv = $objv->exist_vehiculo($id);
        $exp = $objp->exist_presupuesto($id);

        if ($exv == 1 && $exp == 1) {
            $dia = date("d");
            $mes = date('m');
            $año = date('Y');

            $objeto = new vehiculo_dal();
            $resultado = $objeto->checklist_inicial($id);

            $objeto2 = new cliente_dal();

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

            //obtengo la informacion del cliente
            $resultado2 = $objeto2->checklist_inicial($id_cliente);

            foreach ($resultado2 as $key => $value) {
                $nombre = $value->getNombre();
                $tel = $value->getTelefono();
                $correo = $value->getCorreo();
            }

            //saco el estatus del vehiculo
            $rest = $objeto->get_Estatus($id);
            foreach ($rest as $key => $value) {
                $estatusv = $value->getEstatus();
            }

            //obtengo la informacion del presupeusto
            $objeto3 = new presupuesto_dal();

            $resultado3 = $objeto3->select_data($id);
            foreach ($resultado3 as $key => $value) {
                $op = $value->getOp();
                $nivel = $value->getNivel();
                $concepto = $value->getConcepto();
                $momh = $value->getMomh();
                $momp = $value->getMomp();
                $momm = $value->getMomm();
                $tot = $value->getTot();
                $refacciones = $value->getRefacciones();
                $tmomh = $value->getTmomh();
                $tmomp = $value->getTmomp();
                $tmomm = $value->getTmomm();
                $ttot = $value->getTtot();
                $trefacciones = $value->getTrefacciones();
                $subtotal = $value->getSubTotal();
                $iva = $value->getIva();
                $total = $value->getTotal();

            }
            

            //creo el libro de pdf
            $pdf = new FPDF();
            //agrego una nueva pagina
            $pdf->AddPage();
            //agrego la imagen de fondo
            $pdf->Image('../vista/img/formato_presupuesto.jpg', 0, 0, 0, 280);
            //selecciono el tipo tamaño y color de letra
            $pdf->SetFont('Arial', '',10);
            //doy posiciones x y y de los elementos como en un plano cartesiano
            $pdf->setXY(75,9);
            $pdf->Cell(20,10,utf8_decode("Expediente -> ".$id),0,20,'I');
            $pdf->setXY(22,19.5);
            $pdf->Cell(20,10,utf8_decode($nombre),0,20,'I');
            $pdf->setXY(22,37);
            $pdf->Cell(20,10,utf8_decode($aseguradora),0,20,'I');
            $pdf->setXY(91,19.5);
            $pdf->Cell(20,10,utf8_decode($marca),0,20,'I');
            $pdf->setXY(91,25.5);
            $pdf->Cell(20,10,utf8_decode($linea),0,20,'I');
            $pdf->setXY(91,31);
            $pdf->Cell(20,10,utf8_decode($modelo),0,20,'I');
            $pdf->setXY(91,37);
            $pdf->Cell(20,10,utf8_decode($color),0,20,'I');
            $pdf->setXY(160,25.5);
            $pdf->Cell(20,10,utf8_decode($placas),0,20,'I');
            $pdf->setXY(160,31);
            $pdf->Cell(20,10,utf8_decode($dia.'/'.$mes.'/'.$año),0,20,'I');
            $pdf->setXY(160,37);
            $pdf->Cell(20,10,utf8_decode($estatusv),0,20,'I');
            $y = 52;
            $op = explode('/', $op);
            for ($i=0; $i < count($op); $i++) { 
                $pdf->setXY(0,$y);
                $pdf->Cell(20,10,utf8_decode(strtoupper($op[$i])),0,20,'I');
                $y = $y + 5.5;
            }
            $yy = 52;
            $nivel = explode('/', $nivel);
            for ($i=0; $i < count($op); $i++) { 
                $pdf->setXY(5,$yy);
                $pdf->Cell(20,10,utf8_decode(strtoupper($nivel[$i])),0,20,'I');
                $yy = $yy + 5.5;
            }
            $yyy = 52;
            $concepto = explode('/', $concepto);
            for ($i=0; $i < count($concepto); $i++) { 
                $pdf->setXY(22,$yyy);
                $pdf->Cell(20,10,utf8_decode($concepto[$i]),0,20,'I');
                $yyy = $yyy + 5.5;
            }
            //le cambio el tamaño de la letra
            $pdf->SetFont('Arial','B',9);
            $yyyy = 52;
            $momh = explode('/', $momh);
            for ($i=0; $i < count($momh); $i++) { 
                $pdf->setXY(137.5,$yyyy);
                $pdf->Cell(20,10,utf8_decode($momh[$i]),0,20,'I');
                $yyyy = $yyyy + 5.5;
            }
            $yyyyy = 52;
            $momp = explode('/', $momp);
            for ($i=0; $i < count($momp); $i++) { 
                $pdf->setXY(151.5,$yyyyy);
                $pdf->Cell(20,10,utf8_decode($momp[$i]),0,20,'I');
                $yyyyy = $yyyyy + 5.5;
            }
            $yyyyyy = 52;
            $momm = explode('/', $momm);
            for ($i=0; $i < count($momm); $i++) { 
                $pdf->setXY(166.5,$yyyyyy);
                $pdf->Cell(20,10,utf8_decode($momm[$i]),0,20,'I');
                $yyyyyy = $yyyyyy + 5.5;
            }
            $yyyyyyy = 52;
            $tot = explode('/', $tot);
            for ($i=0; $i < count($tot); $i++) { 
                $pdf->setXY(180.5,$yyyyyyy);
                $pdf->Cell(20,10,utf8_decode($tot[$i]),0,20,'I');
                $yyyyyyy = $yyyyyyy + 5.5;
            }
            $yyyyyyyy = 52;
            $refacciones = explode('/', $refacciones);
            for ($i=0; $i < count($refacciones); $i++) { 
                $pdf->setXY(195,$yyyyyyyy);
                $pdf->Cell(20,10,utf8_decode($refacciones[$i]),0,20,'I');
                $yyyyyyyy = $yyyyyyyy + 5.5;
            }
            $pdf->setXY(137.5,225.5);
            $pdf->Cell(20,10,utf8_decode($tmomh),0,20,'I');
            $pdf->setXY(151.5,225.5);
            $pdf->Cell(20,10,utf8_decode($tmomp),0,20,'I');
            $pdf->setXY(166.5,225.5);
            $pdf->Cell(20,10,utf8_decode($tmomm),0,20,'I');
            $pdf->setXY(180.5,225.5);
            $pdf->Cell(20,10,utf8_decode($ttot),0,20,'I');
            $pdf->setXY(195,225.5);
            $pdf->Cell(20,10,utf8_decode($trefacciones),0,20,'I');
            $pdf->setXY(195,230);
            $pdf->Cell(20,10,utf8_decode($subtotal),0,20,'I');
            $pdf->setXY(195,235);
            $pdf->Cell(20,10,utf8_decode($iva),0,20,'I');
            $pdf->setXY(195,240);
            $pdf->Cell(20,10,utf8_decode($total),0,20,'I');
            
            //creo y mando el pdf
            $pdf->Output();
        } else {
            echo 'Primero debes crear el Presupuesto Inicial';
        }
        
    }
?>