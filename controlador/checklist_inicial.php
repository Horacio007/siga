<?php
    require("../vista/libs/fpdf/fpdf.php");
    include("../modelo/class_vehiculo_dal.php");
    include("../modelo/class_cliente_dal.php");
    include("../modelo/class_checklist_dal.php");

    //obtengo la informacion del vehiculo
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $objv = new vehiculo_dal();
        $objch = new checklist_dal();

        $exv = $objv->exist_vehiculo($id);
        $exvch = $objch->exist_checklist($id);

        if ($exv == 1 && $exvch == 1) {
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
            //obtendre la informacion correpsondiente del checklist
            $objeto3 = new checklist_dal();
            $resultado3 = $objeto3->select_data($expediente);

            foreach ($resultado3 as $key => $value) {
                $lucesfrontales = $value->getLucesFront();
                $cuartoluces = $value->getCuartoLuces();
                $direccionalizq = $value->getDireccionalIzq();
                $direccionalder = $value->getDireccionalDer();
                $espejoder = $value->getEspejoDer();
                $espejoizq = $value->getEspejoIzq();
                $cristales = $value->getCristales();
                $emblemas = $value->getEmblema();
                $llantas = $value->getLlantas();
                $taponruedas = $value->getTaponRuedas();
                $molduras = $value->getMolduras();
                $tapagasolina = $value->getTapaGasolina();
                $stop = $value->getStop();
                $luztrasizq = $value->getLuzTrasIzq();
                $luztrasder = $value->getLuzTrasDer();
                $direccionaltrasizq = $value->getDireccionalTrasIzq();
                $direccionaltrasder = $value->getDireccionalTrasDer();
                $luzplaca = $value->getLuzPlaca();
                $luzcajuela = $value->getLuzCajuela();
                $luztablero = $value->getLuzTablero();
                $instrumentostablero = $value->getInstrumentosTablero();
                $llaves = $value->getLlaves();
                $limpiaparabrisasfron = $value->getLimpiaParabrisasFrontal();
                $limpiaparabrisastras = $value->getLimpiaParabrisasTrasero();
                $estereo = $value->getEstereo();
                $bocinasfron = $value->getBocinasFrontales();
                $bocinastras = $value->getBocinasTraseras();
                $encendedor = $value->getEncendedor();
                $espejoretro = $value->getEspejoRetrovisor();
                $cenicero = $value->getCenicero();
                $cinturones = $value->getCinturones();
                $luzinterior = $value->getLuzInt();
                $parasolizq = $value->getParasolIzq();
                $parasolder = $value->getParasolDer();
                $vestidurastela = $value->getVestidurasTela();
                $vestiduraspiel = $value->getVestidurasPiel();
                $testigostablero = $value->getTestigosTablero();
                $refaccion = $value->getRefaccion();
                $dadoseguridad = $value->getDadoSeguridad();
                $gato = $value->getGato();
                $maneral = $value->getManeral();
                $herramientas = $value->getHerramientas();
                $triangulos = $value->getTriangulos();
                $botiquin = $value->getBotiquin();
                $extintor = $value->getExtintor();
                $cables = $value->getCables();
                $claxon = $value->getClaxon();
                $taponaceite = $value->getTaponAceite();
                $tapongasolina = $value->getTaponGasolina();
                $taponradiador = $value->getTaponRadiador();
                $vayoneta = $value->getVayonetaAceite();
                $bateria = $value->getBateria();
                $combustible = $value->getCombustible();
                $kilometraje = $value->getKilometraje();
                $observaciones = $value->getObservaciones();
                $ruta = $value->getFirma();
        
            }
            /*
            // voy a validar que ambos id esten iguales y si no lo estan que se actyualize el id del vehiculo con el del ultimo cliente
            $resultadoidv = $objeto->get_idCliente($id);
            $resultadoidc = $objeto2->ultimo_registro();

            foreach ($resultadoidv as $key => $value) {
                $id_cliente = $value->getIdCliente();
            }

            foreach ($resultadoidc as $key => $value) {
                $id_clienteC = $value->getId();
            }

            if ($id_cliente!=$id_clienteC) {
                $updateid = $objeto->update_idcliente($id, $id_clienteC);
            }
            */
            //creo el libro de pdf
            $pdf = new FPDF();
            //agrego una nueva pagina
            $pdf->AddPage();
            //agrego la imagen de fondo
            $pdf->Image('../vista/img/checklist.jpg', -10, -7, 0, 300);
            //selecciono el tipo tamaño y color de letra
            $pdf->SetFont('Arial','B',10);
            //doy posiciones x y y de los elementos como en un plano cartesiano
            $pdf->setXY(29,42);
            $pdf->Cell(20,10,utf8_decode($nombre),0,20,'I');
            $pdf->setXY(31,50);
            $pdf->Cell(20,10,utf8_decode($tel),0,20,'I');
            $pdf->setXY(29,58);
            $pdf->Cell(20,10,utf8_decode($correo),0,20,'I');
            $pdf->setXY(170,2);
            $pdf->Cell(20,10,utf8_decode($expediente),0,20,'I');
            $pdf->setXY(165,21.5);
            $pdf->Cell(20,10,utf8_decode($dia),0,20,'I');
            $pdf->setXY(177.5,21.5);
            $pdf->Cell(20,10,utf8_decode($mes),0,20,'I');
            $pdf->setXY(192.5,21.5);
            $pdf->Cell(20,10,utf8_decode($año),0,20,'I');
            if ($aseguradora != 'Particular') {
                $pdf->setXY(170,46);
                $pdf->Cell(20,10,utf8_decode($aseguradora),0,20,'C');
            } else {
                $pdf->setXY(169,58);
                $pdf->Cell(20,10,utf8_decode('X'),0,20,'C');
            }
            $pdf->setXY(111,41);
            $pdf->Cell(20,10,utf8_decode($marca),0,20,'C');
            $pdf->setXY(111,49);
            $pdf->Cell(20,10,utf8_decode($linea),0,20,'C');
            $pdf->setXY(112,57);
            $pdf->Cell(20,10,utf8_decode($modelo),0,20,'C');
            $pdf->setXY(114,65);
            $pdf->Cell(20,10,utf8_decode($color),0,20,'C');
            $pdf->setXY(110 ,73);
            $pdf->Cell(20,10,utf8_decode($placas),0,20,'C');
            //agrego toda la informacion referente al checklist
            if ($lucesfrontales == 1) {
                $pdf->setXY(41 ,123);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            } else {
                $pdf->setXY(47 ,123);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            }
            if ($cuartoluces == 1) {
                $pdf->setXY(41 ,128.5);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            } else {
                $pdf->setXY(47 ,128.5);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            }
            if ($direccionalizq == 1) {
                $pdf->setXY(41 ,133.5);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            } else {
                $pdf->setXY(47 ,133.5);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            }
            if ($direccionalder == 1) {
                $pdf->setXY(41 ,138.5);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            } else {
                $pdf->setXY(47 ,138.5);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            }
            if ($espejoder == 1) {
                $pdf->setXY(41 ,143.5);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            } else {
                $pdf->setXY(47 ,143.5);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            }
            if ($espejoizq == 1) {
                $pdf->setXY(40.8 ,148.5);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            } else {
                $pdf->setXY(46.8 ,148.5);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            }
            if ($cristales == 1) {
                $pdf->setXY(41 ,153.8);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            } else {
                $pdf->setXY(47 ,153.8);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            }
            if ($emblemas == 1) {
                $pdf->setXY(41 ,159.5);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            } else {
                $pdf->setXY(47 ,159.5);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            }
            if ($llantas == 1) {
                $pdf->setXY(41 ,164.5);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            } else {
                $pdf->setXY(47 ,164.5);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            }
            if ($taponruedas == 1) {
                $pdf->setXY(41 ,169.5);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            } else {
                $pdf->setXY(47 ,169.5);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            }
            if ($molduras == 1) {
                $pdf->setXY(40.5 ,174.5);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            } else {
                $pdf->setXY(46.5 ,174.5);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            }
            if ($tapagasolina == 1) {
                $pdf->setXY(40.5 ,179.5);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            } else {
                $pdf->setXY(46.5 ,179.5);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            }
            if ($stop == 1) {
                $pdf->setXY(40.5 ,184.8);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            } else {
                $pdf->setXY(46.5 ,184.8);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            }
            if ($luztrasizq == 1) {
                $pdf->setXY(40.5 ,189.9);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            } else {
                $pdf->setXY(46.5 ,189.9);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            }
            if ($luztrasder == 1) {
                $pdf->setXY(40.5 ,195.5);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            } else {
                $pdf->setXY(46.5 ,195.5);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            }
            if ($direccionaltrasizq == 1) {
                $pdf->setXY(40.5 ,200.5);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            } else {
                $pdf->setXY(46.5 ,200.5);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            }
            if ($direccionaltrasder == 1) {
                $pdf->setXY(40.5 ,205.5);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            } else {
                $pdf->setXY(46.5 ,205.5);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            }
            if ($luzplaca == 1) {
                $pdf->setXY(40.5 ,210.5);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            } else {
                $pdf->setXY(46.5 ,210.5);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            }
            if ($luzcajuela == 1) {
                $pdf->setXY(40.5 ,215.5);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            } else {
                $pdf->setXY(46.5 ,215.5);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            }
            if ($luztablero == 1) {
                $pdf->setXY(102 ,123.5);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            } else {
                $pdf->setXY(109 ,123.5);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            }
            if ($instrumentostablero == 1) {
                $pdf->setXY(102 ,128.5);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            } else {
                $pdf->setXY(107 ,128.5);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            }
            if ($llaves == 1) {
                $pdf->setXY(102 ,133.8);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            } else {
                $pdf->setXY(109 ,133.8);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            }
            if ($limpiaparabrisasfron == 1) {
                $pdf->setXY(102 ,139.8);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            } else {
                $pdf->setXY(109 ,139.8);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            }
            if ($limpiaparabrisastras == 1) {
                $pdf->setXY(102 ,144.8);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            } else {
                $pdf->setXY(109 ,144.8);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            }
            if ($estereo == 1) {
                $pdf->setXY(102 ,149.8);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            } else {
                $pdf->setXY(109 ,149.8);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            }
            if ($bocinasfron == 1) {
                $pdf->setXY(102 ,155);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            } else {
                $pdf->setXY(109 ,155);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            }
            if ($bocinastras == 1) {
                $pdf->setXY(102 ,160);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            } else {
                $pdf->setXY(109 ,160);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            }
            if ($encendedor == 1) {
                $pdf->setXY(102 ,165.5);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            } else {
                $pdf->setXY(109 ,165.5);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            }
            if ($espejoretro == 1) {
                $pdf->setXY(102 ,170.5);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            } else {
                $pdf->setXY(109 ,170.5);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            }
            if ($cenicero == 1) {
                $pdf->setXY(102 ,175.5);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            } else {
                $pdf->setXY(109 ,175.5);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            }
            if ($cinturones == 1) {
                $pdf->setXY(102 ,180.5);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            } else {
                $pdf->setXY(109 ,180.5);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            }
            if ($luzinterior == 1) {
                $pdf->setXY(102 ,186);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            } else {
                $pdf->setXY(109 ,186);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            }
            if ($parasolizq == 1) {
                $pdf->setXY(102 ,191);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            } else {
                $pdf->setXY(109 ,191);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            }
            if ($parasolder == 1) {
                $pdf->setXY(102 ,196);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            } else {
                $pdf->setXY(109 ,196);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            }
            if ($vestidurastela == 1) {
                $pdf->setXY(101.5 ,201);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            } else {
                $pdf->setXY(108.5 ,201);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            }
            if ($vestiduraspiel == 1) {
                $pdf->setXY(102 ,206.5);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            } else {
                $pdf->setXY(109 ,206.5);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            }
            if ($testigostablero == 1) {
                $pdf->setXY(101.5 ,211.5);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            } else {
                $pdf->setXY(108.5 ,211.5);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            }
            if ($refaccion == 1) {
                $pdf->setXY(162.5 ,125.5);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            } else {
                $pdf->setXY(168.5 ,125.5);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            }
            if ($dadoseguridad == 1) {
                $pdf->setXY(162.5 ,131);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            } else {
                $pdf->setXY(168.5 ,131);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            }
            if ($gato == 1) {
                $pdf->setXY(162.5 ,137);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            } else {
                $pdf->setXY(168.5 ,137);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            }
            if ($maneral == 1) {
                $pdf->setXY(162.5 ,142);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            } else {
                $pdf->setXY(168.5 ,142);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            }
            if ($herramientas == 1) {
                $pdf->setXY(162.5 ,148);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            } else {
                $pdf->setXY(168.5 ,148);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            }
            if ($triangulos == 1) {
                $pdf->setXY(162 ,154);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            } else {
                $pdf->setXY(167 ,154);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            }
            if ($botiquin == 1) {
                $pdf->setXY(162 ,160);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            } else {
                $pdf->setXY(169 ,160);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            }
            if ($extintor == 1) {
                $pdf->setXY(162 ,166);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            } else {
                $pdf->setXY(167 ,166);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            }
            if ($cables == 1) {
                $pdf->setXY(163 ,171);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            } else {
                $pdf->setXY(168 ,171);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            }
            if ($claxon == 1) {
                $pdf->setXY(166 ,184);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            } else {
                $pdf->setXY(171 ,184);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            }
            if ($taponaceite == 1) {
                $pdf->setXY(166 ,189);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            } else {
                $pdf->setXY(173 ,189);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            }
            if ($tapongasolina == 1) {
                $pdf->setXY(166 ,194);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            } else {
                $pdf->setXY(171 ,194);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            }
            if ($taponradiador == 1) {
                $pdf->setXY(166 ,200);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            } else {
                $pdf->setXY(173 ,200);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            }
            if ($vayoneta == 1) {
                $pdf->setXY(166 ,205);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            } else {
                $pdf->setXY(171 ,205);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            }
            if ($bateria == 1) {
                $pdf->setXY(166 ,210);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            } else {
                $pdf->setXY(172 ,210);
                $pdf->Cell(20,10,utf8_decode('x'),0,20,'C');
            }
            switch ($combustible) {
                case 1:
                    $pdf->setXY(156 ,224);
                    $pdf->Cell(20,10,utf8_decode('|'),0,20,'C');
                    break;
                case 2:
                    $pdf->setXY(164 ,226.5);
                    $pdf->Cell(20,10,utf8_decode('|'),0,20,'C');
                    break;
                case 3:
                    $pdf->setXY(173.7 ,227.5);
                    $pdf->Cell(20,10,utf8_decode('|'),0,20,'C');
                    break;
                case 4:
                    $pdf->setXY(183.5 ,227);
                    $pdf->Cell(20,10,utf8_decode('|'),0,20,'C');
                    break;
                case 5:
                    $pdf->setXY(193 ,225);
                    $pdf->Cell(20,10,utf8_decode('|'),0,20,'C');
                    break;
                
                default:
                    echo "No tiene combustible";
                    break;
            }
            $pdf->setXY(177 ,262.5);
            $pdf->Cell(20,10,utf8_decode($kilometraje),0,20,'C');
            strlen($observaciones);
            $observaciones = explode('/', $observaciones);
            $y = 227.5;
            for ($i=0; $i < count($observaciones); $i++) {
                $pdf->setXY(7 ,$y);
                $pdf->Cell(20,10,utf8_decode($observaciones[$i]),0,20,'I');
                $y = $y+5;
            }
            /*
            $pdf->setXY(7 ,227.5);
            $pdf->Cell(20,10,utf8_decode($observaciones[0]),0,20,'I');
            */
            $pdf->setXY(7 ,228.5);
            $pdf->Cell(20,10,utf8_decode(''),0,20,'I');
            
            //creo y mando el pdf
            $pdf->Output();
        } else {
            echo 'Primero debes crear el Checklist';
        }
        
    }
?>