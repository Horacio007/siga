<?php 
session_start();

if(!isset($_SESSION['user'])){
    header('Location: ../index.php');
}else {
    include('../modelo/class_admin_dal.php');
    date_default_timezone_set('America/Mexico_City');
    $objeto = new admin_dal();
    $f = date("Y-m-d");
	$h = date("H:i:s");
    $R2 = $objeto->insert_logout($_SESSION['user'], $_SESSION['tipo'], $f, $h);
    session_unset();
    session_destroy();
    header('Location: ../index.php');
}

//echo 'entra la login de salda';
?>