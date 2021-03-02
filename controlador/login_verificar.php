<?php
include('../modelo/class_admin_dal.php');
date_default_timezone_set('America/Mexico_City');

if (isset($_POST["usuario"]) && $_POST["contrasena"]) {
	$user = $_POST["usuario"];
	$password = $_POST["contrasena"];
	session_start();
	$_SESSION['user'] = $user;
	$_SESSION['timeout'] = time();

	$objeto = new admin_dal();
	$resultado = $objeto->exists_usuario($user,$password);
	
	//echo $resultado;
	if ($resultado == 1) {
		$r = $objeto->tipo_usuario($user,$password);

		foreach ($r as $key => $value) {
			$tipo = $value->getTipo();
		}
		$_SESSION['tipo'] = $tipo;

		$f = date("Y-m-d");
		$h = date("H:i:s");

		//echo $f .' '. $h;

		$R2 = $objeto->insert_login($user, $tipo, $f, $h);

		echo 1;
	} else {
		echo 'Usuario o Contraseña Incorrecta';
	}
	}
?>