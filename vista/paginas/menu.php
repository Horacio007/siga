<?php 
  include_once '../incluciones/sesion.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <title>SIGA</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="icon" href="/siga/vista/img/dtrblanco.ico" type="image/png" />
    <link rel="stylesheet" href="/siga/vista/css/menu.css">
  </head>
  <body>
    <header>
      <!-- Se grega el navbar -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#" id="dtrIndex" >DTR</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Recepcíon</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#" id="altaVehiculo" >Alta del Vehículo</a>
                <a class="dropdown-item" href="#" id="altachecklist">Checklist</a>
                <a class="dropdown-item" href="#" id="checklistpdf">Checklist PDF</a>
                <a class="dropdown-item" href="#" id="evidenciafirma">Evidencia y Firma</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Costeo</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#" id="presupuestoini">Presupuesto Inicial</a>
                <a class="dropdown-item" href="#" id="actualizarpresupuestoini">Actualizar Presupuesto</a>
                <a class="dropdown-item" href="#" id="presupuestopdf">Presupuesto PDF</a>
                <a class="dropdown-item" href="#" id="evidencipresupuesto">Subir Evidencia</a>
            </li> 
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Compras</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#" id="cotizarrefacciones">Cotizar Refacciones</a>
                <a class="dropdown-item" href="#" id="refaccionespd">Refacciones PDF</a>
                <a class="dropdown-item" href="#" id="listarefaccionespd">Listado de Refacciones PDF</a>
                <a class="dropdown-item" href="#" id="evidenciarefacciones">Subir Evidencia</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Almacen</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#" id="altarefacciones">Alta Refacciones</a>
                <a class="dropdown-item" href="#" id="bajarefacciones">Baja Refacciones</a>
                <a class="dropdown-item" href="#" id="listarefacciones">Listado de Refacciones</a>
                <a class="dropdown-item" href="#" id="listaentregadas">Listado de Refacciones Entregadas</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Taller</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" id="ordentrabajo" href="#">Orden de Trabajo</a>
                <a class="dropdown-item" id="listaordentrabajo" href="#">Listado Ordenes de Trabajo</a>
                <a class="dropdown-item" id="ordenmecanica" href="#">Orden de Mecanica</a>
                <a class="dropdown-item" id="listaordenmecanica" href="#">Listado Ordenes de Mecanica</a>
                <a class="dropdown-item" id="ordenretrabajo" href="#">Orden de Re-Trabajo</a>
                <a class="dropdown-item" id="listaordenretrabajo" href="#">Listado Ordenes de Re-Trabajo</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Entrega</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#" id="documentosEntrega" >Documentación</a>
                <a class="dropdown-item" href="#" id="estatus_vehiculo">Estatus Vehículo</a>
                <a class="dropdown-item" href="#" id="isccliente">ISC</a>
                <a class="dropdown-item" href="#" id="subir_archivo">Subir Archivos</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Administración</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#" id="agregarLinea">Agregar Linea</a>
                <a class="dropdown-item" href="#" id="verarchivos">Ver Archivos</a>
                <a class="dropdown-item" href="#" id="valuaciones">Valuaciones</a>
                <a class="dropdown-item" href="#" id="brefacciones">Refacciones</a>
                <a class="dropdown-item" href="#" id="asignacion_personal">Asignacion de Personal</a>
                <a class="dropdown-item" href="#" id="procesoTaller">Seguimiento Taller</a>
                <a class="dropdown-item" href="#" id="procesoAdmon">Proceso Administrativo</a>
                <a class="dropdown-item" href="#" id="procesosegtaller">Proceso Taller</a>
                <a class="dropdown-item" href="#" id="metricoss">Metricos</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Costos</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#" id="gastos">Cargar Gastos</a>
                <a class="dropdown-item" href="#" id="a_gastos">Resumen Gastos</a>
                <a class="dropdown-item" href="#" id="tipogmes">Tipo Gasto por Mes</a>
                <a class="dropdown-item" href="#" id="hisgastos">Historico de Gastos</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ingresos</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#" id="fact">Cargar Facturas</a>
                <a class="dropdown-item" href="#" id="afact">Resumen Facturas</a>
                <a class="dropdown-item" href="#" id="ingr">Cargar Ingresos</a>
                <a class="dropdown-item" href="#" id="resingr">Resumen Ingresos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/siga/controlador/login_cerrar.php">Cerrar Sesión</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <!-- Contenedor principal donde se moestrara la informacion -->
    <div class="container-fluid" id="principal">
      <div class= "container-fluid">
        <div class = "row">
          <div class ="col text-center">
            <h1 id ="hbienvenidos">Bienvenido al Sistema Integral de Gestión Automotriz</h1>
            <h1 id ="hbienvenidos">Usuario: <?php echo $_SESSION['user'].' -> '.$_SESSION['tipo']?></h1>
          </div>
        </div>
      </div>
    </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="/siga/vista/js/index.js"></script>
  </body> 
</html>