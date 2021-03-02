<?php
$archivo='../files/4420102020.zip';
/*
header('Content-Description: File Transfer');
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename='.basename($file_example));
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($file_example));
ob_clean();
flush();
readfile($file_example);
exit;
*/

$nombre = basename($archivo);
header('Content-Type: application/zip');
header("Content-Transfer-Encoding: Binary");
header("Content-disposition: attachment; filename=$nombre");
readfile($nombre);

    /*
    $dir = '../files/';
    // Abre un directorio conocido, y procede a leer el contenido
    if (is_dir($dir)) {
        if ($dira = opendir($dir)) {
            //echo readdir($dira);
            //print_r(scandir($dir[3]));
            while (($file = readdir($dira)) !== false){
                echo 'Nombre del archivo -> '.$file."\n".'Tipo archivo -> '. filetype($dir.$file);
            }

        }
    }
    */
?>