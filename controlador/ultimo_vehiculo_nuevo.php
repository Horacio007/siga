<?php
    include("../modelo/class_vehiculo_dal.php");
    date_default_timezone_set('America/Mexico_City');
    
    if (isset($_POST["noexpediente"])) {
        $objeto = new vehiculo_dal();
        $resultado = $objeto->ultimo_registro();
        
        foreach ($resultado as $key => $value) {
            $output = $value->getId();
        }

        switch ($output) {
            case strlen($output) == 9:
                $hoy = date("dmY");
                $output += 100000000;
                settype($output, 'string');
                settype($hoy, 'string');
                $expediente = $output[0];
                $expediente .=$hoy;
                settype($expediente, 'integer');
                echo $expediente;
                break;

            case strlen($output) == 10:
                $hoy = date("dmY");
                $output += 100000000;
                settype($output, 'string');
                settype($hoy, 'string');
                $expediente = $output[0];
                $expediente .= $output[1];
                $expediente .=$hoy;
                settype($expediente, 'integer');
                echo $expediente;
                break;

            case strlen($output) == 11:
                $hoy = date("dmY");
                $output += 100000000;
                settype($output, 'string');
                settype($hoy, 'string');
                $expediente = $output[0];
                $expediente .= $output[1];
                $expediente .= $output[2];
                $expediente .=$hoy;
                settype($expediente, 'integer');
                echo $expediente;
                break;
            
            default:
                echo "No hay vehiculos registrados";
                break;
        }
    }
    
?>