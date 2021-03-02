<?php
        require("../vista/libs/fpdf/fpdf.php");
        include("../modelo/class_vehiculo_dal.php");
        include("../modelo/class_presupuesto_dal.php");
        include("../modelo/class_refacciones_dal.php");
    
        //obtengo la informacion del vehiculo
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $objp = new presupuesto_dal();
            $objr = new refacciones_dal();

            $exp = $objp->exist_presupuesto($id);
            $exr = $objr->exist_cotrefaccion($id);
    
            if ($exr == 1 && $exp == 1) {
                $dia = date("d");
                $mes = date('m');
                $año = date('Y');
    
                $objeto = new vehiculo_dal();
                $resultado = $objeto->checklist_inicial($id);
    
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

                $objeto2 = new refacciones_dal();
                $resultado2 = $objeto2->selcet_data($id);

                foreach ($resultado2 as $key => $value) {
                    $concepto = $value->getConcepto();
                    $cantidad = $value->getCantidad();
                    $nombreprov1 = $value->getNombreprov1();
                    $nombreprov2 = $value->getNombreprov2();
                    $nombreprov3 = $value->getNombreprov3();
                    $proveedor1 = $value->getProveedor1();
                    $proveedor2 = $value->getProveedor2();
                    $proveedor3 = $value->getProveedor3();
                    $tproveedor1 = $value->getTProveedor1();
                    $tproveedor2 = $value->getTProveedor2();
                    $tproveedor3 = $value->getTProveedor3();
                    $proveedorfinal = $value->getProveedorFinal();
                    $costo = $value->getCosto();
                    $costofinal = $value->getCostofinal();
                    $fecha_promesa = $value->getFechaPromesa();
                    $num_guia = $value->getNumGuia();
                    $fecha_llegada = $value->getFechaLlegada();
                    $comentarios = $value->getComentarios();
                    
                } 

    
                //creo el libro de pdf
                $pdf = new FPDF();
                //agrego una nueva pagina
                $pdf->AddPage('L');
                //agrego la imagen de fondo
                $pdf->Image('../vista/img/formato_listarefa.jpg', -2.5, 2, 0, 208);
                // el agrego el y titulo
                $pdf->SetFont('Arial','B',22);
                $pdf->setXY(100,0);
                $pdf->Cell(20,8,utf8_decode('Lista de Refacciones'),0,20,'I');
                //selecciono el tipo tamaño y color de letra
                $pdf->SetFont('Arial', '',10);
                //doy posiciones x y y de los elementos como en un plano cartesiano
                $pdf->setXY(28,9);
                $pdf->Cell(20,10,utf8_decode($expediente),0,20,'I');
                $pdf->setXY(102,9);
                $pdf->Cell(20,10,utf8_decode($marca.' '.$linea),0,20,'I');
                $pdf->setXY(208,9);
                $pdf->Cell(20,10,utf8_decode($aseguradora),0,20,'I');
                $pdf->setXY(28.5,14.5);
                $pdf->Cell(20,10,utf8_decode($color),0,20,'I');
                $pdf->setXY(102.5,14.5);
                $pdf->Cell(20,10,utf8_decode($modelo),0,20,'I');
                // ahora saco los conceptos
                $concepto = explode('/', $concepto);
                $y = 30.5;
                for ($i=0; $i < count($concepto); $i++) {
                    $pdf->setXY(11 ,$y);
                    $pdf->Cell(20,10,utf8_decode($concepto[$i]),0,20,'I');
                    $y = $y+7;
                }
                
                // saco las cantidades
                $cantidad = explode('/', $cantidad);
                $yy = 30.5;
                for ($i=0; $i < count($cantidad); $i++) {
                    $pdf->setXY(100 ,$yy);
                    $pdf->Cell(20,10,utf8_decode($cantidad[$i]),0,20,'I');
                    $yy = $yy+7;
                }
                // pongo los proveedores finales
                $proveedorfinal = explode('/', $proveedorfinal);
                $yyyyyy = 30.5;
                for ($i=0; $i < count($proveedorfinal); $i++) {
                    $pdf->setXY(105 ,$yyyyyy);
                    $pdf->Cell(20,10,utf8_decode($proveedorfinal[$i]),0,20,'I');
                    $yyyyyy = $yyyyyy+7;
                }
                //pongo las fechas promesas
                $fecha_promesa = explode('-', $fecha_promesa);
                $yyyyyyyy = 30.5;
                for ($i=0; $i < count($fecha_promesa); $i++) {
                    $pdf->setXY(129 ,$yyyyyyyy);
                    $pdf->Cell(20,10,utf8_decode($fecha_promesa[$i]),0,20,'I');
                    $yyyyyyyy = $yyyyyyyy+7;
                }
                // pogno el numero de guia
                $num_guia = explode('/', $num_guia);
                $yyyyyyyyy = 30.5;
                for ($i=0; $i < count($num_guia); $i++) {
                    $pdf->setXY(149,$yyyyyyyyy);
                    $pdf->Cell(20,10,utf8_decode($num_guia[$i]),0,20,'I');
                    $yyyyyyyyy = $yyyyyyyyy+7;
                }
                // saco los comentarios
                $comentarios = explode('/', $comentarios);
                $yyyyyyyyyy = 30.5;
                for ($i=0; $i < count($comentarios); $i++) {
                    $pdf->setXY(201 ,$yyyyyyyyyy);
                    $pdf->Cell(20,10,utf8_decode($comentarios[$i]),0,20,'I');
                    $yyyyyyyyyy = $yyyyyyyyyy+7;
                }
                //creo y mando el pdf
                $pdf->Output();
            } else {
                echo 'Primero debes crear la Cotizacion';
            }
            
        }

?>