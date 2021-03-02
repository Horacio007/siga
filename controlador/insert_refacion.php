<?php

    include("../modelo/class_almacen_dal.php");
    include("../modelo/class_refacciones_dal.php");
    include("../modelo/class_auto_dal.php");
    include("../modelo/class_auto_linea_dal.php");

    if (isset($_POST['idexp']) and isset($_POST['fechallegada']) and isset($_POST['aseguradora']) and isset($_POST['descripcion']) and isset($_POST['marca']) and isset($_POST['linea']) and isset($_POST['modelo']) and isset($_POST['noexpediente']) and isset($_POST['ubicacion']) and isset($_POST['fechaentrega']) and isset($_POST['esatus']) and isset($_POST['comentarios'])) {
        $objeto = new refacciones_dal();
        $objeto2 = new almacen_dal();
        $objeto3 = new autos_dal();
        $objeto4 = new auto_linea_dal();

        $id = $_POST['idexp'];

        $existecosteo = $objeto->exist_cotrefaccion($id);

        //este es para cuando no se tenga el costeo por x o y razon :(
        $trampas = $objeto2->exist_expediente($id);

        //echo $id;
        // esto es cuando es el id que si existe del vehiculo 
        if ($existecosteo == 1 || $id == '123' || $id == '456' || $trampas == 1) {

            $lista_autos = $objeto3->selecet_modelo($_POST['marca']);
            $lista_linea = $objeto4->select_linea($_POST['linea']);
            //echo 'no poes si hay';
            // saco la info de todo lo demas
            $idexp = $_POST['idexp'];
            $fechallegada = $_POST['fechallegada'];
            $descripcion = $_POST['descripcion'];
            $modelo = $_POST['modelo'];
            $noexpediente = $_POST['noexpediente'];
            $ubicacion = $_POST['ubicacion'];
            $fechaentrega = $_POST['fechaentrega'];
            $comentarios = $_POST['comentarios'];

            // saco el nombre de la aseguradora correcta
            switch ($_POST["aseguradora"]) {
                case 1:
                    $aseguradora = 'GNP';
                    break;
                
                case 2:
                    $aseguradora = 'HDI';
                    break;
                case 3:
                    $aseguradora = 'Particular';
                    break;
    
                case 4:
                    $aseguradora = 'QUALITAS';
                    break;
    
                default:
                    echo 'aseguradora no encontrada';
                    break;
            }

            switch ($_POST['esatus']) {
                case 1:
                    $estatus = 'Asignado';
                    break;
                
                case 2:
                    $estatus = 'Disponible';
                    break;
                case 3:
                    $estatus = 'Entregado';
                    break;

                case 4:
                    $estatus = 'Devolución';
                    break;
    
                default:
                    echo 'estatus no encontrado';
                    break;
            }

            //consigo el nombre de la marca que me da el id
            foreach ($lista_autos as $key => $value) {
                $output2 = $value->getMarca();
            }
        
            //consigo el nombre de la marca que me da el id
            foreach ($lista_linea as $key => $value) {
                $output3 = $value->getSubMarca();
            }

            $disponible = '123';

            //si el id de la refaccion viene como 123 significa que es del otro lado y el 456 tambien jajaj 
            

            $r = $objeto2->insert_pieza($idexp, $fechallegada, $aseguradora, $descripcion, $output2, $output3, $modelo, $noexpediente, $ubicacion, $fechaentrega, $estatus, $comentarios);

            //echo $r;
            if ($r == 1) {
                echo 1;
            } else {
                echo 'Pieza no registrada';
            }
            

        } else {
            echo 'Primero debes de crear el Costeo de Refacciones';
        }
        
    }

?>