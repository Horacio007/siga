<?php
    include("class_checklist.php");
    include("class_conexion.php");

    class checklist_dal extends class_db{
        function __construct(){
            parent::__construct();
        }

        function __destruct(){
            parent::__destruct(); // TODO: Change the autogenerated stub
        }

        function exist_checklist($expediente){
            $insert = "SELECT id_aux_vehiculo FROM checklist WHERE id_aux_vehiculo = '$expediente'";

            $this->set_sql($insert);
            $this->db_conn->set_charset('utf8');

            mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));

            if (mysqli_affected_rows($this->db_conn) == 1) {
                $inserted = 1;
            } else {
                $inserted = 0;
            }

            return $inserted;
        }

        function insert_checklist($expediente, $lucesfrontales, $cuartoluces, $direccionalizq, $direccionalder, $espejoder, $espejoizq, $cristales, $emblemas, $llantas, $tapon_ruedas, $molduras, $tapa_gasolina, $stopp, $luz_tras_izq, $luz_tras_der, $direccional_tras_izq, $direccional_tras_der, $luz_placa, $luz_cajuela, $luztablero, $instrumentostablero, $llaves, $limpiaparabrisasfront, $limpiaparabrisastras, $estereo, $bocinasfront, $bocinastras, $encendedor, $espejoretro, $cenicero, $cinturones, $luzinterior, $parasolizq, $parasolder ,$vestidurastela, $vestiduraspiel, $testigostablero, $refaccion, $dadoseguridad, $gato, $maneral, $herramientas, $triangulo, $botiquin, $extintor, $cables, $claxon, $taponaceite, $tapongasolin, $taponradiador, $vayoneta, $bateria, $gasolina, $kilometraje, $observaciones){
            $insert = "INSERT INTO checklist (id_aux_vehiculo, luces_front, cuarto_luces, direccional_izq, direccional_der, espejo_der, espejo_izq, cristales, emblema, llantas, tapon_ruedas, molduras, tapa_gasolina, stopp, luz_tras_izq, luz_tras_der, direccional_tras_izq, direccional_tras_der, luz_placa, luz_cajuela, luz_tablero, instrumentos_tablero, llaves, limpia_parabrisas_fron, limpia_parabrisas_tras, estereo, bocinas_fron, bocinas_tras, encendedor, espejo_retrovisor, cenicero, cinturones, luz_int, parasol_izq, parasol_der, vestiduras_tela, vestiduras_piel, testigos_tablero, refaccion, dado_seguridad, gato, maneral, herramientas, triangulos, botiquin, extintor, cables, claxon, tapon_aceite, tapon_gasolina, tapon_radiador, vayoneta_aceite, bateria, cambustible, kilometraje, observaciones) VALUES (";
            $insert .= "'" . $expediente . "',";
            $insert .= "'" . $lucesfrontales . "',";
            $insert .= "'" . $cuartoluces . "',";
            $insert .= "'" . $direccionalizq . "',";
            $insert .= "'" . $direccionalder . "',";
            $insert .= "'" . $espejoder . "',";
            $insert .= "'" . $espejoizq . "',";
            $insert .= "'" . $cristales . "',";
            $insert .= "'" . $emblemas . "',";
            $insert .= "'" . $llantas . "',";
            $insert .= "'" . $tapon_ruedas . "',";
            $insert .= "'" . $molduras . "',";
            $insert .= "'" . $tapa_gasolina . "',";
            $insert .= "'" . $stopp . "',";
            $insert .= "'" . $luz_tras_izq . "',";
            $insert .= "'" . $luz_tras_der . "',";
            $insert .= "'" . $direccional_tras_izq . "',";
            $insert .= "'" . $direccional_tras_der . "',";
            $insert .= "'" . $luz_placa . "',";
            $insert .= "'" . $luz_cajuela . "',";
            $insert .= "'" . $luztablero . "',";
            $insert .= "'" . $instrumentostablero . "',";
            $insert .= "'" . $llaves . "',";
            $insert .= "'" . $limpiaparabrisasfront . "',";
            $insert .= "'" . $limpiaparabrisastras . "',";
            $insert .= "'" . $estereo . "',";
            $insert .= "'" . $bocinasfront . "',";
            $insert .= "'" . $bocinastras . "',";
            $insert .= "'" . $encendedor . "',";
            $insert .= "'" . $espejoretro . "',";
            $insert .= "'" . $cenicero . "',";
            $insert .= "'" . $cinturones . "',";
            $insert .= "'" . $luzinterior . "',";
            $insert .= "'" . $parasolizq . "',";
            $insert .= "'" . $parasolder . "',";
            $insert .= "'" . $vestidurastela . "',";
            $insert .= "'" . $vestiduraspiel . "',";
            $insert .= "'" . $testigostablero . "',";
            $insert .= "'" . $refaccion . "',";
            $insert .= "'" . $dadoseguridad . "',";
            $insert .= "'" . $gato . "',";
            $insert .= "'" . $maneral . "',";
            $insert .= "'" . $herramientas . "',";
            $insert .= "'" . $triangulo . "',";
            $insert .= "'" . $botiquin . "',";
            $insert .= "'" . $extintor . "',";
            $insert .= "'" . $cables . "',";
            $insert .= "'" . $claxon . "',";
            $insert .= "'" . $taponaceite . "',";
            $insert .= "'" . $tapongasolin . "',";
            $insert .= "'" . $taponradiador . "',";
            $insert .= "'" . $vayoneta . "',";
            $insert .= "'" . $bateria . "',";
            $insert .= "'" . $gasolina . "',";
            $insert .= "'" . $kilometraje . "',";
            $insert .= "'" . $observaciones . "')";

            //echo $insert;

            $this->set_sql($insert);
            $this->db_conn->set_charset('utf8');

            mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));

            if (mysqli_affected_rows($this->db_conn) == 1) {
                $inserted = 1;
            } else {
                $inserted = 0;
            }

            return $inserted;

        }

        function select_data($id){
            $record = "SELECT * FROM checklist WHERE id_aux_vehiculo = '$id'";
            $this->set_sql($record);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new checklist();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setId($row["id"]);
                $object->setIdAux($row['id_aux_vehiculo']);
                $object->setLucesFront($row['luces_front']);
                $object->setCuartoLuces($row['cuarto_luces']);
                $object->setDireccionalIzq($row['direccional_izq']);
                $object->setDireccionalDer($row['direccional_der']);
                $object->setEspejoDer($row['espejo_der']);
                $object->setEspejoIzq($row['espejo_izq']);
                $object->setCristales($row['cristales']);
                $object->setEmblema($row['emblema']);
                $object->setLantas($row['llantas']);
                $object->setTaponRuedas($row['tapon_ruedas']);
                $object->setMolduras($row['molduras']);
                $object->setTapaGasolina($row['tapa_gasolina']);
                $object->setStop($row['stopp']);
                $object->setLuzTrasIzq($row['luz_tras_izq']);
                $object->setLuzTrasDer($row['luz_tras_der']);
                $object->setDireccionalTrasIzq($row['direccional_tras_izq']);
                $object->setDireccionalTrasDer($row['direccional_tras_der']);
                $object->setLuzPlaca($row['luz_placa']);
                $object->setLuzCajuela($row['luz_cajuela']);
                $object->setLuzTablero($row['luz_tablero']);
                $object->setInstrumentosTablero($row['instrumentos_tablero']);
                $object->setLlaves($row['llaves']);
                $object->setLimpiaParabrisasFrontal($row['limpia_parabrisas_fron']);
                $object->setLimpiaParabrisasTrasero($row['limpia_parabrisas_tras']);
                $object->setEstereo($row['estereo']);
                $object->setBocinasFrontales($row['bocinas_fron']);
                $object->setBocinasTraseras($row['bocinas_tras']);
                $object->setEncendedor($row['encendedor']);
                $object->setEspejoRetrovisor($row['espejo_retrovisor']);
                $object->setCenicero($row['cenicero']);
                $object->setCinturones($row['cinturones']);
                $object->setLuzInt($row['luz_int']);
                $object->setParasolIzq($row['parasol_izq']);
                $object->setParasolDer($row['parasol_der']);
                $object->setVestidurasTela($row['vestiduras_tela']);
                $object->setVestidurasPiel($row['vestiduras_piel']);
                $object->setTestigosTablero($row['testigos_tablero']);
                $object->setRefaccion($row['refaccion']);
                $object->setDadoSeguridad($row['dado_seguridad']);
                $object->setGato($row['gato']);
                $object->setManeral($row['maneral']);
                $object->setHerramientas($row['herramientas']);
                $object->setTriangulos($row['triangulos']);
                $object->setBotiquin($row['botiquin']);
                $object->setExtintor($row['extintor']);
                $object->setCables($row['cables']);
                $object->setClaxon($row['claxon']);
                $object->setTaponAceite($row['tapon_aceite']);
                $object->setTaponGasolina($row['tapon_gasolina']);
                $object->setTaponRadiador($row['tapon_radiador']);
                $object->setVayonetaAceite($row['vayoneta_aceite']);
                $object->setBateria($row['bateria']);
                $object->setCombustible($row['cambustible']);
                $object->setKilometraje($row['kilometraje']);
                $object->setObservaciones($row['observaciones']);
                $object->setFirma($row['ruta']);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }
    }
?>