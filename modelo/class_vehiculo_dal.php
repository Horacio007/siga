<?php
    include("class_vehiculo.php");
    include("class_conexion.php");

    class vehiculo_dal extends class_db{
        function __construct(){
            parent::__construct();
        }

        function __destruct(){
            parent::__destruct();
        }

        function ultimo_registro(){
            $ultimo = "SELECT id FROM vehiculo ORDER BY id_aux DESC LIMIT 1";

            $this->set_sql($ultimo);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new vehiculo();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setId($row["id"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function registrar_vehiculo($id, $id_cliente, $id_asesor, $fecha_llegada, $marca, $linea, $color, $modelo, $placas, $cliente, $no_siniestro, $estatus){
            $insert_vehiculo = "INSERT INTO vehiculo (id, id_cliente, id_asesor, fecha_llegada, marca, linea, color, modelo, placas, cliente, estatus, no_siniestro) VALUES (";
            $insert_vehiculo .= "'" . $id . "',";
            $insert_vehiculo .= "'" . $id_cliente . "',";
            $insert_vehiculo .= "'" . $id_asesor . "',";
            $insert_vehiculo .= "'" . $fecha_llegada . "',";
            $insert_vehiculo .= "'" . $marca . "',";
            $insert_vehiculo .= "'" . $linea . "',";
            $insert_vehiculo .= "'" . $color . "',";
            $insert_vehiculo .= "'" . $modelo . "',";
            $insert_vehiculo .= "'" . $placas . "',";
            $insert_vehiculo .= "'" . $cliente . "',";
            $insert_vehiculo .= "'" . $estatus . "',";
            $insert_vehiculo .= "'" . $no_siniestro . "')";

            //print $insert_vehiculo; exit;


            $this->set_sql($insert_vehiculo);
            $this->db_conn->set_charset('utf8');

            mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));

            if (mysqli_affected_rows($this->db_conn) == 1) {
                $inserted = 1;
            } else {
                $inserted = 0;
            }

            return $inserted;
            
         
        }

        function checklist_inicial($id){
            $record = "SELECT id, id_cliente, id_asesor, marca, linea, modelo, color, placas, cliente, no_siniestro FROM vehiculo WHERE id = '$id'";

            $this->set_sql($record);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new vehiculo();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setId($row["id"]);
                $object->setIdCliente($row["id_cliente"]);
                $object->setIdAsesor($row["id_asesor"]);
                $object->setMarca($row["marca"]);
                $object->setLinea($row["linea"]);
                $object->setModelo($row["modelo"]);
                $object->setColor($row["color"]);
                $object->setPlacas($row["placas"]);
                $object->setCliente($row["cliente"]);
                $object->setNoSiniestro($row["no_siniestro"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function exist_vehiculo($id){
            $record = "SELECT id FROM vehiculo WHERE id = '$id'";

            //print_r($record);

            $this->set_sql($record);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $total_result = mysqli_num_rows($result);
            if($total_result == 1){
                $re=1;
            }else{
                $re=0;
            }

            return $re;
        }

        function get_Estatus($id){
            $record = "SELECT id, estatus FROM vehiculo WHERE id = '$id'";

            $this->set_sql($record);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new vehiculo();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setId($row["id"]);
                $object->setEstatus($row["estatus"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function maxid(){
            $ultimo = "SELECT MAX(id) FROM clientes";

            $this->set_sql($ultimo);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new cliente();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setId($row["MAX(id)"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function get_idCliente($id){
            $record = "SELECT id, id_cliente FROM vehiculo WHERE id = '$id'";

            $this->set_sql($record);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new vehiculo();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setId($row["id"]);
                $object->setIdCliente($row["id_cliente"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function update_idcliente($id, $id_cliente){
            $update = 'UPDATE vehiculo SET ';
            $update .= "id_cliente = '$id_cliente' ";
            $update .= "WHERE id = '$id'";

            //echo $update;

            $this->set_sql($update);
            $this->db_conn->set_charset('utf8');

            mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));

            if (mysqli_affected_rows($this->db_conn) == 1) {
                $output = 1;
            } else {
                $output = 0;
            }

            return $output;
        }

        function maxidd(){
            $ultimo = "SELECT MAX(id_aux) as id_aux FROM vehiculo";

            $this->set_sql($ultimo);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new vehiculo();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setIdaux($row["id_aux"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function select_valuaciones(){
            $select_all = "SELECT id_aux, id, estatus, fecha_llegada, fecha_llegada_taller, marca, linea, color, modelo, cliente, fecha_valuacion, diferencia_tres_dias, cantidad_inicial,piezas_cambiadas_inicial, piezas_reparacion_inicial, fecha_autorizacion,cantidad_final, piezas_cambiadas_final, piezas_reparacion_final, piezas_vendidas,importe_piezas_vendidas, porcentaje_aprobacion FROM vehiculo WHERE estatus = 'Taller' OR estatus = 'Transito'";

            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new vehiculo();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setIdaux($row["id_aux"]);
                $object->setId($row["id"]);
                $object->setEstatus($row["estatus"]);
                $object->setFechaLlegada($row["fecha_llegada"]);
                $object->setFechaLlegadaTaller($row["fecha_llegada_taller"]);
                $object->setMarca($row["marca"]);
                $object->setLinea($row["linea"]);
                $object->setColor($row["color"]);
                $object->setModelo($row["modelo"]);
                $object->setCliente($row["cliente"]);
                $object->setFechaValuacion($row["fecha_valuacion"]);
                $object->setDiferenciaTresDias($row["diferencia_tres_dias"]);
                $object->setCantidadInicial($row["cantidad_inicial"]);
                $object->setPiezasCambioInicial($row["piezas_cambiadas_inicial"]);
                $object->setPiezasReparacionInicial($row["piezas_reparacion_inicial"]);
                $object->setFechaAutorizacion($row["fecha_autorizacion"]);
                $object->setCantidadFinal($row["cantidad_final"]);
                $object->setPiezasCambioFinal($row["piezas_cambiadas_final"]);
                $object->setPiezasReparacionFinal($row["piezas_reparacion_final"]);
                $object->setPiezasVendidas($row["piezas_vendidas"]);
                $object->setImportePiezasVendidas($row["importe_piezas_vendidas"]);
                $object->setPorcentajeAprobacion($row["porcentaje_aprobacion"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function select_almacenVehi(){
            $select_all = "SELECT id, estatus, fecha_llegada, marca, linea, color, modelo, placas, cliente FROM vehiculo WHERE estatus = 'Taller' OR estatus = 'Transito'";

            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new vehiculo();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setId($row["id"]);
                $object->setEstatus($row["estatus"]);
                $object->setFechaLlegada($row["fecha_llegada"]);
                $object->setMarca($row["marca"]);
                $object->setLinea($row["linea"]);
                $object->setColor($row["color"]);
                $object->setModelo($row["modelo"]);
                $object->setPlacas($row["placas"]);
                $object->setCliente($row["cliente"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function update_valconFA($id, $estatus, $fecha_envio, $fecha_llegada, $diferencia, $cantidad_ini, $piezas_cambio_ini, $piezas_repara_ini, $fecha_autorizacion, $cantidad_fini, $piezas_cambio_fin, $piezas_repara_fin, $piezas_vendidas, $importe_piezas_vend, $porcentaje_aprob){
            $update = 'UPDATE vehiculo SET ';
            $update .= "estatus = '$estatus', ";
            $update .= "fecha_llegada_taller = '$fecha_llegada', ";
            $update .= "fecha_valuacion = '$fecha_envio', ";
            $update .= "diferencia_tres_dias = '$diferencia', ";
            $update .= "cantidad_inicial = '$cantidad_ini', ";
            $update .= "piezas_cambiadas_inicial = '$piezas_cambio_ini', ";
            $update .= "piezas_reparacion_inicial = '$piezas_repara_ini', ";
            $update .= "fecha_autorizacion = '$fecha_autorizacion', ";
            $update .= "cantidad_final = '$cantidad_fini', ";
            $update .= "piezas_cambiadas_final = '$piezas_cambio_fin', ";
            $update .= "piezas_reparacion_final = '$piezas_repara_fin', ";
            $update .= "piezas_vendidas = '$piezas_vendidas', ";
            $update .= "importe_piezas_vendidas = '$importe_piezas_vend', ";
            $update .= "porcentaje_aprobacion = '$porcentaje_aprob' ";
            $update .= "WHERE id = '$id'";

            //echo $update;

            $this->set_sql($update);
            $this->db_conn->set_charset('utf8');

            mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));

            if (mysqli_affected_rows($this->db_conn) == 1) {
                $output = 1;
            } else {
                $output = 0;
            }

            return $output;

        }

        function update_valconFSA($id, $estatus, $fecha_envio, $fecha_llegada, $cantidad_ini, $piezas_cambio_ini, $piezas_repara_ini, $piezas_vendidas, $importe_piezas_vend){
            $update = 'UPDATE vehiculo SET ';
            $update .= "estatus = '$estatus', ";
            $update .= "fecha_llegada_taller = '$fecha_llegada', ";
            $update .= "fecha_valuacion = '$fecha_envio', ";
            //$update .= "diferencia_tres_dias = '$diferencia', ";
            $update .= "cantidad_inicial = '$cantidad_ini', ";
            $update .= "piezas_cambiadas_inicial = '$piezas_cambio_ini', ";
            $update .= "piezas_reparacion_inicial = '$piezas_repara_ini', ";
            //$update .= "fecha_autorizacion = '$fecha_autorizacion', ";
            //$update .= "cantidad_final = '$cantidad_fini', ";
            //$update .= "piezas_cambiadas_final = '$piezas_cambio_fin', ";
            //$update .= "piezas_reparacion_final = '$piezas_repara_fin', ";
            $update .= "piezas_vendidas = '$piezas_vendidas', ";
            $update .= "importe_piezas_vendidas = '$importe_piezas_vend' ";
            //$update .= "porcentaje_aprobacion = '$porcentaje_aprob' ";
            $update .= "WHERE id = '$id'";

            //echo $update;

            $this->set_sql($update);
            $this->db_conn->set_charset('utf8');

            mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));

            if (mysqli_affected_rows($this->db_conn) == 1) {
                $output = 1;
            } else {
                $output = 0;
            }

            return $output;

        }


        function select_valuacionesbyId($id){
            $select_all = "SELECT estatus, fecha_llegada, fecha_llegada_taller, marca, linea, color, modelo, cliente, fecha_valuacion, diferencia_tres_dias, cantidad_inicial,piezas_cambiadas_inicial, piezas_reparacion_inicial, fecha_autorizacion,cantidad_final, piezas_cambiadas_final, piezas_reparacion_final, piezas_vendidas,importe_piezas_vendidas, porcentaje_aprobacion FROM vehiculo WHERE id = $id";

            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new vehiculo();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/

                $object->setEstatus($row["estatus"]);
                $object->setFechaLlegada($row["fecha_llegada"]);
                $object->setFechaLlegadaTaller($row['fecha_llegada_taller']);
                $object->setMarca($row["marca"]);
                $object->setLinea($row["linea"]);
                $object->setColor($row["color"]);
                $object->setModelo($row["modelo"]);
                $object->setCliente($row["cliente"]);
                $object->setFechaValuacion($row["fecha_valuacion"]);
                $object->setDiferenciaTresDias($row["diferencia_tres_dias"]);
                $object->setCantidadInicial($row["cantidad_inicial"]);
                $object->setPiezasCambioInicial($row["piezas_cambiadas_inicial"]);
                $object->setPiezasReparacionInicial($row["piezas_reparacion_inicial"]);
                $object->setFechaAutorizacion($row["fecha_autorizacion"]);
                $object->setCantidadFinal($row["cantidad_final"]);
                $object->setPiezasCambioFinal($row["piezas_cambiadas_final"]);
                $object->setPiezasReparacionFinal($row["piezas_reparacion_final"]);
                $object->setPiezasVendidas($row["piezas_vendidas"]);
                $object->setImportePiezasVendidas($row["importe_piezas_vendidas"]);
                $object->setPorcentajeAprobacion($row["porcentaje_aprobacion"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function select_refacciones(){
            $select_all = "SELECT id_aux, id, estatus, marca, linea, color, modelo, cliente, refacciones, proveedor_1, refaccionaria_1, fecha_promesa_1, proveedor_2, refaccionaria_2, fecha_promesa_2, proveedor_3, refaccionaria_3, fecha_promesa_3 FROM vehiculo WHERE estatus = 'Taller' OR estatus = 'Transito'";

            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new vehiculo();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setIdaux($row["id_aux"]);
                $object->setId($row["id"]);
                $object->setEstatus($row["estatus"]);
                $object->setMarca($row["marca"]);
                $object->setLinea($row["linea"]);
                $object->setColor($row["color"]);
                $object->setModelo($row["modelo"]);
                $object->setCliente($row["cliente"]);
                $object->setRefacciones($row["refacciones"]);
                $object->setProveedor_1($row["proveedor_1"]);
                $object->setRefaccionaria_1($row["refaccionaria_1"]);
                $object->setFechaPromesa_1($row["fecha_promesa_1"]);
                $object->setProveedor_2($row["proveedor_2"]);
                $object->setRefaccionaria_2($row["refaccionaria_2"]);
                $object->setFechaPromesa_2($row["fecha_promesa_2"]);
                $object->setProveedor_3($row["proveedor_3"]);
                $object->setRefaccionaria_3($row["refaccionaria_3"]);
                $object->setFechaPromesa_3($row["fecha_promesa_3"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function update_refacciones($id, $refacciones, $proveedor1, $refaccionaria1, $fp1, $proveedor2, $refaccionaria2, $fp2, $proveedor3, $refaccionaria3, $fp3){
            $update = 'UPDATE vehiculo SET ';
            $update .= "refacciones = '$refacciones', ";
            $update .= "proveedor_1 = '$proveedor1', ";
            $update .= "refaccionaria_1 = '$refaccionaria1', ";
            $update .= "fecha_promesa_1 = '$fp1', ";
            $update .= "proveedor_2 = '$proveedor2', ";
            $update .= "refaccionaria_2 = '$refaccionaria2', ";
            $update .= "fecha_promesa_2 = '$fp2', ";
            $update .= "proveedor_3 = '$proveedor3', ";
            $update .= "refaccionaria_3 = '$refaccionaria3', ";
            $update .= "fecha_promesa_3 = '$fp3' ";
            $update .= "WHERE id = '$id'";

            //echo $update;

            $this->set_sql($update);
            $this->db_conn->set_charset('utf8');

            mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));

            if (mysqli_affected_rows($this->db_conn) == 1) {
                $output = 1;
            } else {
                $output = 0;
            }

            return $output;
        }

        function orden_trabajo($id){
            $select_all = "SELECT marca, linea, color, modelo, placas, cliente FROM vehiculo WHERE id = $id";

            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new vehiculo();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setMarca($row["marca"]);
                $object->setLinea($row["linea"]);
                $object->setColor($row["color"]);
                $object->setModelo($row["modelo"]);
                $object->setPlacas($row["placas"]);
                $object->setCliente($row["cliente"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function select_refaccionesbyId($id){
            $select_all = "SELECT id, refacciones, proveedor_1, refaccionaria_1, fecha_promesa_1, proveedor_2, refaccionaria_2, fecha_promesa_2, proveedor_3, refaccionaria_3, fecha_promesa_3 FROM vehiculo WHERE id = '$id'";

            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new vehiculo();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setId($row["id"]);
                $object->setRefacciones($row["refacciones"]);
                $object->setProveedor_1($row["proveedor_1"]);
                $object->setRefaccionaria_1($row["refaccionaria_1"]);
                $object->setFechaPromesa_1($row["fecha_promesa_1"]);
                $object->setProveedor_2($row["proveedor_2"]);
                $object->setRefaccionaria_2($row["refaccionaria_2"]);
                $object->setFechaPromesa_2($row["fecha_promesa_2"]);
                $object->setProveedor_3($row["proveedor_3"]);
                $object->setRefaccionaria_3($row["refaccionaria_3"]);
                $object->setFechaPromesa_3($row["fecha_promesa_3"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function select_EstatusVehiEntrega(){
            $select_all = "SELECT id_aux, id, estatus, fecha_salida_taller, marca, linea, color, modelo, placas, cliente, aplica_lavado FROM vehiculo WHERE estatus = 'Taller' OR estatus = 'Transito'";

            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new vehiculo();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setIdaux($row["id_aux"]);
                $object->setId($row["id"]);
                $object->setEstatus($row["estatus"]);
                $object->setFechaSalidaTaller($row["fecha_salida_taller"]);
                $object->setMarca($row["marca"]);
                $object->setLinea($row["linea"]);
                $object->setColor($row["color"]);
                $object->setModelo($row["modelo"]);
                $object->setPlacas($row["placas"]);
                $object->setCliente($row["cliente"]);
                $object->setAplica_Lavado($row["aplica_lavado"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function select_AsigPersonal(){
            $select_all = "SELECT id_aux, id, estatus, fecha_llegada_taller, marca, linea, color, modelo, placas, cliente FROM vehiculo WHERE estatus = 'Taller' OR estatus = 'Transito'";

            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new vehiculo();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setIdaux($row["id_aux"]);
                $object->setId($row["id"]);
                $object->setEstatus($row["estatus"]);
                $object->setFechaLlegadaTaller($row["fecha_llegada_taller"]);
                $object->setMarca($row["marca"]);
                $object->setLinea($row["linea"]);
                $object->setColor($row["color"]);
                $object->setModelo($row["modelo"]);
                $object->setPlacas($row["placas"]);
                $object->setCliente($row["cliente"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function update_AsigPersonal($id, $aplica_hojalateria, $fecha_hojalateria, $asignado_hojalateria, $comentarios_hojalateria, $aplica_pintura, $fecha_pintura, $asignado_pintura, $comentarios_pintura, $aplica_armado, $fecha_armado, $asignado_armado, $comentarios_armado, $aplica_detallado, $fecha_detallado, $asignado_detallado, $comentarios_detallado, $aplica_mecanica, $fecha_mecanica, $asignado_mecanica, $comentarios_mecanica, $aplica_lavado, $fecha_lavado, $asignado_lavado, $comentarios_lavado){
            $update = 'UPDATE vehiculo SET ';
            $update .= "aplica_hojalateria = '$aplica_hojalateria', ";
            $update .= "fecha_hojalateria = '$fecha_hojalateria', ";
            $update .= "asignado_hojalateria = '$asignado_hojalateria', ";
            $update .= "comentarios_hojalateria = '$comentarios_hojalateria', ";
            //$update .= "aplica_preparacion = '$aplica_preparacion', ";
            //$update .= "fecha_preparacion = '$fecha_preparacion', ";
            //$update .= "asignado_preparacion = '$asignado_preparacion', ";
            //$update .= "comentarios_preparacion = '$comentarios_preparacion', ";
            $update .= "aplica_pintura = '$aplica_pintura', ";
            $update .= "fecha_pintura = '$fecha_pintura', ";
            $update .= "asignado_pintura = '$asignado_pintura', ";
            $update .= "comentario_pintura = '$comentarios_pintura', ";
            $update .= "aplica_armado = '$aplica_armado', ";
            $update .= "fecha_armado = '$fecha_armado', ";
            $update .= "asignado_armado = '$asignado_armado', ";
            $update .= "comentario_armado = '$comentarios_armado', ";
            $update .= "aplica_detallado = '$aplica_detallado', ";
            $update .= "fecha_detallado = '$fecha_detallado', ";
            $update .= "asignado_detallado = '$asignado_detallado', ";
            $update .= "comentario_detallado = '$comentarios_detallado', ";
            $update .= "aplica_mecanica = '$aplica_mecanica', ";
            $update .= "fecha_mecanica = '$fecha_mecanica', ";
            $update .= "asignado_mecanica = '$asignado_mecanica', ";
            $update .= "comentario_mecanica = '$comentarios_mecanica', ";
            $update .= "aplica_lavado = '$aplica_lavado', ";
            $update .= "fecha_lavado = '$fecha_lavado', ";
            $update .= "asignado_lavado = '$asignado_lavado', ";
            $update .= "comentario_lavado = '$comentarios_lavado' ";
            $update .= "WHERE id = '$id'";

            //echo $update;
            
            $this->set_sql($update);
            $this->db_conn->set_charset('utf8');

            mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));

            if (mysqli_affected_rows($this->db_conn) == 1) {
                $output = 1;
            } else {
                $output = 0;
            }

            return $output;
            
        }

        function select_AsignaPersonalbyId($id){
            $select_all = "SELECT id_aux, id, estatus, fecha_llegada_taller, marca, linea, color, modelo, placas, cliente FROM vehiculo WHERE id = '$id' AND (estatus = 'Taller' OR estatus = 'Transito')";

            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new vehiculo();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setIdaux($row["id_aux"]);
                $object->setId($row["id"]);
                $object->setEstatus($row["estatus"]);
                $object->setFechaLlegadaTaller($row["fecha_llegada_taller"]);
                $object->setMarca($row["marca"]);
                $object->setLinea($row["linea"]);
                $object->setColor($row["color"]);
                $object->setModelo($row["modelo"]);
                $object->setPlacas($row["placas"]);
                $object->setCliente($row["cliente"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function select_EstatusVehiProceso(){
            $select_all = "SELECT id_aux, id, estatus, fecha_salida_taller, marca, linea, color, modelo, placas, cliente, aplica_lavado, fecha_entrega_interna FROM vehiculo WHERE estatus = 'Taller' OR estatus = 'Transito'";

            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new vehiculo();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setIdaux($row["id_aux"]);
                $object->setId($row["id"]);
                $object->setEstatus($row["estatus"]);
                $object->setFechaSalidaTaller($row["fecha_salida_taller"]);
                $object->setMarca($row["marca"]);
                $object->setLinea($row["linea"]);
                $object->setColor($row["color"]);
                $object->setModelo($row["modelo"]);
                $object->setPlacas($row["placas"]);
                $object->setCliente($row["cliente"]);
                $object->setAplica_Lavado($row["aplica_lavado"]);
                $object->setFecha_Entrega_Interna($row["fecha_entrega_interna"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function asignado($id){
            $select_all = "SELECT id_aux, id, estatus, fecha_salida_taller, marca, linea, color, modelo, placas, cliente, aplica_lavado FROM vehiculo WHERE id = '$id' AND (estatus = 'Taller' OR estatus = 'Transito')";

            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new vehiculo();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setIdaux($row["id_aux"]);
                $object->setId($row["id"]);
                $object->setEstatus($row["estatus"]);
                $object->setFechaSalidaTaller($row["fecha_salida_taller"]);
                $object->setMarca($row["marca"]);
                $object->setLinea($row["linea"]);
                $object->setColor($row["color"]);
                $object->setModelo($row["modelo"]);
                $object->setPlacas($row["placas"]);
                $object->setCliente($row["cliente"]);
                $object->setAplica_Lavado($row["aplica_lavado"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function procesobyId($id){
            $select_all = "SELECT aplica_hojalateria, fecha_hojalateria, asignado_hojalateria, comentarios_hojalateria, aplica_preparacion, fecha_preparacion, asignado_preparacion, comentarios_preparacion, aplica_pintura, fecha_pintura, asignado_pintura, comentario_pintura, aplica_armado, fecha_armado, asignado_armado, comentario_armado, aplica_detallado, fecha_detallado, asignado_detallado, comentario_detallado, aplica_mecanica, fecha_mecanica, asignado_mecanica, comentario_mecanica, aplica_lavado, fecha_lavado, asignado_lavado, comentario_lavado, fecha_entrega_interna, entrego, recibio FROM vehiculo WHERE id = '$id' AND (estatus = 'Taller' OR estatus = 'Transito')";

            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new vehiculo();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setAplica_Hojalateria($row["aplica_hojalateria"]);
                $object->setFecha_Hojalateria($row["fecha_hojalateria"]);
                $object->setAsignado_Hojalateria($row["asignado_hojalateria"]);
                $object->setComentarios_Hojalateria($row["comentarios_hojalateria"]);//
                $object->setAplica_Preparacion($row["aplica_preparacion"]);
                $object->setFecha_Preparacion($row["fecha_preparacion"]);
                $object->setAsignado_Preparacion($row["asignado_preparacion"]);
                $object->setComentarios_Preparacion($row["comentarios_preparacion"]);//
                $object->setAplica_Pintura($row["aplica_pintura"]);
                $object->setFecha_Pintura($row["fecha_pintura"]);
                $object->setAsignado_Pintura($row["asignado_pintura"]);
                $object->setComentarios_Pintura($row["comentario_pintura"]);
                $object->setAplica_Armado($row["aplica_armado"]);
                $object->setFecha_Armado($row["fecha_armado"]);
                $object->setAsignado_Armado($row["asignado_armado"]);
                $object->setComentarios_Armado($row["comentario_armado"]);
                $object->setAplica_Detallado($row["aplica_detallado"]);
                $object->setFecha_Detallado($row["fecha_detallado"]);
                $object->setAsignado_Detallado($row["asignado_detallado"]);
                $object->setComentarios_Detallado($row["comentario_detallado"]);
                $object->setAplica_Mecanica($row["aplica_mecanica"]);
                $object->setFecha_Mecanica($row["fecha_mecanica"]);
                $object->setAsignado_Mecanica($row["asignado_mecanica"]);
                $object->setComentarios_Mecanica($row["comentario_mecanica"]);
                $object->setAplica_Lavado($row["aplica_lavado"]);
                $object->setFecha_Lavado($row["fecha_lavado"]);
                $object->setAsignado_Lavado($row["asignado_lavado"]);
                $object->setComentarios_Lavado($row["comentario_lavado"]);
                $object->setFecha_Entrega_Interna($row["fecha_entrega_interna"]);
                $object->setEntrego($row["entrego"]);
                $object->setRecibio($row["recibio"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function update_PersonalAsig($id, $fecha_hojalateria, $comentarios_hojalateria, $fecha_pintura, $comentarios_pintura, $fecha_armado, $comentarios_armado, $fecha_detallado, $comentarios_detallado, $fecha_mecanica, $comentarios_mecanica, $fecha_lavado, $comentarios_lavado, $fecha_entrega, $entrego, $recibio){
            $update = 'UPDATE vehiculo SET ';
            $update .= "fecha_hojalateria = '$fecha_hojalateria', ";
            $update .= "comentarios_hojalateria = '$comentarios_hojalateria', ";
            //$update .= "fecha_preparacion = '$fecha_preparacion', ";
            //$update .= "comentarios_preparacion = '$comentarios_preparacion', ";
            $update .= "fecha_pintura = '$fecha_pintura', ";
            $update .= "comentario_pintura = '$comentarios_pintura', ";
            $update .= "fecha_armado = '$fecha_armado', ";
            $update .= "comentario_armado = '$comentarios_armado', ";
            $update .= "fecha_detallado = '$fecha_detallado', ";
            $update .= "comentario_detallado = '$comentarios_detallado', ";
            $update .= "fecha_mecanica = '$fecha_mecanica', ";
            $update .= "comentario_mecanica = '$comentarios_mecanica', ";
            $update .= "fecha_lavado = '$fecha_lavado', ";
            $update .= "comentario_lavado = '$comentarios_lavado', ";
            $update .= "fecha_entrega_interna = '$fecha_entrega', ";
            $update .= "entrego = '$entrego', ";
            $update .= "recibio = '$recibio' ";
            $update .= "WHERE id = '$id'";

            //echo $update;
            
            $this->set_sql($update);
            $this->db_conn->set_charset('utf8');

            mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));

            if (mysqli_affected_rows($this->db_conn) == 1) {
                $output = 1;
            } else {
                $output = 0;
            }

            return $output;
            
        }

        function update_Pasignados($id, $p_asignados){
            $update = 'UPDATE vehiculo SET ';
            $update .= "p_asignados = '$p_asignados' ";
            $update .= "WHERE id = '$id'";

            //echo $update;
            
            $this->set_sql($update);
            $this->db_conn->set_charset('utf8');

            mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));

            if (mysqli_affected_rows($this->db_conn) == 1) {
                $output = 1;
            } else {
                $output = 0;
            }

            return $output;
        }

        function update_Rdisponibles($id, $r_disponibles){
            $update = 'UPDATE vehiculo SET ';
            $update .= "r_disponibles = '$r_disponibles' ";
            $update .= "WHERE id = '$id'";

            //echo $update;
            
            $this->set_sql($update);
            $this->db_conn->set_charset('utf8');

            mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));

            if (mysqli_affected_rows($this->db_conn) == 1) {
                $output = 1;
            } else {
                $output = 0;
            }

            return $output;
        }

        function select_Pasignado($id){
            $select_all = "SELECT p_asignados FROM vehiculo WHERE id = '$id' AND (estatus = 'Taller' OR estatus = 'Transito')";

            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new vehiculo();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setPasignados($row["p_asignados"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function select_Rdisponibles($id){
            $select_all = "SELECT r_disponibles FROM vehiculo WHERE id = '$id' AND (estatus = 'Taller' OR estatus = 'Transito')";

            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new vehiculo();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setRdisponibles($row["r_disponibles"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function select_ProcesoAdm(){
            $select_all = "SELECT id, estatus, marca, linea, color, modelo, placas, cliente, fecha_llegada, fecha_valuacion, fecha_autorizacion, p_asignados, r_disponibles FROM vehiculo WHERE estatus = 'Taller' OR estatus = 'Transito'";

            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new vehiculo();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setId($row["id"]);
                $object->setEstatus($row["estatus"]);
                $object->setMarca($row["marca"]);
                $object->setLinea($row["linea"]);
                $object->setColor($row["color"]);
                $object->setModelo($row["modelo"]);
                $object->setPlacas($row["placas"]);
                $object->setCliente($row["cliente"]);
                $object->setFechaLlegada($row['fecha_llegada']);
                $object->setFechaValuacion($row['fecha_valuacion']);
                $object->setFechaAutorizacion($row['fecha_autorizacion']);
                $object->setPasignados($row["p_asignados"]);
                $object->setRdisponibles($row["r_disponibles"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function select_IdAux($id){
            $select_all = "SELECT id_aux FROM vehiculo WHERE id = '$id'";

            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new vehiculo();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setIdaux($row["id_aux"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function select_ProcesoTaller(){
            $select_all = "SELECT id, estatus, marca, linea, color, modelo, placas, cliente, aplica_hojalateria, fecha_hojalateria, aplica_preparacion, fecha_preparacion, aplica_pintura, fecha_pintura, aplica_armado, fecha_armado, aplica_detallado, fecha_detallado, aplica_mecanica, fecha_mecanica, aplica_lavado, fecha_lavado, fecha_entrega_interna, asignado_hojalateria, asignado_preparacion, asignado_pintura, asignado_armado, asignado_detallado, asignado_mecanica, asignado_lavado FROM vehiculo WHERE estatus = 'Taller' OR estatus = 'Transito'";

            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new vehiculo();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setId($row["id"]);
                $object->setEstatus($row["estatus"]);
                $object->setMarca($row["marca"]);
                $object->setLinea($row["linea"]);
                $object->setColor($row["color"]);
                $object->setModelo($row["modelo"]);
                $object->setPlacas($row["placas"]);
                $object->setCliente($row["cliente"]);
                $object->setAplica_Hojalateria($row["aplica_hojalateria"]);
                $object->setFecha_Hojalateria($row["fecha_hojalateria"]);
                $object->setAplica_Preparacion($row["aplica_preparacion"]);
                $object->setFecha_Preparacion($row["fecha_preparacion"]);
                $object->setAplica_Pintura($row["aplica_pintura"]);
                $object->setFecha_Pintura($row["fecha_pintura"]);
                $object->setAplica_Armado($row["aplica_armado"]);
                $object->setFecha_Armado($row["fecha_armado"]);
                $object->setAplica_Detallado($row["aplica_detallado"]);
                $object->setFecha_Detallado($row["fecha_detallado"]);
                $object->setAplica_Mecanica($row["aplica_mecanica"]);
                $object->setFecha_Mecanica($row["fecha_mecanica"]);
                $object->setAplica_Lavado($row["aplica_lavado"]);
                $object->setFecha_Lavado($row["fecha_lavado"]);
                $object->setFecha_Entrega_Interna($row["fecha_entrega_interna"]);
                $object->setAsignado_Hojalateria($row["asignado_hojalateria"]);
                $object->setAsignado_Preparacion($row["asignado_preparacion"]);
                $object->setAsignado_Pintura($row["asignado_pintura"]);
                $object->setAsignado_Armado($row["asignado_armado"]);
                $object->setAsignado_Detallado($row["asignado_detallado"]);
                $object->setAsignado_Mecanica($row["asignado_mecanica"]);
                $object->setAsignado_Lavado($row["asignado_lavado"]);
    
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        
        function select_Ordens(){
            $select_all = "SELECT id_aux, id, estatus, marca, linea, color, modelo, placas, cliente FROM vehiculo WHERE estatus = 'Taller' OR estatus = 'Transito'";

            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new vehiculo();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setIdaux($row["id_aux"]);
                $object->setId($row["id"]);
                $object->setEstatus($row["estatus"]);
                $object->setMarca($row["marca"]);
                $object->setLinea($row["linea"]);
                $object->setColor($row["color"]);
                $object->setModelo($row["modelo"]);
                $object->setPlacas($row["placas"]);
                $object->setCliente($row["cliente"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function select_Ventregados() {
            $select_all = "SELECT id_aux, id, estatus, fecha_salida_taller, marca, linea, color, modelo, placas, cliente FROM vehiculo WHERE estatus = 'Entregado'";

            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new vehiculo();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setIdaux($row["id_aux"]);
                $object->setId($row["id"]);
                $object->setEstatus($row["estatus"]);
                $object->setFechaSalidaTaller($row["fecha_salida_taller"]);
                $object->setMarca($row["marca"]);
                $object->setLinea($row["linea"]);
                $object->setColor($row["color"]);
                $object->setModelo($row["modelo"]);
                $object->setPlacas($row["placas"]);
                $object->setCliente($row["cliente"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);

            }

            return $list;
        }

        function select_vdentregados() {
            $select_all = "SELECT id_aux, id, estatus, marca, linea, color, modelo, placas, cliente FROM vehiculo WHERE estatus = 'Taller' OR estatus = 'Transito'";

            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new vehiculo();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setIdaux($row["id_aux"]);
                $object->setId($row["id"]);
                $object->setEstatus($row["estatus"]);
                $object->setMarca($row["marca"]);
                $object->setLinea($row["linea"]);
                $object->setColor($row["color"]);
                $object->setModelo($row["modelo"]);
                $object->setPlacas($row["placas"]);
                $object->setCliente($row["cliente"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);

            }

            return $list;
        }

        function search_idGastos($id) {
            $select_all = "SELECT id FROM vehiculo WHERE id LIKE '%$id%'";

            //echo $select_all;

            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new vehiculo();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setId($row["id"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);

            }

            return $list;
        }

        function total_V_EMes() {
            $select_all = "SELECT COUNT(estatus) as Total FROM vehiculo WHERE estatus = 'Entregado' AND MONTH(fecha_salida_taller) = MONTH(NOW())";
        
            //echo $select_all;

            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new vehiculo();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setEstatus($row["Total"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);

            }

            return $list;
        }

        function total_V_EMesQ() {
            $select_all = "SELECT COUNT(estatus) as Qualitas FROM vehiculo WHERE estatus = 'Entregado' AND cliente = 'Qualitas' AND MONTH(fecha_salida_taller) = MONTH(NOW())";
        
            //echo $select_all;

            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new vehiculo();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setEstatus($row["Qualitas"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);

            }

            return $list;

        }

        function total_V_EMesG() {
            $select_all = "SELECT COUNT(estatus) as GNP FROM vehiculo WHERE estatus = 'Entregado' AND cliente = 'GNP' AND MONTH(fecha_salida_taller) = MONTH(NOW())";
        
            //echo $select_all;

            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new vehiculo();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setEstatus($row["GNP"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);

            }

            return $list;

        }

        function total_V_EMesP() {
            $select_all = "SELECT COUNT(estatus) as Particular FROM vehiculo WHERE estatus = 'Entregado' AND cliente = 'Particular' AND MONTH(fecha_salida_taller) = MONTH(NOW())";
        
            //echo $select_all;

            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new vehiculo();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setEstatus($row["Particular"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);

            }

            return $list;
        
        }

        function total_V_RMes() {
            $select_all = "SELECT COUNT(id_aux) as Total FROM vehiculo WHERE MONTH(fecha_llegada) = MONTH(NOW())";

            //echo $select_all;

            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new vehiculo();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setEstatus($row["Total"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);

            }

            return $list;
        }

        function total_V_RMesQ() {
            $select_all = "SELECT COUNT(id_aux) as Qualitas FROM vehiculo WHERE cliente = 'Qualitas' AND MONTH(fecha_llegada) = MONTH(NOW())";
        
            //echo $select_all;

            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new vehiculo();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setEstatus($row["Qualitas"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);

            }

            return $list;

        }

        function total_V_RMesG() {
            $select_all = "SELECT COUNT(id_aux) as GNP FROM vehiculo WHERE cliente = 'GNP' AND MONTH(fecha_llegada) = MONTH(NOW())";
        
            //echo $select_all;

            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new vehiculo();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setEstatus($row["GNP"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);

            }

            return $list;
        
        }

        function total_V_RMesP() {
            $select_all = "SELECT COUNT(id_aux) as Particular FROM vehiculo WHERE cliente = 'Particular' AND MONTH(fecha_llegada) = MONTH(NOW())";
        
            //echo $select_all;

            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new vehiculo();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setEstatus($row["Particular"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);

            }

            return $list;
        
        }

        function exist_vehiculoE($id){
            $record = "SELECT id FROM vehiculo WHERE id = '$id' AND estatus = 'Entregado'";

            //print_r($record);

            $this->set_sql($record);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $total_result = mysqli_num_rows($result);
            if($total_result == 1){
                $re=1;
            }else{
                $re=0;
            }

            return $re;
        }

        function get_NClinete($id){
            $select_all = "SELECT nombre FROM clientes WHERE id = (SELECT id_aux FROM vehiculo WHERE id = '$id')";

            //echo $select_all;

            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new vehiculo();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setNombre($row["nombre"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);

            }

            return $list;
        }

        function select_MLM($id) {
            $select_all = "SELECT marca, linea, modelo FROM vehiculo WHERE id = '$id'";
        
            //echo $select_all;

            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new vehiculo();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setMarca($row["marca"]);
                $object->setLinea($row["linea"]);
                $object->setModelo($row["modelo"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);

            }

            return $list;
        }

        public function select_VinfoF($id) {
            $select_all = "SELECT marca, linea, color, modelo, placas, cliente FROM vehiculo WHERE id = '$id'";
        
            //echo $select_all;

            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new vehiculo();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setMarca($row["marca"]);
                $object->setLinea($row["linea"]);
                $object->setColor($row["color"]);
                $object->setModelo($row["modelo"]);
                $object->setPlacas($row["placas"]);
                $object->setCliente($row["cliente"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);

            }

            return $list;
        }
    }

?>