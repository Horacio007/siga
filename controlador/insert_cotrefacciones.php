<?php
    include("../modelo/class_refacciones_dal.php");
    include("../modelo/class_presupuesto_dal.php");

    if (isset($_POST['expediente']) && isset($_POST['concepto']) && isset($_POST['cantidad']) && isset($_POST['nombreprov1']) && isset($_POST['nombreprov2']) && isset($_POST['nombreprov3']) && isset($_POST['proveedor1']) && isset($_POST['proveedor2']) && isset($_POST['proveedor3']) && isset($_POST['tpremier']) && isset($_POST['troto']) && isset($_POST['taldo']) && isset($_POST['tproveedorf']) && isset($_POST['tcostos']) && isset($_POST['tcostosf']) && isset($_POST['tfechapromesa']) && isset($_POST['tnumguia']) && isset($_POST['tcomentarios']) && isset($_POST['fecha'])) {
        $objeto = new refacciones_dal();
        $objeto2 = new presupuesto_dal();

        $expediente = $_POST['expediente'];
        $existepresupuesto = $objeto2->exist_presupuesto($expediente);

        if ($existepresupuesto == 1) {
            $concepto = $_POST['concepto'];
            $cantidad = $_POST['cantidad'];
            $nombreprov1 = $_POST['nombreprov1'];
            $nombreprov2 = $_POST['nombreprov2'];
            $nombreprov3 = $_POST['nombreprov3'];
            $proveedor1 = $_POST['proveedor1'];
            $proveedor2 = $_POST['proveedor2'];
            $proveedor3 = $_POST['proveedor3'];
            $tpremier = $_POST['tpremier'];
            $troto = $_POST['troto'];
            $taldo = $_POST['taldo'];
            $tproveedorf = $_POST['tproveedorf'];
            $tcostos = $_POST['tcostos'];
            $tcostosf = $_POST['tcostosf'];
            $tfechapromesa = $_POST['tfechapromesa'];
            $tnumguia = $_POST['tnumguia'];
            $tcomentarios = $_POST['tcomentarios'];
            $fecha = Date('Y-m-d');

            $existecotrefacciones = $objeto->exist_cotrefaccion($expediente);
            if ($existecotrefacciones == 1) {
                echo 'La cotisacion de refacciones ya esta creada';
            } else {
                $res = $objeto->insert_cotrefacciones($expediente, $concepto, $cantidad, $nombreprov1, $nombreprov2, $nombreprov3, $proveedor1, $proveedor2, $proveedor3, $tpremier, $troto, $taldo, $tproveedorf, $tcostos, $tcostosf, $tfechapromesa, $tnumguia, $tcomentarios, $fecha);
                
                if ($res == 1) {
                    echo 1;
                } else {
                    echo 'Costeo de Refacciones no registrado';
                }
            }
            
        } else {
            echo 'No puedes cotizar refacciones si no creas primero el presupuesto';
        }
        

    }
?>