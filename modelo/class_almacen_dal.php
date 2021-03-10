<?php
    include("class_almacen.php");
    include("class_conexion.php");

    class almacen_dal extends class_db{

        function __construct(){
            parent::__construct();
        }

        function __destruct(){
            parent::__destruct(); // TODO: Change the autogenerated stub
        }
        
        function exist_cotrefaccion($expediente){
            $record = "SELECT id_vehiculo FROM costrefacciones WHERE id_vehiculo = '$expediente'";

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

        function insert_pieza($idexp, $fechallegada, $aseguradora, $descripcion, $marca, $linea, $modelo, $noexpediente, $ubicacion, $fechaentrega, $esatus, $comentarios){
            $insert = "INSERT INTO almacen (id_vehiculo, fecha_llegada, aseguradora, descripcion, marca, linea, modelo, expediente, ubicacion, fecha_entrega, estatus, comentarios) VALUES (";
            $insert.= "'" . $idexp . "',";
            $insert.= "'" . $fechallegada . "',";
            $insert.= "'" . $aseguradora . "',";
            $insert.= "'" . $descripcion . "',";
            $insert.= "'" . $marca . "',";
            $insert.= "'" . $linea . "',";
            $insert.= "'" . $modelo . "',";
            $insert.= "'" . $noexpediente . "',";
            $insert.= "'" . $ubicacion . "',";
            $insert.= "'" . $fechaentrega . "',";
            $insert.= "'" . $esatus . "',";
            $insert.= "'" . $comentarios . "')";

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

        function select_data(){
            $select_all = "SELECT * FROM almacen WHERE estatus = 'Asignado' or estatus = 'Disponible' or estatus = 'Devolución'";

            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new almacen();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setId($row["id"]);
                $object->setIdVehiculo($row["id_vehiculo"]);
                $object->setFecha_llegada($row["fecha_llegada"]);
                $object->setAseguradora($row["aseguradora"]);
                $object->setDescripcion($row["descripcion"]);
                $object->setMarca($row["marca"]);
                $object->setLinea($row["linea"]);
                $object->setModelo($row["modelo"]);
                $object->setExpediente($row["expediente"]);
                $object->setUbicacion($row["ubicacion"]);
                $object->setFecha_entrega($row["fecha_entrega"]);
                $object->setEstatus($row["estatus"]);
                $object->setComentarios($row["comentarios"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function update_pieza($idd, $ubicacion, $fecha_entrega, $status, $comentarios){
            $update = 'UPDATE almacen SET ';
            $update .= "ubicacion = '$ubicacion', ";
            $update .= "fecha_entrega = '$fecha_entrega', ";
            $update .= "estatus = '$status', ";
            $update .= "comentarios = '$comentarios' ";
            $update .= "WHERE id = '$idd' ";

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

        function exist_expediente($expediente){
            $record = "SELECT id FROM vehiculo WHERE id = '$expediente'";

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

        function select_databyId($id){
            $select_all = "SELECT ubicacion, fecha_entrega, estatus, comentarios, descripcion FROM almacen WHERE id = '$id'";

            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new almacen();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setUbicacion($row["ubicacion"]);
                $object->setFecha_entrega($row["fecha_entrega"]);
                $object->setEstatus($row["estatus"]);
                $object->setComentarios($row["comentarios"]);
                $object->setDescripcion($row["descripcion"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function exist_Id($id){
            $record = "SELECT id FROM almacen WHERE id = '$id' AND estatus != 'Entregado'";

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

        function select_dataEntregada(){
            $select_all = "SELECT * FROM almacen WHERE estatus = 'Entregado'";

            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new almacen();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setId($row["id"]);
                $object->setIdVehiculo($row["id_vehiculo"]);
                $object->setFecha_llegada($row["fecha_llegada"]);
                $object->setAseguradora($row["aseguradora"]);
                $object->setDescripcion($row["descripcion"]);
                $object->setMarca($row["marca"]);
                $object->setLinea($row["linea"]);
                $object->setModelo($row["modelo"]);
                $object->setExpediente($row["expediente"]);
                $object->setUbicacion($row["ubicacion"]);
                $object->setFecha_entrega($row["fecha_entrega"]);
                $object->setEstatus($row["estatus"]);
                $object->setComentarios($row["comentarios"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function exist_IdEntregado($id){
            $record = "SELECT id FROM almacen WHERE id = '$id' AND (estatus != 'Devolución' OR estatus != 'Disponible' OR estatus != 'Asignado')";

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
    }
?>