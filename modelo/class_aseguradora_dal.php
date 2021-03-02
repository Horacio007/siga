<?php
    include("class_aseguradora.php");
    include("class_conexion.php");

    class aseguradora_dal extends class_db{

        function __construct(){
            parent::__construct();
        }

        function __destruct(){
            parent::__destruct();
        }

        function select_aseguradora(){
        $select_all = "SELECT * FROM aseguradoras";
        //print $select_all; exit;

        $this->set_sql($select_all);
        $this->db_conn->set_charset('utf8');

        $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
        $list = array();
        $counter = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $object = new aseguradora();

            /*los nombres entre comillas son los nombres de las columnas de las tablas
            se usan los set para enviar el valor al objeto y con el get obtenemos el valor
            donde lo invoquemos*/
            $object->setIdAeguradora($row["id"]);
            $object->setNombre($row["nombre"]);

            $counter++;
            $list[$counter] = $object;
            unset($object);
        }

        return $list;
    }
    }

?>