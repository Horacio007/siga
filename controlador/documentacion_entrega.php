<?php
    require("../vista/libs/fpdf/fpdf.php");
    include("../modelo/class_vehiculo_dal.php");
    include("../modelo/class_cliente_dal.php");
    include("../modelo/class_asesores_dal.php");

    if (isset($_GET['id'])) {

        $id = $_GET['id'];

        $objeto = new vehiculo_dal();
        $resultado = $objeto->checklist_inicial($id);

        $objeto2 = new cliente_dal();
        $objeto3 = new asesores_dal();
        

        foreach ($resultado as $key => $value) {
            $expediente = $value->getId();
            $id_cliente = $value->getIdCliente();
            $id_asesor = $value->getIdAsesor();
            $marca = $value->getMarca();
            $linea = $value->getLinea();
            $modelo = $value->getModelo();
            $color = $value->getColor();
            $placas = $value->getPlacas();
            $aseguradora = $value->getCliente();
            $siniestro = $value->getNoSiniestro();
        }

        //obtengo la informacion del cliente
        $resultado2 = $objeto2->checklist_inicial($id_cliente);

        foreach ($resultado2 as $key => $value) {
            $nombre = $value->getNombre();
            $tel = $value->getTelefono();
            $correo = $value->getCorreo();
        }

        //obtengo la informacion del asesor
        $resultado3 = $objeto3->nombre_Asesor($id_asesor);

        foreach ($resultado3 as $key => $value) {
            $nombreAsesor = $value->getNombre().' '.$value->getA_paterno().' '.$value->getA_materno();
        }

        //creo el pdf segun la aseguradora
        switch ($aseguradora) {
            case 'GNP':
                //creo el libro de pdf
                $pdf = new FPDF();
                //agrego la nueva pagina de la encuesta de gnp
                $pdf->AddPage();
                //agrego la imagen de fondo
                $pdf->Image('../vista/img/encuesta_gnp.jpg', 0, 0, 0, 269); 
                //selecciono el tipo tamaño y color de letra
                $pdf->SetFont('Arial','B',12);
                //doy posiciones x y y de los elementos como en un plano cartesiano
                $pdf->setXY(50,215);
                $pdf->Cell(20,10,utf8_decode($nombre),0,20,'C');
                $pdf->setXY(50,233.5);
                $pdf->Cell(20,10,utf8_decode($tel),0,20,'C');
                $pdf->setXY(160,228);
                $pdf->Cell(20,10,utf8_decode($nombre),0,20,'C');
                $pdf->setXY(160,233.5);
                $pdf->Cell(20,10,utf8_decode($tel),0,20,'C');
                //obtengo la fecha del dia de hoy 
                $dia = date('d');
                $mes = date('m');
                $ano = date('y');
                //ahora acomo la fecha en su lugar correspondiente
                $pdf->setXY(138.5,244.8);
                $pdf->Cell(20,10,utf8_decode($dia),0,20,'C');
                $pdf->setXY(146.5,244.8);
                $pdf->Cell(20,10,utf8_decode($mes),0,20,'C');
                $pdf->setXY(154.5,244.8);
                $pdf->Cell(20,10,utf8_decode($ano),0,20,'C');
                //agrego el numero de siniestro
                $pdf->setXY(160,222.5);
                $pdf->Cell(20,10,utf8_decode($siniestro),0,20,'C');
                //creo la pagina relacionada a la carta garantia de gnp
                $pdf->AddPage();
                //agrego la imagen de fondo
                $pdf->Image('../vista/img/carta_garantia_gnp.jpg', 0, 0, 0, 269); 
                //selecciono el tipo tamaño y color de letra
                $pdf->SetFont('Arial','B',12);
                //doy posiciones x y y de los elementos como en un plano cartesiano
                $pdf->setXY(30,49);
                $pdf->Cell(20,10,utf8_decode($marca),0,20,'C');
                $pdf->setXY(65,49);
                $pdf->Cell(20,10,utf8_decode($modelo),0,20,'C');
                $pdf->setXY(20,53);
                $pdf->Cell(20,10,utf8_decode($nombre),0,20,'C');
                $pdf->setXY(165,31.5);
                $pdf->Cell(20,10,utf8_decode($expediente),0,20,'C');
                $pdf->setXY(128,44.5);
                $pdf->Cell(20,10,utf8_decode($expediente),0,20,'C');
                $pdf->setXY(122,48.8);
                $pdf->Cell(20,10,utf8_decode($placas),0,20,'C');
                //creo la pagina relacionada al finiquito de gnp
                $pdf->AddPage();
                //agrego la imagen de fondo
                $pdf->Image('../vista/img/finiquito_gnp.jpg', 0, 0, 0, 269); 
                //selecciono el tipo tamaño y color de letra
                $pdf->SetFont('Arial','B',12);
                //doy posiciones x y y de los elementos como en un plano cartesiano
                $pdf->setXY(100,117);
                $pdf->Cell(20,10,utf8_decode($nombre),0,20,'C');
                $pdf->setXY(160,126);
                $pdf->Cell(20,10,utf8_decode($tel),0,20,'C');
                //agrego la boleta de salida
                $pdf->AddPage('L');
                //agrego la imagen de fondo
                $pdf->Image('../vista/img/Boleta_de_salida.jpg', 10, 2, 0, 208);
                //agrego los datos de la boleta de salida
                //saco la fecha del dia hoy completa
                $hoy = date('d/m/Y');
                $pdf->setXY(175,30);
                $pdf->Cell(20,10,utf8_decode($hoy),0,20,'C');
                $pdf->setXY(242.8,30);
                $pdf->Cell(20,10,utf8_decode($expediente),0,20,'C');
                $pdf->setXY(100,51);
                $pdf->Cell(20,10,utf8_decode($nombre),0,20,'C');
                $pdf->setXY(243,52);
                $pdf->Cell(20,10,utf8_decode($tel),0,20,'C');
                $pdf->setXY(70,70);
                $vehiculo_completo = $marca.' '.$linea;
                $pdf->Cell(20,10,utf8_decode($vehiculo_completo),0,20,'C');
                $pdf->setXY(172,70);
                $pdf->Cell(20,10,utf8_decode($modelo),0,20,'C');
                $pdf->setXY(256,70);
                $pdf->Cell(20,10,utf8_decode($color),0,20,'C');
                $pdf->setXY(125,120);
                $pdf->Cell(20,10,utf8_decode($correo),0,20,'C');
                $pdf->setXY(230,121);
                $pdf->Cell(20,10,utf8_decode($nombreAsesor),0,20,'C');
                $pdf->setXY(53,135);
                $pdf->Cell(20,10,utf8_decode($aseguradora),0,20,'C');
                //creo el pdf y lo mando
                $pdf->Output();
                break;
            case 'QUALITAS':
                //creo el libro de pdf
                $pdf = new FPDF();
                //agrego la nueva pagina de la encuesta de QUALITAS
                $pdf->AddPage();
                //agrego la imagen de fondo
                $pdf->Image('../vista/img/encuesta_qualitas.jpg', -11, 0, 0, 300);
                //selecciono el tipo tamaño y color de letra
                $pdf->SetFont('Arial','B',12);
                //agrego los datos para la encuesta
                $pdf->setXY(82,63);
                $pdf->Cell(20,10,utf8_decode('DTR Integral Automotriz'),0,20,'C');
                $pdf->setXY(156,62.5);
                $pdf->Cell(20,10,utf8_decode($siniestro),0,20,'C');
                $pdf->setXY(82,67);
                $pdf->Cell(20,10,utf8_decode($nombre),0,20,'C');
                $pdf->setXY(82,71.29);
                $pdf->Cell(20,10,utf8_decode($tel),0,20,'C');
                $pdf->setXY(130,254);
                $pdf->Cell(20,10,utf8_decode($correo),0,20,'C');

                //agrego la boleta de salida
                $pdf->AddPage('L');
                //agrego la imagen de fondo
                $pdf->Image('../vista/img/Boleta_de_salida.jpg', 10, 2, 0, 208);
                //selecciono el tipo tamaño y color de letra
                $pdf->SetFont('Arial','B',12);
                //agrego los datos de la boleta de salida
                //saco la fecha del dia hoy completa
                $hoy = date('d/m/Y');
                $pdf->setXY(175,30);
                $pdf->Cell(20,10,utf8_decode($hoy),0,20,'C');
                $pdf->setXY(242.8,30);
                $pdf->Cell(20,10,utf8_decode($expediente),0,20,'C');
                $pdf->setXY(100,51);
                $pdf->Cell(20,10,utf8_decode($nombre),0,20,'C');
                $pdf->setXY(243,52);
                $pdf->Cell(20,10,utf8_decode($tel),0,20,'C');
                $pdf->setXY(70,70);
                $vehiculo_completo = $marca.' '.$linea;
                $pdf->Cell(20,10,utf8_decode($vehiculo_completo),0,20,'C');
                $pdf->setXY(172,70);
                $pdf->Cell(20,10,utf8_decode($modelo),0,20,'C');
                $pdf->setXY(256,70);
                $pdf->Cell(20,10,utf8_decode($color),0,20,'C');
                $pdf->setXY(125,120);
                $pdf->Cell(20,10,utf8_decode($correo),0,20,'C');
                $pdf->setXY(230,121);
                $pdf->Cell(20,10,utf8_decode($nombreAsesor),0,20,'C');
                $pdf->setXY(53,135);
                $pdf->Cell(20,10,utf8_decode($aseguradora),0,20,'C');
                //creo el pdf y lo mando
                $pdf->Output();
                break;
            case 'Particular':
                //creo el libro de pdf
                $pdf = new FPDF();
                //agrego la boleta de salida
                $pdf->AddPage('L');
                //agrego la imagen de fondo
                $pdf->Image('../vista/img/Boleta_de_salida.jpg', 10, 2, 0, 208);
                //selecciono el tipo tamaño y color de letra
                $pdf->SetFont('Arial','B',12);
                //agrego los datos de la boleta de salida
                //saco la fecha del dia hoy completa
                $hoy = date('d/m/Y');
                $pdf->setXY(175,30);
                $pdf->Cell(20,10,utf8_decode($hoy),0,20,'C');
                $pdf->setXY(242.8,30);
                $pdf->Cell(20,10,utf8_decode($expediente),0,20,'C');
                $pdf->setXY(100,51);
                $pdf->Cell(20,10,utf8_decode($nombre),0,20,'C');
                $pdf->setXY(243,52);
                $pdf->Cell(20,10,utf8_decode($tel),0,20,'C');
                $pdf->setXY(70,70);
                $vehiculo_completo = $marca.' '.$linea;
                $pdf->Cell(20,10,utf8_decode($vehiculo_completo),0,20,'C');
                $pdf->setXY(172,70);
                $pdf->Cell(20,10,utf8_decode($modelo),0,20,'C');
                $pdf->setXY(256,70);
                $pdf->Cell(20,10,utf8_decode($color),0,20,'C');
                $pdf->setXY(125,120);
                $pdf->Cell(20,10,utf8_decode($correo),0,20,'C');
                $pdf->setXY(230,121);
                $pdf->Cell(20,10,utf8_decode($nombreAsesor),0,20,'C');
                $pdf->setXY(53,135);
                $pdf->Cell(20,10,utf8_decode($aseguradora),0,20,'C');
                //creo el pdf y lo mando
                $pdf->Output();
                break;
            case 'HDI':
                //creo el libro de pdf
                $pdf = new FPDF();
                //agrego la boleta de salida
                $pdf->AddPage('L');
                //agrego la imagen de fondo
                $pdf->Image('../vista/img/Boleta_de_salida.jpg', 10, 2, 0, 208);
                //selecciono el tipo tamaño y color de letra
                $pdf->SetFont('Arial','B',12);
                //agrego los datos de la boleta de salida
                //saco la fecha del dia hoy completa
                $hoy = date('d/m/Y');
                $pdf->setXY(175,30);
                $pdf->Cell(20,10,utf8_decode($hoy),0,20,'C');
                $pdf->setXY(242.8,30);
                $pdf->Cell(20,10,utf8_decode($expediente),0,20,'C');
                $pdf->setXY(100,51);
                $pdf->Cell(20,10,utf8_decode($nombre),0,20,'C');
                $pdf->setXY(243,52);
                $pdf->Cell(20,10,utf8_decode($tel),0,20,'C');
                $pdf->setXY(70,70);
                $vehiculo_completo = $marca.' '.$linea;
                $pdf->Cell(20,10,utf8_decode($vehiculo_completo),0,20,'C');
                $pdf->setXY(172,70);
                $pdf->Cell(20,10,utf8_decode($modelo),0,20,'C');
                $pdf->setXY(256,70);
                $pdf->Cell(20,10,utf8_decode($color),0,20,'C');
                $pdf->setXY(125,120);
                $pdf->Cell(20,10,utf8_decode($correo),0,20,'C');
                $pdf->setXY(230,121);
                $pdf->Cell(20,10,utf8_decode($nombreAsesor),0,20,'C');
                $pdf->setXY(53,135);
                $pdf->Cell(20,10,utf8_decode($aseguradora),0,20,'C');
                //creo el pdf y lo mando
                $pdf->Output();
                break;   
            default:
                echo 'No se pudo generar la documentación, contactar con soporte';
                break;
        }
    }
?>