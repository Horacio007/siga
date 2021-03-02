<?php
    class vehiculo{

        private $id_aux;
        private $id;
        private $id_cliente;
        private $id_asesor;
        private $estatus;
        private $fecha_llegada;
        private $veinte_dias;
        private $hoy;
        private $diferencia_veinte_dias;
        private $fecha_llegada_taller;
        private $fecha_promesa;
        private $fecha_salida_taller;
        private $marca;
        private $linea;
        private $color;
        private $modelo;
        private $placas;
        private $cliente;
        private $no_siniestro;
        private $refacciones;
        private $proceso;
        private $fecha_valuacion;
        private $tres_dias;
        private $diferencia_tres_dias;
        private $cantidad_inicial;
        private $piezas_cambiadas_inicial;
        private $piezas_reparacion_inicial;
        private $fecha_autorizacion;
        private $cantidad_final;
        private $piezas_cambiadas_final;
        private $piezas_reparacion_final;
        private $piezas_vendidas;
        private $importe_piezas_vendidas;
        private $porcentaje_aprobacion;
        private $proveedor_1;
        private $refaccionaria_1;
        private $fecha_promesa_1;
        private $proveedor_2;
        private $refaccionaria_2;
        private $fecha_promesa_2;
        private $proveedor_3;
        private $refaccionaria_3;
        private $fecha_promesa_3;
        private $aplica_hojalateria;
        private $fecha_hojalateria;
        private $asignado_hojalateria;
        private $comentarios_hojalateria;
        private $aplica_preparacion;
        private $fecha_preparacion;
        private $asignado_preparacion;
        private $comentarios_preparacion;
        private $aplica_pintura;
        private $fecha_pintura;
        private $asignado_pintura;
        private $comentarios_pintura;
        private $aplica_armado;
        private $fecha_armado;
        private $asignado_armado;
        private $comentarios_armado;
        private $aplica_detallado;
        private $fecha_detallado;
        private $asignado_detallado;
        private $comentarios_detallado;
        private $aplica_mecanica;
        private $fecha_mecanica;
        private $asignado_mecanica;
        private $comentarios_mecanica;
        private $aplica_lavado;
        private $fecha_lavado;
        private $asignado_lavado;
        private $comentarios_lavado;
        private $fecha_entrega_interna;
        private $entrego;
        private $recibio;
        private $p_asignados;
        private $r_disponibles;

        public function __construct($id_aux = NULL, $id = NULL, $id_cliente = NULL, $id_asesor = NULL, $estatus = NULL, $fecha_llegada = NULL, $veinte_dias = NULL, $hoy = NULL, $diferencia_veinte_dias = NULL, $fecha_llegada_taller = NULL, $fecha_promesa = NULL, $fecha_salida_taller = NULL, $marca = NULL, $linea = NULL, $color = NULL, $modelo = NULL, $placas = NULL, $cliente = NULL, $no_siniestro = NULL, $refacciones = NULL, $proceso = NULL, $fecha_valuacion = NULL, $tres_dias = NULL, $diferencia_tres_dias = NULL, $cantidad_inicial = NULL, $piezas_cambiadas_inicial = NULL, $piezas_reparacion_inicial = NUll, $fecha_autorizacion = NULL, $cantidad_final = NULL, $piezas_cambiadas_final = NULL, $piezas_reparacion_final = NUll, $piezas_vendidas = NULL, $importe_piezas_vendidas = NULL, $porcentaje_aprobacion = NULL, $proveedor_1 = NULL, $refaccionaria_1 = NULL, $fecha_promesa_1 = NULL, $proveedor_2 = NULL, $refaccionaria_2 = NULL, $fecha_promesa_2 = NULL, $proveedor_3 = NULL, $refaccionaria_3 = NULL, $fecha_promesa_3 = NULL, $aplica_hojalateria = NULL, $fecha_hojalateria = NULL, $asignado_hojalateria = NULL, $comentarios_hojalateria = NULL, $aplica_preparacion = NULL, $fecha_preparacion = NULL, $asignado_preparacion = NULL, $comentarios_preparacion = NULL, $aplica_pintura = NULL, $fecha_pintura = NULL, $asignado_pintura = NULL, $comentarios_pintura = NULL, $aplica_armado = NULL, $fecha_armado = NULL, $asignado_armado = NULL, $comentarios_armado = NULL, $aplica_detallado = NULL, $fecha_detallado = NULL, $asignado_detallado = NULL, $comentarios_detallado = NULL, $aplica_mecanica = NULL, $fecha_mecanica = NULL, $asignado_mecanica = NULL, $comentarios_mecanica = NULL, $aplica_lavado = NULL, $fecha_lavado = NULL, $asignado_lavado = NULL, $comentarios_lavado = NULL, $fecha_entrega_interna = NULL, $entrego = NULL, $recibio = NULL, $p_asignados = NULL, $r_disponibles = NULL){
            $this->id_aux = $id_aux;
            $this->id = $id;
            $this->id_cliente = $id_cliente;
            $this->id_asesor = $id_asesor;
            $this->estatus = $estatus;
            $this->fecha_llegada = $fecha_llegada;
            $this->veinte_dias = $veinte_dias;
            $this->hoy = $hoy;
            $this->diferencia_veinte_dias = $diferencia_veinte_dias;
            $this->fecha_llegada_taller = $fecha_llegada_taller;
            $this->fecha_promesa = $fecha_promesa;
            $this->fecha_salida_taller = $fecha_salida_taller;
            $this->marca = $marca;
            $this->linea = $linea;
            $this->color = $color;
            $this->modelo = $modelo;
            $this->placas = $placas;
            $this->cliente = $cliente;
            $this->no_siniestro = $no_siniestro;    
            $this->refacciones = $refacciones;
            $this->proceso = $proceso;
            $this->fecha_valuacion = $fecha_valuacion;
            $this->tres_dias = $tres_dias;
            $this->diferencia_tres_dias = $diferencia_tres_dias;
            $this->cantidad_incial = $cantidad_inicial;
            $this->piezas_cambiadas_inicial = $piezas_cambiadas_inicial;
            $this->piezas_reparacion_inicial = $piezas_reparacion_inicial;
            $this->fecha_autorizacion = $fecha_autorizacion;
            $this->cantidad_final = $cantidad_final;
            $this->piezas_cambiadas_final = $piezas_cambiadas_final;
            $this->piezas_reparacion_final = $piezas_reparacion_final;
            $this->piezas_vendidas = $piezas_vendidas;
            $this->importe_piezas_vendidas = $importe_piezas_vendidas;
            $this->porcentaje_aprobacion = $porcentaje_aprobacion;
            $this->proveedor_1 = $proveedor_1;
            $this->refaccionaria_1 = $refaccionaria_1;
            $this->fecha_promesa_1 = $fecha_promesa_1;
            $this->proveedor_2 = $proveedor_2;
            $this->refaccionaria_2 = $refaccionaria_2;
            $this->fecha_promesa_2 = $fecha_promesa_2;
            $this->proveedor_3 = $proveedor_3;
            $this->refaccionaria_3 = $refaccionaria_3;
            $this->fecha_promesa_3 = $fecha_promesa_3;
            $this->aplica_hojalateria = $aplica_hojalateria;
            $this->fecha_hojalateria = $fecha_hojalateria;
            $this->asignado_hojalateria = $asignado_hojalateria;
            $this->comentarios_hojalateria = $comentarios_hojalateria;
            $this->aplica_preparacion = $aplica_preparacion;
            $this->fecha_preparacion = $fecha_preparacion;
            $this->asignado_preparacion = $asignado_preparacion;
            $this->comentarios_preparacion = $comentarios_preparacion;
            $this->aplica_pintura = $aplica_pintura;
            $this->fecha_pintura = $fecha_pintura;
            $this->asignado_pintura = $asignado_pintura;
            $this->comentarios_pintura = $comentarios_pintura;
            $this->aplica_armado = $aplica_armado;
            $this->fecha_armado = $fecha_armado;
            $this->asignado_armado = $asignado_armado;
            $this->comentarios_armado = $comentarios_armado;
            $this->aplica_detallado = $aplica_detallado;
            $this->fecha_detallado = $fecha_detallado;
            $this->asignado_detallado = $asignado_detallado;
            $this->comentarios_detallado = $comentarios_detallado;
            $this->aplica_mecanica = $aplica_mecanica;
            $this->fecha_mecanica = $fecha_mecanica;
            $this->asignado_mecanica = $asignado_mecanica;
            $this->comentarios_mecanica = $comentarios_mecanica;
            $this->aplica_lavado = $aplica_lavado;
            $this->fecha_lavado = $fecha_lavado;
            $this->asignado_lavado = $asignado_lavado;
            $this->comentarios_lavado = $comentarios_lavado;
            $this->fecha_entrega_interna = $fecha_entrega_interna;
            $this->entrego = $entrego;
            $this->recibio = $recibio;
            $this->p_asignados = $p_asignados;
            $this->r_disponibles = $r_disponibles;
        }

        public function getIdaux(){
            return $this->id_aux;
        }

        public function setIdaux($id_aux){
            $this->id_aux = $id_aux;
        }

        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
        }

        public function getIdCliente(){
            return $this->id_cliente;
        }

        public function setIdCliente($id_cliente){
            $this->id_cliente = $id_cliente;
        }

        public function getIdAsesor(){
            return $this->id_asesor;
        }

        public function setIdAsesor($id_asesor){
            $this->id_asesor = $id_asesor;
        }

        public function getEstatus(){
            return $this->estatus;
        }

        public function setEstatus($estatus){
            $this->estatus = $estatus;
        }

        public function getFechaLlegada(){
            return $this->fecha_llegada;
        }

        public function setFechaLlegada($fecha_llegada){
            $this->fecha_llegada = $fecha_llegada;
        }

        public function getVeinteDias(){
            return $this->veinte_dias;
        }

        public function setVeinteDias($veinte_dias){
            $this->veinte_dias = $veinte_dias;
        }

        public function getHoy(){
            return $this->hoy;
        }

        public function setHoy($hoy){
            $this->hoy = $hoy;
        }

        public function getDiferenciaVeinteDias(){
            return $this->diferencia_veinte_dias;
        }

        public function setDiferenciaVeinteDias($diferencia_veinte_dias){
            $this->diferencia_veinte_dias;
        }

        public function getFechaLlegadaTaller(){
            return $this->fecha_llegada_taller;
        }

        public function setFechaLlegadaTaller($fecha_llegada_taller){
            $this->fecha_llegada_taller = $fecha_llegada_taller;
        }

        public function getFechaPromesa(){
            return $this->fecha_promesa;
        }

        public function setFechaPromesa($fecha_promesa){
            $this->fecha_promesa = $fecha_promesa;
        }

        public function getFechaSalidaTaller(){
            return $this->fecha_salida_taller;
        }

        public function setFechaSalidaTaller($fecha_salida_taller){
            $this->fecha_salida_taller = $fecha_salida_taller;
        }

        public function getMarca(){
            return $this->marca;
        }

        public function setMarca($marca){
            $this->marca = $marca;
        }

        public function getLinea(){
            return $this->linea;
        }

        public function setLinea($linea){
            $this->linea = $linea;
        }

        public function getColor(){
            return $this->color;
        }

        public function setColor($color){
            $this->color = $color;
        }

        public function getModelo(){
            return $this->modelo;
        }

        public function setModelo($modelo){
            $this->modelo = $modelo;
        }

        public function getPlacas(){
            return $this->placas;
        }

        public function setPlacas($placas){
            $this->placas = $placas;
        }

        public function getCliente(){
            return $this->cliente;
        }

        public function setCliente($cliente){
            $this->cliente = $cliente;
        }

        public function getNoSiniestro(){
            return $this->no_siniestro;
        }

        public function setNoSiniestro($no_siniestro){
            $this->no_siniestro = $no_siniestro;
        }

        public function getRefacciones(){
            return $this->refacciones;
        }

        public function setRefacciones($refacciones){
            $this->refacciones = $refacciones;
        }

        public function getProceso(){
            return $this->proceso;
        }

        public function setProceso($proceso){
            $this->proceso = $proceso;
        }

        public function getFechaValuacion(){
             return $this->fecha_valuacion;
        }

        public function setFechaValuacion($fecha_valuacion){
            $this->fecha_valuacion = $fecha_valuacion;
        }

        public function getTresDias(){
            return $this->tres_dias;
        }

        public function setTresDias($tres_dias){
            $this->tres_dias = $tres_dias;
        }

        public function getDiferenciaTresDias(){
            return $this->diferencia_tres_dias;
        }

        public function setDiferenciaTresDias($diferencia_tres_dias){
            $this->diferencia_tres_dias = $diferencia_tres_dias;
        }

        public function getCantidadInicial(){
            return $this->cantidad_inicial;
        }

        public function setCantidadInicial($cantidad_inicial){
            $this->cantidad_inicial = $cantidad_inicial;
        }

        public function getPiezasCambioInicial(){
            return $this->piezas_cambiadas_inicial;
        }

        public function setPiezasCambioInicial($piezas_cambiadas_inicial){
            $this->piezas_cambiadas_inicial = $piezas_cambiadas_inicial;
        }

        public function getPiezasReparacionInicial(){
            return $this->piezas_reparacion_inicial;
        }

        public function setPiezasReparacionInicial($piezas_reparacion_inicial){
            $this->piezas_reparacion_inicial = $piezas_reparacion_inicial;
        }

        public function getFechaAutorizacion(){
            return $this->fecha_autorizacion;
        }

        public function setFechaAutorizacion($fecha_autorizacion){
            $this->fecha_autorizacion = $fecha_autorizacion;
        }

        public function getCantidadFinal(){
            return $this->cantidad_final;
        }

        public function setCantidadFinal($cantidad_final){
            $this->cantidad_final = $cantidad_final;
        }

        public function getPiezasCambioFinal(){
            return $this->piezas_cambiadas_final;
        }

        public function setPiezasCambioFinal($piezas_cambiadas_final){
            $this->piezas_cambiadas_final = $piezas_cambiadas_final;
        }

        public function getPiezasReparacionFinal(){
            return $this->piezas_reparacion_final;
        }

        public function setPiezasReparacionFinal($piezas_reparacion_final){
            $this->piezas_reparacion_final = $piezas_reparacion_final;
        }

        public function getPiezasVendidas(){
            return $this->piezas_vendidas;
        }

        public function setPiezasVendidas($piezas_vendidas){
            $this->piezas_vendidas = $piezas_vendidas;
        }

        public function getImportePiezasVendidas(){
            return $this->importe_piezas_vendidas;
        }

        public function setImportePiezasVendidas($importe_piezas_vendidas){
            $this->importe_piezas_vendidas = $importe_piezas_vendidas;
        }

        public function getPorcentajeAprobacion(){
            return $this->porcentaje_aprobacion;
        }

        public function setPorcentajeAprobacion($porcentaje_aprobacion){
            $this->porcentaje_aprobacion = $porcentaje_aprobacion;
        }

        public function getProveedor_1(){
            return $this->proveedor_1;
        }

        public function setProveedor_1($proveedor_1){
            $this->proveedor_1 = $proveedor_1;
        }

        public function getRefaccionaria_1(){
            return $this->refaccionaria_1;
        }

        public function setRefaccionaria_1($refaccionaria_1){
            $this->refaccionaria_1 = $refaccionaria_1;
        }

        public function getFechaPromesa_1(){
            return $this->fecha_promesa_1;
        }

        public function setFechaPromesa_1($fecha_promesa_1){
            $this->fecha_promesa_1 = $fecha_promesa_1;
        }

        public function getProveedor_2(){
            return $this->proveedor_2;
        }

        public function setProveedor_2($proveedor_2){
            $this->proveedor_2 = $proveedor_2;
        }

        public function getRefaccionaria_2(){
            return $this->refaccionaria_2;
        }

        public function setRefaccionaria_2($refaccionaria_2){
            $this->refaccionaria_2 = $refaccionaria_2;
        }

        public function getFechaPromesa_2(){
            return $this->fecha_promesa_2;
        }

        public function setFechaPromesa_2($fecha_promesa_2){
            $this->fecha_promesa_2 = $fecha_promesa_2;
        }

        public function getProveedor_3(){
            return $this->proveedor_3;
        }

        public function setProveedor_3($proveedor_3){
            $this->proveedor_3 = $proveedor_3;
        }

        public function getRefaccionaria_3(){
            return $this->refaccionaria_3;
        }

        public function setRefaccionaria_3($refaccionaria_3){
            $this->refaccionaria_3 = $refaccionaria_3;
        }

        public function getFechaPromesa_3(){
            return $this->fecha_promesa_3;
        }

        public function setFechaPromesa_3($fecha_promesa_3){
            $this->fecha_promesa_3 = $fecha_promesa_3;
        }

        public function getAplica_Hojalateria(){
            return $this->aplica_hojalateria;
        }

        public function setAplica_Hojalateria($aplica_hojalateria){
            $this->aplica_hojalateria = $aplica_hojalateria;
        }

        public function getFecha_Hojalateria(){
            return $this->fecha_hojalateria;
        }

        public function setFecha_Hojalateria($fecha_hojalateria){
            $this->fecha_hojalateria = $fecha_hojalateria;
        }

        public function getAsignado_Hojalateria(){
            return $this->asignado_hojalateria;
        }

        public function setAsignado_Hojalateria($asignado_hojalateria){
            $this->asignado_hojalateria = $asignado_hojalateria;
        }

        public function getComentarios_Hojalateria(){
            return $this->comentarios_hojalateria;
        }

        public function setComentarios_Hojalateria($comentarios_hojalateria){
            $this->comentarios_hojalateria = $comentarios_hojalateria;
        }

        public function getAplica_Preparacion(){
            return $this->aplica_preparacion;
        }

        public function setAplica_Preparacion($aplica_preparacion){
            $this->aplica_preparacion = $aplica_preparacion;
        }

        public function getFecha_Preparacion(){
            return $this->fecha_preparacion;
        }

        public function setFecha_Preparacion($fecha_preparacion){
            $this->fecha_preparacion = $fecha_preparacion;
        }

        public function getAsignado_Preparacion(){
            return $this->asignado_preparacion;
        }

        public function setAsignado_Preparacion($asignado_preparacion){
            $this->asignado_preparacion = $asignado_preparacion;
        }

        public function getComentarios_Preparacion(){
            return $this->comentarios_preparacion;
        }

        public function setComentarios_Preparacion($comentarios_preparacion){
            $this->comentarios_preparacion = $comentarios_preparacion;
        }

        public function getAplica_Pintura(){
            return $this->aplica_pintura;
        }

        public function setAplica_Pintura($aplica_pintura){
            $this->aplica_pintura = $aplica_pintura;
        }

        public function getFecha_Pintura(){
            return $this->fecha_pintura;
        }

        public function setFecha_Pintura($fecha_pintura){
            $this->fecha_pintura = $fecha_pintura;
        }

        public function getAsignado_Pintura(){
            return $this->asignado_pintura;
        }

        public function setAsignado_Pintura($asignado_pintura){
            $this->asignado_pintura = $asignado_pintura;
        }

        public function getComentarios_Pintura(){
            return $this->comentarios_pintura;
        }

        public function setComentarios_Pintura($comentarios_pintura){
            $this->comentarios_pintura = $comentarios_pintura;
        }

        public function getAplica_Armado(){
            return $this->aplica_armado;
        }

        public function setAplica_Armado($aplica_armado){
            $this->aplica_armado = $aplica_armado;
        }

        public function getFecha_Armado(){
            return $this->fecha_armado;
        }

        public function setFecha_Armado($fecha_armado){
            $this->fecha_armado = $fecha_armado;
        }

        public function getAsignado_Armado(){
            return $this->asignado_armado;
        }

        public function setAsignado_Armado($asignado_armado){
            $this->asignado_armado = $asignado_armado;
        }

        public function getComentarios_Armado(){
            return $this->comentarios_armado;
        }

        public function setComentarios_Armado($comentarios_armado){
            $this->comentarios_armado = $comentarios_armado;
        }

        public function getAplica_Detallado(){
            return $this->aplica_detallado;
        }

        public function setAplica_Detallado($aplica_detallado){
            $this->aplica_detallado = $aplica_detallado;
        }

        public function getFecha_Detallado(){
            return $this->fecha_detallado;
        }

        public function setFecha_Detallado($fecha_detallado){
            $this->fecha_detallado = $fecha_detallado;
        }

        public function getAsignado_Detallado(){
            return $this->asignado_detallado;
        }

        public function setAsignado_Detallado($asignado_detallado){
            $this->asignado_detallado = $asignado_detallado;
        }

        public function getComentarios_Detallado(){
            return $this->comentarios_detallado;
        }

        public function setComentarios_Detallado($comentarios_detallado){
            $this->comentarios_detallado = $comentarios_detallado;
        }

        public function getAplica_Mecanica(){
            return $this->aplica_mecanica;
        }

        public function setAplica_Mecanica($aplica_mecanica){
            $this->aplica_mecanica = $aplica_mecanica;
        }

        public function getFecha_Mecanica(){
            return $this->fecha_mecanica;
        }

        public function setFecha_Mecanica($fecha_mecanica){
            $this->fecha_mecanica = $fecha_mecanica;
        }

        public function getAsignado_Mecanica(){
            return $this->asignado_mecanica;
        }

        public function setAsignado_Mecanica($asignado_mecanica){
            $this->asignado_mecanica = $asignado_mecanica;
        }

        public function getComentarios_Mecanica(){
            return $this->comentarios_mecanica;
        }

        public function setComentarios_Mecanica($comentarios_mecanica){
            $this->comentarios_mecanica = $comentarios_mecanica;
        }

        public function getAplica_Lavado(){
            return $this->aplica_lavado;
        }

        public function setAplica_Lavado($aplica_lavado){
            $this->aplica_lavado = $aplica_lavado;
        }

        public function getFecha_Lavado(){
            return $this->fecha_lavado;
        }

        public function setFecha_Lavado($fecha_lavado){
            $this->fecha_lavado = $fecha_lavado;
        }

        public function getAsignado_Lavado(){
            return $this->asignado_lavado;
        }

        public function setAsignado_Lavado($asignado_lavado){
            $this->asignado_lavado = $asignado_lavado;
        }

        public function getComentarios_Lavado(){
            return $this->comentarios_lavado;
        }

        public function setComentarios_Lavado($comentarios_lavado){
            $this->comentarios_lavado = $comentarios_lavado;
        }

        public function getFecha_Entrega_Interna(){
            return $this->fecha_entrega_interna;
        }

        public function setFecha_Entrega_Interna($fecha_entrega_interna){
            return $this->fecha_entrega_interna = $fecha_entrega_interna;
        }

        public function getEntrego(){
            return $this->entrego;
        }

        public function setEntrego($entrego){
            $this->entrego = $entrego;
        }

        public function getRecibio(){
            return $this->recibio;
        }

        public function setRecibio($recibio){
            $this->recibio = $recibio;
        }

        public function getPasignados(){
            return $this->p_asignados;
        }

        public function setPasignados($p_asignados){
            $this->p_asignados = $p_asignados;
        }

        public function getRdisponibles(){
            return $this->r_disponibles;
        }

        public function setRdisponibles($r_disponibles){
            $this->r_disponibles = $r_disponibles;
        }
    }

?>