<?php

    class checklist{
        private $id;
        private $id_aux_vehiculo;
        private $luces_front;
        private $cuarto_luces;
        private $direccional_izq;
        private $direccional_der;
        private $espejo_der;
        private $espejo_izq;
        private $cristales;
        private $emblema;
        private $llantas;
        private $tapon_ruedas;
        private $molduras;
        private $tapa_gasolina;
        private $stop;
        private $luz_tras_izq;
        private $luz_tras_der;
        private $direccional_tras_izq;
        private $direccional_tras_der;
        private $luz_placa;
        private $luz_cajuela;
        private $luz_tablero;
        private $instrumentos_tablero;
        private $llaves;
        private $limpia_parabrisas_fron;
        private $limpia_parabrisas_tras;
        private $estereo;
        private $bocinas_fron;
        private $bocinas_tras;
        private $encendedor;
        private $espejo_retrovisor;
        private $cenicero;
        private $cinturones;
        private $luz_int;
        private $parasol_izq;
        private $parasol_der;
        private $vestiduras_tela;
        private $vestiduras_piel;
        private $testigos_tablero;
        private $refaccion;
        private $dado_seguridad;
        private $gato;
        private $maneral;
        private $herramientas;
        private $triangulos;
        private $botiquin;
        private $extintor;
        private $cables;
        private $claxon;
        private $tapon_aceite;
        private $tapon_gasolina;
        private $tapon_radiador;
        private $vayoneta_aceite;
        private $bateria;
        private $combustible;
        private $kilometraje;
        private $observaciones;
        private $firma;

        public function __construct($id = NULL, $id_aux_vehiculo = NULL, $luces_front = NULL, $cuarto_luces = NULL, $direccional_izq =  NULL, $direccional_der = NULL, $espejo_der = NULL, $espejo_izq = NULL, $cristales = NULL, $emblema = NULL, $llantas = NULL, $tapon_ruedas = NULL, $molduras = NULL, $tapa_gasolina = NULL, $stop = NULL, $luz_tras_izq = NULL, $luz_tras_der = NULL, $direccional_tras_izq = NULL, $direccional_tras_der = NULL,$luz_placa = NULL, $luz_cajuela = NULL, $luz_tablero = NULL, $instrumentos_tablero = NULL, $llaves = NULL, $limpia_parabrisas_fron = NULL, $limpia_parabrisas_tras = NULL, $estereo = NULL, $bocinas_fron = NULL, $bocinas_tras = NULL, $encendedor = NULL, $espejo_retrovisor = NULL, $cenicero = NULL, $cinturones = NULL, $luz_int = NULL, $parasol_izq = NULL, $parasol_der = NULL, $vestiduras_tela = NULL, $vestiduras_piel = NULL, $testigos_tablero = NULL, $refaccion = NULL, $dado_seguridad = NULL, $gato = NULL, $maneral = NULL, $herramientas = NULL, $triangulos = NULL, $botiquin = NULL, $extintor = NULL, $cables = NULL, $claxon = NULL, $tapon_aceite = NULL, $tapon_gasolina = NULL, $tapon_radiador = NULL, $vayoneta_aceite = NULL, $bateria = NULL, $combustible = NULL, $kilometraje = NULL, $observaciones = NULL, $firma = NULL){
            $this->id = $id;
            $this->id_aux_vehiculo = $id_aux_vehiculo;
            $this->luces_front = $luces_front;
            $this->cuarto_luces = $cuarto_luces;
            $this->direccional_izq = $direccional_izq;
            $this->direccional_der = $direccional_der;
            $this->espejo_der = $espejo_der;
            $this->espejo_izq = $espejo_izq;
            $this->cristales = $cristales;
            $this->emblema = $emblema;
            $this->llantas = $llantas;
            $this->tapon_ruedas = $tapon_ruedas;
            $this->molduras = $molduras;
            $this->tapa_gasolina = $tapa_gasolina;
            $this->stop = $stop;
            $this->luz_tras_izq = $luz_tras_izq;
            $this->luz_tras_der = $luz_tras_der;
            $this->direccional_tras_izq = $direccional_tras_izq;
            $this->direccional_tras_der = $direccional_tras_der;
            $this->luz_placa = $luz_placa;
            $this->luz_cajuela = $luz_cajuela;
            $this->luz_tablero = $luz_tablero;
            $this->instrumentos_tablero = $instrumentos_tablero;
            $this->llaves = $llaves;
            $this->limpia_parabrisas_fron = $limpia_parabrisas_fron;
            $this->limpia_parabrisas_tras = $limpia_parabrisas_tras;
            $this->estereo = $estereo;
            $this->bocinas_fron = $bocinas_fron;
            $this->bocinas_tras = $bocinas_tras;
            $this->encendedor = $encendedor;
            $this->espejo_retrovisor = $espejo_retrovisor;
            $this->cenicero = $cenicero;
            $this->cinturones = $cinturones;
            $this->luz_int = $luz_int;
            $this->parasol_izq = $parasol_izq;
            $this->parasol_der = $parasol_der;
            $this->vestiduras_tela = $vestiduras_tela;
            $this->vestiduras_piel = $vestiduras_piel;
            $this->testigos_tablero = $testigos_tablero;
            $this->refaccion = $refaccion;
            $this->dado_seguridad = $dado_seguridad;
            $this->gato = $gato;
            $this->maneral = $maneral;
            $this->herramientas = $herramientas;
            $this->triangulos = $triangulos;
            $this->botiquin = $botiquin;
            $this->extintor = $extintor;
            $this->cables = $cables;
            $this->claxon = $claxon;
            $this->tapon_aceite = $tapon_aceite;
            $this->tapon_gasolina = $tapon_gasolina;
            $this->tapon_radiador = $tapon_radiador;
            $this->vayoneta_aceite = $vayoneta_aceite;
            $this->bateria = $bateria;
            $this->combustible = $combustible;
            $this->kilometraje = $kilometraje;
            $this->observaciones = $observaciones;
            $this->firma = $firma;

        }

        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
        }

        public function getIdAux(){
            return $this->id_aux_vehiculo;
        }

        public function setIdAux($id_aux_vehiculo){
            $this->id_aux_vehiculo = $id_aux_vehiculo;
        }

        public function getLucesFront(){
            return $this->luces_front;
        }

        public function setLucesFront($luces_front){
            $this->luces_front = $luces_front;
        }

        public function getCuartoLuces(){
            return $this->cuarto_luces;
        }

        public function setCuartoLuces($cuarto_luces){
            $this->cuarto_luces = $cuarto_luces;
        }

        public function getDireccionalIzq(){
            return $this->direccional_izq;
        }

        public function setDireccionalIzq($direccional_izq){
            $this->direccional_izq = $direccional_izq;
        }

        public function getDireccionalDer(){
            return $this->direccional_der;
        }

        public function setDireccionalDer($direccional_der){
            $this->direccional_der = $direccional_der;
        }

        public function getEspejoDer(){
            return $this->espejo_der;
        }

        public function setEspejoDer($espejo_der){
            $this->espejo_der = $espejo_der;
        }

        public function getEspejoIzq(){
            return $this->espejo_izq;
        }

        public function setEspejoIzq($espejo_izq){
            $this->espejo_izq = $espejo_izq;
        }

        public function getCristales(){
            return $this->cristales;
        }

        public function setCristales($cristales){
            $this->cristales = $cristales;
        }

        public function getEmblema(){
            return $this->emblema;
        }

        public function setEmblema($emblema){
            $this->emblema = $emblema;
        }

        public function getLlantas(){
            return $this->llantas;
        }

        public function setLantas($llantas){
            $this->llantas = $llantas;
        }

        public function getTaponRuedas(){
            return $this->tapon_ruedas;
        }

        public function setTaponRuedas($tapon_ruedas){
            $this->tapon_ruedas = $tapon_ruedas;
        }

        public function getMolduras(){
            return $this->molduras;
        }

        public function setMolduras($molduras){
            $this->molduras = $molduras;
        }

        public function getTapaGasolina(){
            return $this->tapa_gasolina;
        }

        public function setTapaGasolina($tapa_gasolina){
            $this->tapa_gasolina = $tapa_gasolina;
        }

        public function getStop(){
            return $this->stop;
        }

        public function setStop($stop){
            $this->stop = $stop;
        }

        public function getLuzTrasIzq(){
            return $this->luz_tras_izq;
        }

        public function setLuzTrasIzq($luz_tras_izq){
            $this->luz_tras_izq = $luz_tras_izq;
        }

        public function getLuzTrasDer(){
            return $this->luz_tras_der;
        }

        public function setLuzTrasDer($luz_tras_der){
            $this->luz_tras_der = $luz_tras_der;
        }

        public function getDireccionalTrasIzq(){
            return $this->direccional_tras_izq;
        }

        public function setDireccionalTrasIzq($direccional_tras_izq){
            $this->direccional_tras_izq = $direccional_tras_izq;
        }

        public function getDireccionalTrasDer(){
            return $this->direccional_tras_der;
        }

        public function setDireccionalTrasDer($direccional_tras_der){
            $this->direccional_tras_der = $direccional_tras_der;
        }
    

        public function getLuzPlaca(){
            return $this->luz_placa;
        }

        public function setLuzPlaca($luz_placa){
            $this->luz_placa = $luz_placa;
        }

        public function getLuzCajuela(){
            return $this->luz_cajuela;
        }

        public function setLuzCajuela($luz_cajuela){
            $this->luz_cajuela = $luz_cajuela;
        }

        public function getLuzTablero(){
            return $this->luz_tablero;
        }

        public function setLuzTablero($luz_tablero){
            $this->luz_tablero = $luz_tablero;
        }

        public function getInstrumentosTablero(){
            return $this->instrumentos_tablero;
        }

        public function setInstrumentosTablero($instrumentos_tablero){
            $this->instrumentos_tablero = $instrumentos_tablero;
        }

        public function getLlaves(){
            return $this->llaves;
        }

        public function setLlaves($llaves){
            $this->llaves = $llaves;
        }

        public function getLimpiaParabrisasFrontal(){
            return $this->limpia_parabrisas_fron;
        }

        public function setLimpiaParabrisasFrontal($limpia_parabrisas_fron){
            $this->limpia_parabrisas_fron = $limpia_parabrisas_fron;
        }

        public function getLimpiaParabrisasTrasero(){
            return $this->limpia_parabrisas_tras;
        }

        public function setLimpiaParabrisasTrasero($limpia_parabrisas_tras){
            $this->limpia_parabrisas_tras = $limpia_parabrisas_tras;
        }

        public function getEstereo(){
            return $this->estereo;
        }

        public function setEstereo($estereo){
            $this->estereo = $estereo;
        }

        public function getBocinasFrontales(){
            return $this->bocinas_fron;
        }

        public function setBocinasFrontales($bocinas_fron){
            $this->bocinas_fron = $bocinas_fron;
        }

        public function getBocinasTraseras(){
            return $this->bocinas_tras;
        }

        public function setBocinasTraseras($bocinas_tras){
            $this->bocinas_tras = $bocinas_tras;
        }

        public function getEncendedor(){
            return $this->encendedor;
        }

        public function setEncendedor($encendedor){
            $this->encendedor = $encendedor;
        }

        public function getEspejoRetrovisor(){
            return $this->espejo_retrovisor;
        }

        public function setEspejoRetrovisor($espejo_retrovisor){
            $this->espejo_retrovisor = $espejo_retrovisor;
        }

        public function getCenicero(){
            return $this->cenicero;
        }

        public function setCenicero($cenicero){
            $this->cenicero = $cenicero;
        }

        public function getCinturones(){
            return $this->cinturones;
        }

        public function setCinturones($cinturones){
            $this->cinturones = $cinturones;
        }

        public function getLuzInt(){
            return $this->luz_int;
        }

        public function setLuzInt($luz_int){
            $this->luz_int = $luz_int;
        }

        public function getParasolIzq(){
            return $this->parasol_izq;
        }

        public function setParasolIzq($parasol_izq){
            $this->parasol_izq = $parasol_izq;
        }

        public function getParasolDer(){
            return $this->parasol_der;
        }

        public function setParasolDer($parasol_der){
            $this->parasol_der = $parasol_der;
        }

        public function getVestidurasTela(){
            return $this->vestiduras_tela;
        }

        public function setVestidurasTela($vestiduras_tela){
            $this->vestiduras_tela = $vestiduras_tela;
        }

        public function getVestidurasPiel(){
            return $this->vestiduras_piel;
        }

        public function setVestidurasPiel($vestiduras_piel){
            $this->vestiduras_piel = $vestiduras_piel;
        }

        public function getTestigosTablero(){
            return $this->testigos_tablero;
        }

        public function setTestigosTablero($testigos_tablero){
            $this->testigos_tablero = $testigos_tablero;
        }

        public function getRefaccion(){
            return $this->refaccion;
        }

        public function setRefaccion($refaccion){
            $this->refaccion = $refaccion;
        }

        public function getDadoSeguridad(){
            return $this->dado_seguridad;
        }

        public function setDadoSeguridad($dado_seguridad){
            $this->dado_seguridad = $dado_seguridad;
        }

        public function getGato(){
            return $this->gato;
        }

        public function setGato($gato){
            $this->gato = $gato;
        }

        public function getManeral(){
            return $this->maneral;
        }

        public function setManeral($maneral){
            $this->maneral = $maneral;
        }

        public function getHerramientas(){
            return $this->herramientas;
        }

        public function setHerramientas($herramientas){
            $this->herramientas = $herramientas;
        }

        public function getTriangulos(){
            return $this->triangulos;
        }

        public function setTriangulos($triangulos){
            $this->triangulos = $triangulos;
        }

        public function getBotiquin(){
            return $this->botiquin;
        }

        public function setBotiquin($botiquin){
            $this->botiquin = $botiquin;
        }

        public function getExtintor(){
            return $this->extintor;
        }

        public function setExtintor($extintor){
            $this->extintor = $extintor;
        }

        public function getCables(){
            return $this->cables;
        }

        public function setCables($cables){
            $this->cables = $cables;
        }

        public function getClaxon(){
            return $this->claxon;
        }

        public function setClaxon($claxon){
            $this->claxon = $claxon;
        }

        public function getTaponAceite(){
            return $this->tapon_aceite;
        }

        public function setTaponAceite($tapon_aceite){
            $this->tapon_aceite = $tapon_aceite;
        }

        public function getTaponGasolina(){
            return $this->tapon_gasolina;
        }

        public function setTaponGasolina($tapon_gasolina){
            $this->tapon_gasolina = $tapon_gasolina;
        }

        public function getTaponRadiador(){
            return $this->tapon_radiador;
        }

        public function setTaponRadiador($tapon_radiador){
            $this->tapon_radiador = $tapon_radiador;
        }

        public function getVayonetaAceite(){
            return $this->vayoneta_aceite;
        }

        public function setVayonetaAceite($vayoneta_aceite){
            $this->vayoneta_aceite = $vayoneta_aceite;
        }

        public function getBateria(){
            return $this->bateria;
        }

        public function setBateria($bateria){
            $this->bateria = $bateria;
        }

        public function getCombustible(){
            return $this->combustible;
        }
        
        public function setCombustible($combustible){
            $this->combustible = $combustible;
        }

        public function getKilometraje(){
            return $this->kilometraje;
        }

        public function setKilometraje($kilometraje){
            $this->kilometraje = $kilometraje;
        }

        public function getObservaciones(){
            return $this->observaciones;
        }

        public function setObservaciones($observaciones){
            $this->observaciones = $observaciones;
        }

        public function getFirma(){
            return $this->firma;
        }
        
        public function setFirma($firma){
            $this->firma = $firma;
        }

    }


?>