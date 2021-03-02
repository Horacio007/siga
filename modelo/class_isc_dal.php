<?php
    include("class_isc.php");
    include("class_conexion.php");

    class isc_dal extends class_db{

        function __construct() {
            parent::__construct();
        }

        function __destruct() {
            parent::__destruct();
        }

        function insert_isc($id, $id_C, $atendio, $fecha, $p1, $p2, $p3, $p4, $p5, $p6, $p7, $total) {
            $insert_isc = "INSERT INTO isc (id_vehiculo, id_cliente, atendio, fecha, p1, p2, p3, p4, p5, p6, p7, total) VALUES (";
            $insert_isc .= "'" . $id . "',";
            $insert_isc .= "'" . $id_C . "',";
            $insert_isc .= "'" . $atendio . "',";
            $insert_isc .= "'" . $fecha . "',";
            $insert_isc .= "'" . $p1 . "',";
            $insert_isc .= "'" . $p2 . "',";
            $insert_isc .= "'" . $p3 . "',";
            $insert_isc .= "'" . $p4 . "',";
            $insert_isc .= "'" . $p5 . "',";
            $insert_isc .= "'" . $p6 . "',";
            $insert_isc .= "'" . $p7 . "',";
            $insert_isc .= "'" . $total . "')";

            //print $insert_isc; exit;

            $this->set_sql($insert_isc);
            $this->db_conn->set_charset('utf8');

            mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));

            if (mysqli_affected_rows($this->db_conn) == 1) {
                $inserted = 1;
            } else {
                $inserted = 0;
            }

            return $inserted;
        }

        function exist_encuesta($id) {
            $select_all = "SELECT id_vehiculo FROM isc WHERE id_vehiculo = '$id'";
            //print $select_all; exit;
    
            $this->set_sql($select_all);
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

        function exist_Ventregado($id) {
            $select_all = "SELECT estatus FROM vehiculo WHERE id = '$id'";
            //print $select_all; exit;
    
            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new isc();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->set_atendio($row["estatus"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function list_encuestas() {
            $select_all = "SELECT * FROM isc";
            //print $select_all; exit;
    
            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new isc();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setId($row["id"]);
                $object->set_idVehiculo($row["id_vehiculo"]);
                $object->set_idCliente($row["id_cliente"]);
                $object->set_atendio($row["atendio"]);
                $object->set_fecha($row["fecha"]);
                $object->set_p1($row["p1"]);
                $object->set_p2($row["p2"]);
                $object->set_p3($row["p3"]);
                $object->set_p4($row["p4"]);
                $object->set_p5($row["p5"]);
                $object->set_p6($row["p6"]);
                $object->set_p7($row["p7"]);
                $object->set_total($row["total"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function select_ISCCU(){
            $select_all = "SELECT marca, linea, total, modelo FROM isc, vehiculo WHERE isc.id_vehiculo = vehiculo.id AND WEEKOFYEAR(isc.fecha) = WEEKOFYEAR(NOW())-1 AND vehiculo.estatus = 'Entregado'";
            //print $select_all; exit;
    
            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new isc();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->set_p1($row["linea"]);
                $object->set_p2($row["total"]);
                $object->set_p3($row["marca"]);
                $object->set_p4($row["modelo"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function select_ISCCUTOTAL_Actual(){
            $select_all = "SELECT total FROM isc, vehiculo WHERE isc.id_vehiculo = vehiculo.id AND WEEKOFYEAR(isc.fecha) = WEEKOFYEAR(NOW()) AND vehiculo.estatus = 'Entregado'";
            //print $select_all; exit;
    
            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new isc();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                //$object->set_p1($row["linea"]);
                $object->set_p2($row["total"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function select_ISCCUTOTAL_Actual_1(){
            $select_all = "SELECT total FROM isc, vehiculo WHERE isc.id_vehiculo = vehiculo.id AND WEEKOFYEAR(isc.fecha) = WEEKOFYEAR(NOW())-1 AND vehiculo.estatus = 'Entregado'";
            //print $select_all; exit;
    
            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new isc();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                //$object->set_p1($row["linea"]);
                $object->set_p2($row["total"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function select_ISCCUTOTAL_Actual_2(){
            $select_all = "SELECT total FROM isc, vehiculo WHERE isc.id_vehiculo = vehiculo.id AND WEEKOFYEAR(isc.fecha) = WEEKOFYEAR(NOW())-2 AND vehiculo.estatus = 'Entregado'";
            //print $select_all; exit;
    
            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new isc();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                //$object->set_p1($row["linea"]);
                $object->set_p2($row["total"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function select_ISCCUTOTAL_Actual_3(){
            $select_all = "SELECT total FROM isc, vehiculo WHERE isc.id_vehiculo = vehiculo.id AND WEEKOFYEAR(isc.fecha) = WEEKOFYEAR(NOW())-3 AND vehiculo.estatus = 'Entregado'";
            //print $select_all; exit;
    
            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new isc();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                //$object->set_p1($row["linea"]);
                $object->set_p2($row["total"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

    }

?>