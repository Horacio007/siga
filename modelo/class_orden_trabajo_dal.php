<?php

include("class_orden_trabajo.php");
include("class_conexion.php");

class orden_trabajo_dal extends class_db{

    function __construct(){
        parent::__construct();
    }

    function __destruct(){
        parent::__destruct(); // TODO: Change the autogenerated stub
    }

    function insert_orden($id_vehiculo, $fecha, $reparacion, $hojalateria, $pintura, $mecanica, $observaciones, $elaboro){
        $insert = "INSERT INTO orden_trabajo (id_vehiculo, fecha, reparacion, hojalateria, pintura, mecanica, observaciones, elaboro) VALUES (";
        $insert.= "'" . $id_vehiculo . "',";
        $insert.= "'" . $fecha . "',";
        $insert.= "'" . $reparacion . "',";
        $insert.= "'" . $hojalateria . "',";
        $insert.= "'" . $pintura . "',";
        $insert.= "'" . $mecanica . "',";
        $insert.= "'" . $observaciones . "',";
        $insert.= "'" . $elaboro . "')";

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
        $record = "SELECT * FROM orden_trabajo";
            $this->set_sql($record);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new orden_trabajo();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setId($row["id"]);
                $object->setIdVehiculo($row['id_vehiculo']);
                $object->setFecha($row['fecha']);
                $object->setReparacion($row['reparacion']);
                $object->setHojalateria($row['hojalateria']);
                $object->setPintura($row['pintura']);
                $object->setMecanica($row['mecanica']);
                $object->setObservaciones($row['observaciones']);
                $object->setElavoro($row['elaboro']);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
    }

    function select_id($id){
        $record = "SELECT id_vehiculo FROM orden_trabajo WHERE id = '$id'";
            $this->set_sql($record);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new orden_trabajo();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setIdVehiculo($row['id_vehiculo']);

    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
    }

    function select_databyId($id){
        $record = "SELECT * FROM orden_trabajo WHERE id = '$id'";
            $this->set_sql($record);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new orden_trabajo();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setId($row["id"]);
                $object->setIdVehiculo($row['id_vehiculo']);
                $object->setFecha($row['fecha']);
                $object->setReparacion($row['reparacion']);
                $object->setHojalateria($row['hojalateria']);
                $object->setPintura($row['pintura']);
                $object->setMecanica($row['mecanica']);
                $object->setObservaciones($row['observaciones']);
                $object->setElavoro($row['elaboro']);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
    }
}

?>