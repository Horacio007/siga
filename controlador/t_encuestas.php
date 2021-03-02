<?php

    include("../modelo/class_isc_dal.php");
    include("../modelo/class_cliente_dal.php");

    if (isset($_POST['catalago_encuestas'])) {
       $objeto = new isc_dal();
       $objeto1 = new cliente_dal();

       $e = $objeto->list_encuestas();

       if ($e != NULL) {
            foreach ($e as $key => $value) {

                $salida ="<tr>
                <td>".$value->get_idVehiculo()."</td>
                <td>".$value->get_idCliente()."</td>
                <td>".$value->get_atendio()."</td>
                <td>".$value->get_fecha()."</td>
                <td>".$value->get_p1()."</td>
                <td>".$value->get_p2()."</td>
                <td>".$value->get_p3()."</td>
                <td>".$value->get_p4()."</td>
                <td>".$value->get_p5()."</td>
                <td>".$value->get_p6()."</td>
                <td>".$value->get_p7()."</td>
                <td>".$value->get_total()."</td>
                </tr>";
                echo $salida;

            }
       } else {
           echo 'No hay encuestas registradas';
       }
    }



?>