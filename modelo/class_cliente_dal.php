<?php
    include("class_cliente.php");
    include("class_conexion.php");

    class cliente_dal extends class_db{
        function __construct(){
            parent::__construct();
        }

        function __destruct(){
            parent::__destruct();
        }

        function registra_cliente($nombre, $telefono, $correo){
            $insert_cliente = "INSERT INTO clientes (nombre, telefono, correo) VALUES (";
            $insert_cliente .= "'" . $nombre . "',";
            $insert_cliente .= "'" . $telefono . "',";
            $insert_cliente .= "'" . $correo . "')";

            //print $insert_cliente; exit;

            $this->set_sql($insert_cliente);
            $this->db_conn->set_charset('utf8');

            mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));

            if (mysqli_affected_rows($this->db_conn) == 1) {
                $inserted = 1;
            } else {
                $inserted = 0;
            }

            return $inserted;
        }


        function ultimo_registro(){
            //$ultimo = "SELECT id FROM clientes ORDER BY id DESC LIMIT 1";
            $ultimo = "SELECT id_aux FROM vehiculo ORDER BY id_aux DESC LIMIT 1";

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
                $object->setId($row["id_aux"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function checklist_inicial($id){
            $record = "SELECT nombre, telefono, correo FROM clientes WHERE id = '$id'";

            $this->set_sql($record);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new cliente();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setNombre($row["nombre"]);
                $object->setTelefono($row["telefono"]);
                $object->setCorreo($row["correo"]);
    
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

        function get_nombre($id){
            $ultimo = "SELECT nombre FROM clientes WHERE id = '$id'";

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
                $object->setNombre($row["nombre"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }
    }

?>