<?php

    include("../modelo/class_vehiculo_dal.php");
    include("../modelo/class_archivos_dal.php");

   //var_dump($_FILES['izip']);
    //print_r($_FILES['izip']['name']);
    if (isset($_POST['iexpediente']) && !empty($_FILES['izip'])) {
        //echo 'no viene vacio niguno de los dos'; y se valida la iformacion que si este todo bien :)
        $objeto = new vehiculo_dal();
        $objeto2 = new archivos_dal();
        $id = $_POST['iexpediente'];
        $resultado = $objeto->exist_vehiculo($id);
        $resultado2 = $objeto2->exist_archivo($id);

        if ($resultado == 1 && $resultado2 == 1) {
            $files_post = $_FILES['izip'];
            $files = array();
            $files_count = count($files_post['name']);
            $files_key = array_keys($files_post);
            $allowTypes = array('jpg','png','jpeg','gif','pdf',"mp4", "mpg", "mpeg", "avi", "mp3", "3gpp", "wmv", "asf", "mov", "flv", "rm", "rmvb", "mkv", "mks", "xlsx");

            for ($i=0; $i < $files_count; $i++) { 
                foreach ($files_key as $key){
                    $files[$i][$key] = $files_post[$key][$i];
                }
            }

            for ($i=0; $i < count($files); $i++) { 
                if ($files[$i]['error'] != 0) {
                    exit('Hubo un problema al cargar el archivo y/o Vehiculo no encontrado y/o registrado');
                }
            }

            //se empieza a guardar la informacion comenzando con crear una carpeta con el nombre del expediente
            $directorio = '../files/';
            $carpeta = $directorio.$id;

            //mkdir($carpeta, 0777, true);
                    //echo 'Carpeta creada';
                    $archivossubidos = 0;
                    for ($i=0; $i < count($files); $i++) {
                        $archivo = $carpeta.'/'.basename($files[$i]['name']);
                        $tipoarchivo = pathinfo($archivo, PATHINFO_EXTENSION);
                        //echo $allowTypes[$i].'---'.$tipoarchivo;
                        if (in_array($tipoarchivo, $allowTypes)) {
                            $archivo = $carpeta.'/'.basename($files[$i]['name']);
                            $origen = $files[$i]['tmp_name'];
                            move_uploaded_file($origen, $archivo);
                            $archivossubidos+=1;
                            //echo 'archivos subidos';
                        } else {
                            exit('Hubo un problema al cargar el archivo no es un formato admitido: jpg, png, jpeg, gif, pdf, mp4, mpg, mpeg, avi, mp3, 3gpp, wmv, asf, mov, flv, rm, rmvb, mkv, mks, xlsx');
                        }
                    }
                    $carpeta2 = $carpeta.'/';
                    //$r = $objeto2->insert_archivo($id, $carpeta2);
                    $total_imagenes = count(glob($carpeta.'/{*.jpeg,*.jpg,*.gif,*.png,*.pdf,*.mp4,*.mpg,*.mpeg,*.avi,*.mp3,*.3gpp,*.wmv,*.asf,*.mov,*.flv,*.rm,*.rmvb,*.mkv,*.mks,*.xlsx}',GLOB_BRACE));
                    //echo $total_imagenes.' '.$files_count.' '.$r;
                    echo 'Evidencia almacenada';
                    /*
                    if ($archivossubidos == $files_count) {
                        echo 'Evidencia almacenada';
                    } else {
                        echo 'Evidencia no almacenada';
                    }
                    */
        } else {
            echo 'Hubo un problema al cargar el archivo y/o Vehiculo no encontrado y/o registrado y/o Carpeta no creada';
        }
    }
?>