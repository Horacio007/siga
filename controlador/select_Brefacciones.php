<?php
    include("../modelo/class_vehiculo_dal.php");
    
    if (isset($_POST['id'])) {

        $id = $_POST['id'];
        //echo 'entro';

        $objeto = new vehiculo_dal();
        $asd = $objeto->exist_vehiculo($id);

        if ($asd == 1) {
            $r = $objeto->select_refaccionesbyId($id);
            $ar = array();
            
            foreach($r as $key => $value){
                $id = $value->getId();
                $refacciones = $value->getRefacciones();
                $proveedor1 = $value->getProveedor_1();
                $refaccionaria1 = $value->getRefaccionaria_1();
                $fecha1 = $value->getFechaPromesa_1();
                $proveedor2 = $value->getProveedor_2();
                $refaccionaria2 = $value->getRefaccionaria_2();
                $fecha2 = $value->getFechaPromesa_2();
                $proveedor3 = $value->getProveedor_3();
                $refaccionaria3 = $value->getRefaccionaria_3();
                $fecha3 = $value->getFechaPromesa_3();

            }

            switch ($refacciones) {
                case 'Revision':
                    $esrefas = 1;
                    break;

                case 'Cotizacion':
                    $esrefas = 2;
                    break;

                case 'Proveedores Asignados':
                    $esrefas = 3;
                    break;

                case 'Refacciones Disponibles':
                    $esrefas = 4;
                    break;

                case 'Complemento':
                    $esrefas = 5;
                    break;
                default:
                    $esrefas = 'No existen estatus para las refacciones';
                    break;
            }

            $val = array(
                'result' => 1,
                'id' => $id,
                'refacciones' => $esrefas,
                'proveedor1' => $proveedor1,
                'refaccionaria1' => $refaccionaria1,
                'fecha1' => $fecha1,
                'proveedor2' => $proveedor2,
                'refaccionaria2' => $refaccionaria2,
                'fecha2' => $fecha2,
                'proveedor3' => $proveedor3,
                'refaccionaria3' => $refaccionaria3,
                'fecha3' => $fecha3
            );
            
            echo json_encode($val);
        } else {
            echo 0;
        }
    } 
    
?>