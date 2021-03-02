<?php

    include('../modelo/class_checklist_dal.php');

    if (isset($_POST['expediente']) && isset($_POST['lucesfrontales']) && isset($_POST['cuartoluces']) && isset($_POST['direccionalizq']) && isset($_POST['direccionalder']) && isset($_POST['espejoder']) && isset($_POST['espejoizq']) && isset($_POST['cristales']) && isset($_POST['emblemas']) && isset($_POST['llantas']) && isset($_POST['tapon_ruedas']) && isset($_POST['molduras']) && isset($_POST['tapa_gasolina']) && isset($_POST['stop']) && isset($_POST['luz_tras_izq']) && isset($_POST['luz_tras_der']) && isset($_POST['direccional_tras_izq']) && isset($_POST['direccional_tras_der']) && isset($_POST['luz_placa']) && isset($_POST['luz_cajuela']) && isset($_POST['luztablero']) && isset($_POST['instrumentostablero']) && isset($_POST['llaves']) && isset($_POST['limpiaparabrisasfront']) && isset($_POST['limpiaparabrisastras']) && isset($_POST['estereo']) && isset($_POST['bocinasfront']) && isset($_POST['bocinastras']) && isset($_POST['encendedor']) && isset($_POST['espejoretro']) && isset($_POST['cenicero']) && isset($_POST['cinturones']) && isset($_POST['luzinterior']) && isset($_POST['parasolizq']) && isset($_POST['parasolder']) && isset($_POST['vestidurastela']) && isset($_POST['vestiduraspiel']) && isset($_POST['testigostablero']) && isset($_POST['refaccion']) && isset($_POST['dadoseguridad']) && isset($_POST['gato']) && isset($_POST['maneral']) && isset($_POST['herramientas']) && isset($_POST['triangulo']) && isset($_POST['botiquin']) && isset($_POST['extintor']) && isset($_POST['cables']) && isset($_POST['claxon']) && isset($_POST['taponaceite']) && isset($_POST['tapongasolin']) && isset($_POST['taponradiador']) && isset($_POST['vayoneta']) && isset($_POST['bateria']) && isset($_POST['gasolina']) && isset($_POST['kilometraje']) && isset($_POST['observaciones'])) {
        
        $objeto = new checklist_dal();

        if ($objeto->exist_checklist($_POST['expediente']) == 1) {
            echo 'Ya existe un checklist para este vehiculo';
        } else {
            $expediente = $_POST['expediente'];
            $lucesfrontales = $_POST['lucesfrontales'];
            $cuartoluces = $_POST['cuartoluces'];
            $direccionalizq = $_POST['direccionalizq'];
            $direccionalder = $_POST['direccionalder'];
            $espejoder = $_POST['espejoder'];
            $espejoizq = $_POST['espejoizq'];
            $cristales = $_POST['cristales'];
            $emblemas = $_POST['emblemas'];
            $llantas = $_POST['llantas'];
            $tapon_ruedas = $_POST['tapon_ruedas'];
            $molduras = $_POST['molduras'];
            $tapa_gasolina = $_POST['tapa_gasolina'];
            $stopp = $_POST['stop'];
            $luz_tras_izq = $_POST['luz_tras_izq'];
            $luz_tras_der = $_POST['luz_tras_der'];
            $direccional_tras_izq = $_POST['direccional_tras_izq'];
            $direccional_tras_der = $_POST['direccional_tras_der'];
            $luz_placa = $_POST['luz_placa'];
            $luz_cajuela = $_POST['luz_cajuela'];
            $luztablero = $_POST['luztablero'];
            $instrumentostablero = $_POST['instrumentostablero'];
            $llaves = $_POST['llaves'];
            $limpiaparabrisasfront = $_POST['limpiaparabrisasfront'];
            $limpiaparabrisastras = $_POST['limpiaparabrisastras'];
            $estereo = $_POST['estereo'];
            $bocinasfront = $_POST['bocinasfront'];
            $bocinastras = $_POST['bocinastras'];
            $encendedor = $_POST['encendedor'];
            $espejoretro = $_POST['espejoretro'];
            $cenicero = $_POST['cenicero'];
            $cinturones = $_POST['cinturones'];
            $luzinterior = $_POST['luzinterior'];
            $parasolizq = $_POST['parasolizq'];
            $parasolder = $_POST['parasolder'];
            $vestidurastela = $_POST['vestidurastela'];
            $vestiduraspiel = $_POST['vestiduraspiel'];
            $testigostablero = $_POST['testigostablero'];
            $refaccion = $_POST['refaccion'];
            $dadoseguridad = $_POST['dadoseguridad'];
            $gato = $_POST['gato'];
            $maneral = $_POST['maneral'];
            $herramientas = $_POST['herramientas'];
            $triangulo = $_POST['triangulo'];
            $botiquin = $_POST['botiquin'];
            $extintor = $_POST['extintor'];
            $cables = $_POST['cables'];
            $claxon = $_POST['claxon'];
            $taponaceite = $_POST['taponaceite'];
            $tapongasolin = $_POST['tapongasolin'];
            $taponradiador = $_POST['taponradiador'];
            $vayoneta = $_POST['vayoneta'];
            $bateria = $_POST['bateria'];
            $gasolina = $_POST['gasolina'];
            $kilometraje = $_POST['kilometraje'];
            $observaciones = $_POST['observaciones'];

            $resultado = $objeto->insert_checklist($expediente, $lucesfrontales, $cuartoluces, $direccionalizq, $direccionalder, $espejoder, $espejoizq, $cristales, $emblemas, $llantas, $tapon_ruedas, $molduras, $tapa_gasolina, $stopp, $luz_tras_izq, $luz_tras_der, $direccional_tras_izq, $direccional_tras_der, $luz_placa, $luz_cajuela, $luztablero, $instrumentostablero, $llaves, $limpiaparabrisasfront, $limpiaparabrisastras, $estereo, $bocinasfront, $bocinastras, $encendedor, $espejoretro, $cenicero, $cinturones, $luzinterior, $parasolizq, $parasolder ,$vestidurastela, $vestiduraspiel, $testigostablero, $refaccion, $dadoseguridad, $gato, $maneral, $herramientas, $triangulo, $botiquin, $extintor, $cables, $claxon, $taponaceite, $tapongasolin, $taponradiador, $vayoneta, $bateria, $gasolina, $kilometraje, $observaciones);

            echo $resultado;
        }
    }
?>