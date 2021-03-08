<?php
    include("class_facturas.php");
    include("class_conexion.php");

    class facturas_dal extends class_db {

        function __construct() {
            parent::__construct();
        }

        function __destruct() {
            parent::__destruct();
        }

        function insert_facturaT($id, $marca, $linea, $color, $modelo, $placas, $cliente, $cantidad, $fechaf, $estatusA, $fechabbva, $comentarios) {
            $insert_factura = "INSERT INTO facturas (id_vehiculo, marca, linea, color, modelo, placas, cliente, cantidad, fecha_facturacion, estatus_aseguradora, fecha_bbva, comentarios) VALUES (";
            $insert_factura .= "'" . $id . "',";
            $insert_factura .= "'" . $marca . "',";
            $insert_factura .= "'" . $linea . "',";
            $insert_factura .= "'" . $color . "',";
            $insert_factura .= "'" . $modelo . "',";
            $insert_factura .= "'" . $placas . "',";
            $insert_factura .= "'" . $cliente . "',";
            $insert_factura .= "'" . $cantidad . "',";
            $insert_factura .= "'" . $fechaf . "',";
            $insert_factura .= "'" . $estatusA . "',";
            $insert_factura .= "'" . $fechabbva . "',";
            $insert_factura .= "'" . $comentarios . "')";

            //print $insert_factura; exit;

            $this->set_sql($insert_factura);
            $this->db_conn->set_charset('utf8');

            mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));

            if (mysqli_affected_rows($this->db_conn) == 1) {
                $inserted = 1;
            } else {
                $inserted = 0;
            }

            return $inserted;
        }

        function insert_facturaSin($id, $marca, $linea, $color, $modelo, $placas, $cliente, $cantidad, $fechaf, $estatusA, $comentarios) {
            $insert_factura = "INSERT INTO facturas (id_vehiculo, marca, linea, color, modelo, placas, cliente, cantidad, fecha_facturacion, estatus_aseguradora, comentarios) VALUES (";
            $insert_factura .= "'" . $id . "',";
            $insert_factura .= "'" . $marca . "',";
            $insert_factura .= "'" . $linea . "',";
            $insert_factura .= "'" . $color . "',";
            $insert_factura .= "'" . $modelo . "',";
            $insert_factura .= "'" . $placas . "',";
            $insert_factura .= "'" . $cliente . "',";
            $insert_factura .= "'" . $cantidad . "',";
            $insert_factura .= "'" . $fechaf . "',";
            $insert_factura .= "'" . $estatusA . "',";
            $insert_factura .= "'" . $comentarios . "')";

            //print $insert_factura; exit;

            $this->set_sql($insert_factura);
            $this->db_conn->set_charset('utf8');

            mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));

            if (mysqli_affected_rows($this->db_conn) == 1) {
                $inserted = 1;
            } else {
                $inserted = 0;
            }

            return $inserted;
        }

        function select_data() {
            $select_all = "SELECT * FROM facturas";
            //print $select_all; exit;
    
            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new facturas();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setId($row["id"]);
                $object->setIdVehiculo($row["id_vehiculo"]);
                $object->setMarca($row["marca"]);
                $object->setLinea($row["linea"]);
                $object->setColor($row["color"]);
                $object->setModelo($row["modelo"]);
                $object->setPlacas($row["placas"]);
                $object->setCliente($row["cliente"]);
                $object->setCantidad($row["cantidad"]);
                $object->setFechaF($row["fecha_facturacion"]);
                $object->setEstatus($row["estatus_aseguradora"]);
                $object->setFechaBBVA($row["fecha_bbva"]);
                $object->setComentarios($row["comentarios"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function select_Data_byId($id) {
            $select_all = "SELECT * FROM facturas WHERE id = '$id'";
            //print $select_all; exit;
    
            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new facturas();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setId($row["id"]);
                $object->setIdVehiculo($row["id_vehiculo"]);
                $object->setMarca($row["marca"]);
                $object->setLinea($row["linea"]);
                $object->setColor($row["color"]);
                $object->setModelo($row["modelo"]);
                $object->setPlacas($row["placas"]);
                $object->setCliente($row["cliente"]);
                $object->setCantidad($row["cantidad"]);
                $object->setFechaF($row["fecha_facturacion"]);
                $object->setEstatus($row["estatus_aseguradora"]);
                $object->setFechaBBVA($row["fecha_bbva"]);
                $object->setComentarios($row["comentarios"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function exist_factura($id) {
            $record = "SELECT id FROM facturas WHERE id = '$id'";

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

        function update_factura($id, $cantidad, $fechaf, $estatusA, $fechabbva, $comentarios) {
            $update = 'UPDATE facturas SET ';
            $update .= "cantidad = '$cantidad', ";
            $update .= "fecha_facturacion = '$fechaf', ";
            $update .= "estatus_aseguradora = '$estatusA', ";
            $update .= "fecha_bbva = '$fechabbva', ";
            $update .= "comentarios = '$comentarios' ";
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

        function select_IdVe_byId($id) {
            $select_all = "SELECT id_vehiculo FROM facturas WHERE id = '$id'";
            //print $select_all; exit;
    
            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new facturas();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setIdVehiculo($row["id_vehiculo"]);

                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

    }

?>