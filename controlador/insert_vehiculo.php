<?php
    include("../modelo/class_vehiculo_dal.php");
    include("../modelo/class_cliente_dal.php");
    include("../modelo/class_auto_dal.php");
    include("../modelo/class_auto_linea_dal.php");
    
    if (isset($_POST['expediente']) and isset($_POST['asesor']) and isset($_POST['fecha']) and isset($_POST['marca']) and isset($_POST['submarca']) and isset($_POST['color']) and isset($_POST['modelo']) and isset($_POST['placas']) and isset($_POST['siniestro']) and isset($_POST['aseguradora']) and isset($_POST['estatus'])) {
        $objeto = new cliente_dal();
        $objeto2 = new vehiculo_dal();
        $objeto3 = new autos_dal();
        $objeto4 = new auto_linea_dal();
        $ultimo_cliente = $objeto->ultimo_registro();
        $lista_autos = $objeto3->selecet_modelo($_POST['marca']);
        $lista_linea = $objeto4->select_linea($_POST['submarca']);
        $ultimo_clientev2 = $objeto->maxid();
        $ultvehiculo = $objeto2->maxid();

        // saco el ultimo vehiculo para sumarle uno
        //consigo el id del cliente
        foreach ($ultvehiculo as $key => $value) {
            $ultimovehiculo = $value->getId();
        }
    
        //consigo el id del cliente
        foreach ($ultimo_cliente as $key => $value) {
            $output = $value->getId() + 1;
        }
        //echo $output;

        //consigo el id del cliente
        foreach ($ultimo_clientev2 as $key => $value) {
            $idcliente = $value->getId();
        }
        //echo $output;
    
        //consigo el nombre de la marca que me da el id
        foreach ($lista_autos as $key => $value) {
            $output2 = $value->getMarca();
        }
    
        //consigo el nombre de la marca que me da el id
        foreach ($lista_linea as $key => $value) {
            $output3 = $value->getSubMarca();
        }
        
        switch ($_POST["aseguradora"]) {
            case 1:
                $cliente = 'GNP';
                break;
            
            case 2:
                $cliente = 'HDI';
                break;
            case 3:
                $cliente = 'Particular';
                break;

            case 4:
                $cliente = 'QUALITAS';
                break;

            default:
                echo 'aseguradora no encontrada';
                break;
        }

        switch ($_POST['estatus']) {
            case 1:
                $estatus = 'Baja';
                break;
            
            case 2:
                $estatus = 'Cerrado';
                break;

            case 3:
                $estatus = 'Entregado';
                break;

            case 4:
                $estatus = 'Factura';
                break;

            case 5:
                $estatus = 'Taller';
                break;

            case 6:
                $estatus = 'Transito';
                break;
            
            default:
                echo 'estatus no econtrodo';
                break;
        }
        /*
        if ($_POST['aseguradora'] == 1) {
            $cliente = 'GNP';
        }
    
        if ($_POST['aseguradora'] == 2) {
            $cliente = 'HDI';
        }
    
        if ($_POST['aseguradora'] == 3) {
            $cliente = 'Particular';
        }
    
        if ($_POST['aseguradora'] == 4) {
            $cliente = 'QUALITAS';
        }
        */
        //recuerda que en linea se registra de otra forma ajajjaa
        $id = $_POST['expediente'];
        $id_cliente = $output;
        $id_asesor = $_POST['asesor'];
        $fecha_llegada = $_POST['fecha'];
        $marca = $output2;
        $linea = $output3;
        $color = $_POST['color'];
        $modelo = $_POST['modelo'];
        $placas = $_POST['placas'];
        $no_siniestro = $_POST['siniestro'];

    
        $resultado = $objeto2->registrar_vehiculo($id, $id_cliente, $id_asesor, $fecha_llegada, $marca, $linea, $color, $modelo, $placas, $cliente, $no_siniestro, $estatus);
        if ($resultado == 1) {
            echo 'Vehículo Registrado';
        } else {
            echo 'Vehículo no Registrado';
        }
        
        
        /* levoy a hacer cambios
        if ($resultado == 1) {
            // voy a validar que ambos id esten iguales y si no lo estan que se actyualize el id del vehiculo con el del ultimo cliente
            $resultadoidv = $objeto2->get_idCliente($id);
            $resultadoidc = $objeto->ultimo_registro();

            foreach ($resultadoidv as $key => $value) {
                $id_clientee = $value->getIdCliente();
            }

            foreach ($resultadoidc as $key => $value) {
                $id_clienteC = $value->getId();
            }

            if ($id_clientee!=$id_clienteC) {
                $updateid = $objeto2->update_idcliente($id, $id_clienteC);
            }
            echo 'Vehículo Registrado';
        }
        else{
            echo 'Vehículo no Registrado';
        }
        */
        //////
        /*
        if ($resultado == 1) {
            // voy a validar que ambos id esten iguales y si no lo estan que se actyualize el id del vehiculo con el del ultimo cliente
            $resultadoidv = $objeto2->maxidd();
            $resultadoidc = $objeto->ultimo_registro();

            foreach ($resultadoidv as $key => $value) {
                $id_clientee = $value->getIdaux();
            }

            foreach ($resultadoidc as $key => $value) {
                $id_clienteC = $value->getId();
            }

            if ($id_clienteC==$id_clientee) {
                echo 'Vehículo Registrado';
            }else {
                $updateid = $objeto2->update_idcliente($id, $id_clienteC);
                echo 'Vehículo Registrado';
            }
            
        }
        else{
            echo 'Vehículo no Registrado';
        }
        */
    
    }

?>