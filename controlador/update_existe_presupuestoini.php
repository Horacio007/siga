<?php
    include("../modelo/class_vehiculo_dal.php");
    include("../modelo/class_cliente_dal.php");
    include("../modelo/class_presupuesto_dal.php");

    //obtengo la informacion del vehiculo
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $objv = new vehiculo_dal();
        $objp = new presupuesto_dal();

        $exv = $objv->exist_vehiculo($id);
        $exp = $objp->exist_presupuesto($id);

        if ($exv == 1 && $exp == 1) {
            $dia = date("d");
            $mes = date('m');
            $año = date('Y');

            $objeto = new vehiculo_dal();
            $resultado = $objeto->checklist_inicial($id);

            $objeto2 = new cliente_dal();

            foreach ($resultado as $key => $value) {
                $expediente = $value->getId();
                $id_cliente = $value->getIdCliente();
                $marca = $value->getMarca();
                $linea = $value->getLinea();
                $modelo = $value->getModelo();
                $color = $value->getColor();
                $placas = $value->getPlacas();
                $aseguradora = $value->getCliente();
            }

            //obtengo la informacion del cliente
            $resultado2 = $objeto2->checklist_inicial($id_cliente);

            foreach ($resultado2 as $key => $value) {
                $nombre = $value->getNombre();
                $tel = $value->getTelefono();
                $correo = $value->getCorreo();
            }

            //saco el estatus del vehiculo
            $rest = $objeto->get_Estatus($id);
            foreach ($rest as $key => $value) {
                $estatusv = $value->getEstatus();
            }

            //obtengo la informacion del presupeusto
            $objeto3 = new presupuesto_dal();

            $resultado3 = $objeto3->select_data($id);
            foreach ($resultado3 as $key => $value) {
                $op = $value->getOp();
                $nivel = $value->getNivel();
                $concepto = $value->getConcepto();
                $momh = $value->getMomh();
                $momp = $value->getMomp();
                $momm = $value->getMomm();
                $tot = $value->getTot();
                $refacciones = $value->getRefacciones();
                $tmomh = $value->getTmomh();
                $tmomp = $value->getTmomp();
                $tmomm = $value->getTmomm();
                $ttot = $value->getTtot();
                $trefacciones = $value->getTrefacciones();
                $subtotal = $value->getSubTotal();
                $iva = $value->getIva();
                $total = $value->getTotal();

            }
            
            //creo el array para el cual contendra la informacion a actualizar
            $data = array('result' => 1, 
                        'op' => $op,
                        'nivel' => $nivel,
                        'concepto' => $concepto,
                        'momh' => $momh,
                        'momp' => $momp,
                        'momm' => $momm,
                        'tot' => $tot,
                        'refacciones' => $refacciones,
                        'tmomh' => $tmomh,
                        'tmomp' => $tmomp,
                        'tmomm' => $tmomm,
                        'ttot' => $ttot,
                        'trefacciones' => $trefacciones,
                        'subtotal' => $subtotal,
                        'iva' => $iva,
                        'total' => $total
                        );

            echo json_encode($data);
           
        } else {
            echo 'Primero debes crear el Presupuesto Inicial';
        }
        
    }
?>