<?php
    include("../modelo/class_vehiculo_dal.php");
    
    if (isset($_POST['catalago_vrecibidos'])) {
        $objeto = new vehiculo_dal();
        
        //total del mes
        $tvR = $objeto->total_V_RMes();

        if ($tvR!=NULL) {
            //total del mes
            $tv = $objeto->total_V_RMes();

            foreach($tv as $key => $value){
                $totalv = $value->getEstatus();
            }
            //total de qualitas
            $tq = $objeto->total_V_RMesQ();

            foreach($tq as $key => $value){
                $totalq = $value->getEstatus();
            }
            //total del mes de gnp
            $tg = $objeto->total_V_RMesG();

            foreach($tg as $key => $value){
                $totalg = $value->getEstatus();
            }
            //total del mes de particulares
            $tp = $objeto->total_V_RMesP();

            foreach($tp as $key => $value){
                $totalp = $value->getEstatus();
            }

            $nom = ['Qualitas', 'GNP', 'Particular', 'Total'];
            $val = [$totalq, $totalg, $totalp, $totalv];

            for ($i=0; $i < 4; $i++) { 
                $salida ="<tr>
                <td>".$nom[$i]."</td>
                <td>".$val[$i]."</td>
                </tr>";

            echo $salida;
            }

        } else {
            echo 'No se encontraron vehiculos rergistradas';
        }
        
    } 
    
?>