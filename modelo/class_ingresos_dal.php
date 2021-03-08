<?php
    include("class_ingresos.php");
    include("class_conexion.php");

    class ingresos_dal extends class_db{

        function __construct() {
            parent::__construct();
        }

        function __destruct() {
            parent::__destruct();
        }

        function exist_ingresoInicial($id) {
            $record = "SELECT id_vehiculo FROM ingresos WHERE id_vehiculo = '$id'";

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

        function insert_ingreso($id, $marca, $linea, $color, $modelo, $placas, $cliente, $tipo_servicio, $f_anticipo, $m_anticipo, $f_pago_anticipo, $f_finiquito, $m_finiquito, $f_pago_finiquito, $total) {
            $insert_ingreso = "INSERT INTO ingresos (id_vehiculo, marca, linea, color, modelo, placas, cliente, tipo_servicio, fecha_anticipo, anticipo, tipo_pago_anticipo, fecha_finiquito, finiquito, tipo_pago_finiquito, total) VALUES (";
            $insert_ingreso .= "'" . $id . "',";
            $insert_ingreso .= "'" . $marca . "',";
            $insert_ingreso .= "'" . $linea . "',";
            $insert_ingreso .= "'" . $color . "',";
            $insert_ingreso .= "'" . $modelo . "',";
            $insert_ingreso .= "'" . $placas . "',";
            $insert_ingreso .= "'" . $cliente . "',";
            $insert_ingreso .= "'" . $tipo_servicio . "',";
            $insert_ingreso .= "'" . $f_anticipo . "',";
            $insert_ingreso .= "'" . $m_anticipo . "',";
            $insert_ingreso .= "'" . $f_pago_anticipo . "',";
            $insert_ingreso .= "'" . $f_finiquito . "',";
            $insert_ingreso .= "'" . $m_finiquito . "',";
            $insert_ingreso .= "'" . $f_pago_finiquito . "',";
            $insert_ingreso .= "'" . $total . "')";

            //print $insert_ingreso; exit;

            $this->set_sql($insert_ingreso);
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
            $select_all = "SELECT * FROM ingresos";
            //print $select_all; exit;
    
            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new ingresos();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setId($row["id"]);
                $object->setExpediente($row["id_vehiculo"]);
                $object->setMarca($row["marca"]);
                $object->setLinea($row["linea"]);
                $object->setColor($row["color"]);
                $object->setModelo($row["modelo"]);
                $object->setPlacas($row["placas"]);
                $object->setCliente($row["cliente"]);
                $object->setTipo_servicio($row["tipo_servicio"]);
                $object->setFecha_anticipo($row["fecha_anticipo"]);
                $object->setAnticipo($row["anticipo"]);
                $object->setTipo_pago_anticipo($row["tipo_pago_anticipo"]);
                $object->setFecha_finiquito($row["fecha_finiquito"]);
                $object->setFiniquito($row["finiquito"]);
                $object->setTipo_pago_finiquito($row["tipo_pago_finiquito"]);
                $object->setTotal($row["total"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function exist_ingresoByid($id) {
            $record = "SELECT id_vehiculo FROM ingresos WHERE id_vehiculo = '$id'";

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

        function select_dataById($id) {
            $select_all = "SELECT * FROM ingresos WHERE id = '$id'";
            //print $select_all; exit;
    
            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new ingresos();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setId($row["id"]);
                $object->setExpediente($row["id_vehiculo"]);
                $object->setMarca($row["marca"]);
                $object->setLinea($row["linea"]);
                $object->setColor($row["color"]);
                $object->setModelo($row["modelo"]);
                $object->setPlacas($row["placas"]);
                $object->setCliente($row["cliente"]);
                $object->setTipo_servicio($row["tipo_servicio"]);
                $object->setFecha_anticipo($row["fecha_anticipo"]);
                $object->setAnticipo($row["anticipo"]);
                $object->setTipo_pago_anticipo($row["tipo_pago_anticipo"]);
                $object->setFecha_finiquito($row["fecha_finiquito"]);
                $object->setFiniquito($row["finiquito"]);
                $object->setTipo_pago_finiquito($row["tipo_pago_finiquito"]);
                $object->setTotal($row["total"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function exist_uingresoByid($id) {
            $record = "SELECT id FROM ingresos WHERE id = '$id'";

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

        function update_ingresos($id, $tipo_servicio, $f_anticipo, $m_anticipo, $f_pago_anticipo, $f_finiquito, $m_finiquito, $f_pago_finiquito, $total) {
            $update = 'UPDATE ingresos SET ';
            $update .= "tipo_servicio = '$tipo_servicio', ";
            $update .= "fecha_anticipo = '$f_anticipo', ";
            $update .= "anticipo = '$m_anticipo', ";
            $update .= "tipo_pago_anticipo = '$f_pago_anticipo', ";
            $update .= "fecha_finiquito = '$f_finiquito', ";
            $update .= "finiquito = '$m_finiquito', ";
            $update .= "tipo_pago_finiquito = '$f_pago_finiquito', ";
            $update .= "total = '$total' ";
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

        function insert_ingresoByFactura($id, $marca, $linea, $color, $modelo, $placas, $cliente, $tipo_servicio, $f_finiquito, $m_finiquito, $f_pago_finiquito, $total) {
            $insert_ingreso = "INSERT INTO ingresos (id_vehiculo, marca, linea, color, modelo, placas, cliente, tipo_servicio, fecha_finiquito, finiquito, tipo_pago_finiquito, total) VALUES (";
            $insert_ingreso .= "'" . $id . "',";
            $insert_ingreso .= "'" . $marca . "',";
            $insert_ingreso .= "'" . $linea . "',";
            $insert_ingreso .= "'" . $color . "',";
            $insert_ingreso .= "'" . $modelo . "',";
            $insert_ingreso .= "'" . $placas . "',";
            $insert_ingreso .= "'" . $cliente . "',";
            $insert_ingreso .= "'" . $tipo_servicio . "',";
            $insert_ingreso .= "'" . $f_finiquito . "',";
            $insert_ingreso .= "'" . $m_finiquito . "',";
            $insert_ingreso .= "'" . $f_pago_finiquito . "',";
            $insert_ingreso .= "'" . $total . "')";

            //print $insert_ingreso; exit;

            $this->set_sql($insert_ingreso);
            $this->db_conn->set_charset('utf8');

            mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));

            if (mysqli_affected_rows($this->db_conn) == 1) {
                $inserted = 1;
            } else {
                $inserted = 0;
            }

            return $inserted;
        }

    }

?>