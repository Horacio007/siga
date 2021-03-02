<?php
    include("class_gastos.php");
    include("class_conexion.php");

    class gastos_dal extends class_db {

        function __construct() {
            parent::__construct();
        }

        function __destruct() {
            parent::__destruct();
        }

        function existe_gasto($id) {
            $record = "SELECT expediente FROM gastos WHERE expediente = '$id'";

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
        
        function insert_gasto($fecha, $articulos, $cantidad, $fpago, $factura, $tipogasto, $proveedor, $expediente) {
            $insert_gasto = "INSERT INTO gastos (fecha, articulos, gastos, forma_pago, factura, tipo, proveedor, expediente) VALUES (";
            $insert_gasto .= "'" . $fecha . "',";
            $insert_gasto .= "'" . $articulos . "',";
            $insert_gasto .= "'" . $cantidad . "',";
            $insert_gasto .= "'" . $fpago . "',";
            $insert_gasto .= "'" . $factura . "',";
            $insert_gasto .= "'" . $tipogasto . "',";
            $insert_gasto .= "'" . $proveedor . "',";
            $insert_gasto .= "'" . $expediente . "')";

            //print $insert_gasto; exit;

            $this->set_sql($insert_gasto);
            $this->db_conn->set_charset('utf8');

            mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));

            if (mysqli_affected_rows($this->db_conn) == 1) {
                $inserted = 1;
            } else {
                $inserted = 0;
            }

            return $inserted;
        }

        function get_renta() {
            $select_all = "SELECT tipo, SUM(gastos) as gastos FROM gastos WHERE tipo = 1 AND MONTH(NOW()) AND YEAR(NOW())";
            //print $select_all; exit;
    
            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new gastos();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setTipo($row["tipo"]);
                $object->setGastos($row["gastos"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function get_impuestos() {
            $select_all = "SELECT tipo, SUM(gastos) as gastos FROM gastos WHERE tipo = 2 AND MONTH(NOW()) AND YEAR(NOW())";
            //print $select_all; exit;
    
            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new gastos();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setTipo($row["tipo"]);
                $object->setGastos($row["gastos"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function get_nomina() {
            $select_all = "SELECT tipo, SUM(gastos) as gastos FROM gastos WHERE tipo = 3 AND MONTH(NOW()) AND YEAR(NOW())";
            //print $select_all; exit;
    
            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new gastos();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setTipo($row["tipo"]);
                $object->setGastos($row["gastos"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function get_equipo() {
            $select_all = "SELECT tipo, SUM(gastos) as gastos FROM gastos WHERE tipo = 4 AND MONTH(NOW()) AND YEAR(NOW())";
            //print $select_all; exit;
    
            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new gastos();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setTipo($row["tipo"]);
                $object->setGastos($row["gastos"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function get_matAcabado() {
            $select_all = "SELECT tipo, SUM(gastos) as gastos FROM gastos WHERE tipo = 5 AND MONTH(NOW()) AND YEAR(NOW())";
            //print $select_all; exit;
    
            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new gastos();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setTipo($row["tipo"]);
                $object->setGastos($row["gastos"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function get_refacciones() {
            $select_all = "SELECT tipo, SUM(gastos) as gastos FROM gastos WHERE tipo = 6 AND MONTH(NOW()) AND YEAR(NOW())";
            //print $select_all; exit;
    
            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new gastos();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setTipo($row["tipo"]);
                $object->setGastos($row["gastos"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function get_servicios() {
            $select_all = "SELECT tipo, SUM(gastos) as gastos FROM gastos WHERE tipo = 7 AND MONTH(NOW()) AND YEAR(NOW())";
            //print $select_all; exit;
    
            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new gastos();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setTipo($row["tipo"]);
                $object->setGastos($row["gastos"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function get_administracion() {
            $select_all = "SELECT tipo, SUM(gastos) as gastos FROM gastos WHERE tipo = 8 AND MONTH(NOW()) AND YEAR(NOW())";
            //print $select_all; exit;
    
            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new gastos();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setTipo($row["tipo"]);
                $object->setGastos($row["gastos"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function get_tot() {
            $select_all = "SELECT tipo, SUM(gastos) as gastos FROM gastos WHERE tipo = 9 AND MONTH(NOW()) AND YEAR(NOW())";
            //print $select_all; exit;
    
            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new gastos();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setTipo($row["tipo"]);
                $object->setGastos($row["gastos"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function get_papeleria() {
            $select_all = "SELECT tipo, SUM(gastos) as gastos FROM gastos WHERE tipo = 10 AND MONTH(NOW()) AND YEAR(NOW())";
            //print $select_all; exit;
    
            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new gastos();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setTipo($row["tipo"]);
                $object->setGastos($row["gastos"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function get_herramienta() {
            $select_all = "SELECT tipo, SUM(gastos) as gastos FROM gastos WHERE tipo = 11 AND MONTH(NOW()) AND YEAR(NOW())";
            //print $select_all; exit;
    
            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new gastos();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setTipo($row["tipo"]);
                $object->setGastos($row["gastos"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function get_miscelaneos() {
            $select_all = "SELECT tipo, SUM(gastos) as gastos FROM gastos WHERE tipo = 12 AND MONTH(NOW()) AND YEAR(NOW())";
            //print $select_all; exit;
    
            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new gastos();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setTipo($row["tipo"]);
                $object->setGastos($row["gastos"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function get_limpieza() {
            $select_all = "SELECT tipo, SUM(gastos) as gastos FROM gastos WHERE tipo = 13 AND MONTH(NOW()) AND YEAR(NOW())";
            //print $select_all; exit;
    
            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new gastos();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setTipo($row["tipo"]);
                $object->setGastos($row["gastos"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function get_materiales_proceso() {
            $select_all = "SELECT tipo, SUM(gastos) as gastos FROM gastos WHERE tipo = 14 AND MONTH(NOW()) AND YEAR(NOW())";
            //print $select_all; exit;
    
            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new gastos();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setTipo($row["tipo"]);
                $object->setGastos($row["gastos"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function select_data() {
            $select_all = "SELECT * FROM gastos";
            //print $select_all; exit;
    
            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new gastos();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setId($row["id"]);
                $object->setFecha($row["fecha"]);
                $object->setArticulos($row["articulos"]);
                $object->setGastos($row["gastos"]);
                $object->setFactura($row["factura"]);
                $object->setForma_pago($row["forma_pago"]);
                $object->setTipo($row["tipo"]);
                $object->setProveedor($row["proveedor"]);
                $object->setExpediente($row["expediente"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function existe_gastobyId($id) {
            $record = "SELECT id FROM gastos WHERE id = '$id'";

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

        function select_databyId($id) {
            $select_all = "SELECT * FROM gastos WHERE id = '$id'";
            //print $select_all; exit;
    
            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new gastos();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setId($row["id"]);
                $object->setFecha($row["fecha"]);
                $object->setArticulos($row["articulos"]);
                $object->setGastos($row["gastos"]);
                $object->setFactura($row["factura"]);
                $object->setForma_pago($row["forma_pago"]);
                $object->setTipo($row["tipo"]);
                $object->setProveedor($row["proveedor"]);
                $object->setExpediente($row["expediente"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function update_gasto($id, $fecha, $articulos, $cantidad, $fpago, $factura, $tipogasto, $proveedor, $expediente) {
            $update = 'UPDATE gastos SET ';
            $update .= "fecha = '$fecha', ";
            $update .= "articulos = '$articulos', ";
            $update .= "gastos = '$cantidad', ";
            $update .= "forma_pago = '$fpago', ";
            $update .= "factura = '$factura', ";
            $update .= "tipo = '$tipogasto', ";
            $update .= "proveedor = '$proveedor', ";
            $update .= "expediente = '$expediente' ";
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
    }

?>