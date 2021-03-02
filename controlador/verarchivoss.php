<?php
    include("../modelo/class_vehiculo_dal.php");
    include("../modelo/class_archivos_dal.php");

    if ($_POST['expediente']) {
        //echo 'si esta entrando al registrado el archivo';
        $expediente = $_POST['expediente'];
        $objeto = new archivos_dal();
        $r = $objeto->exist_archivo($expediente);
        if ($r == 1) {
            //echo 'Archivos encontrados';
            $carpeta = $objeto->ruta($expediente);
            foreach ($carpeta as $key => $value) {
                $rcarpeta = $value->getRuta();
            }
            //echo $rcarpeta;
            if (is_dir($rcarpeta)) {
                //echo 'si es una carpeta';
                if (($dir = opendir($rcarpeta)) !== false) {
                    //echo 'abre la carpeta';

                    while (($file = readdir($dir)) !== false) {
                        if ($file != '.' && $file != '..') {
                            //echo "nombre archivo: $file : tipo archivo: " . filetype($rcarpeta . $file) . "\n";
                            $rcompleta = $rcarpeta."".$file;
                            $rcompletanueva = $rcarpeta."".str_replace(" ","_",$file);
                            $e = explode("/", $rcarpeta);
                            $rcnv2 = "/siga/files/".$e[2];
                            //echo $rcnv2;
                            if (rename($rcompleta, $rcompletanueva)) {
                                
                                $t = '<tr>';
                                $t.= '<th>';
                                $t.= '<a target="_blank" href='.$rcnv2."/".str_replace(" ","_",$file);
                                $t.= ">".str_replace(" ","_",$file)."</a>";
                                $t.= '</th>';
                                $t.= '</tr>';
                                echo $t;
                            } else {
                                echo 'Error al abrir archivos';
                            }
                            
                            //echo $rcompletanueva;
                            //echo $rcompleta;
                            
                        }
                    }
                    closedir($dir);

                } else {
                    echo 'Error al abrir los archivos';
                }
                
            } else {
                echo 'El archivo no es una carpeta';
            }
            

        } else {
            echo 'Archivos no creados y/o registrados';
        }
        
    } else {
        echo 'Archivo no creado y/o registrado';
    }
    

?>