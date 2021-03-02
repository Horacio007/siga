<?php 
  include_once '../incluciones/sesion.php';

    if ($_SESSION['user'] == 'Alfredo' || $_SESSION['user'] == 'Ernesto' || $_SESSION['user'] == 'Karen' || $_SESSION['user'] == 'Erika') {
        header("Refresh:");
        echo 'No tienes permisos para acceder';
        die();
        exit();
    }
?>
    <div class="container-fluid">
        <form action="" enctype="multipart/form-data" method="post" id="formdata">
            <div class="row">
                <div class="col text-center">
                    <h3>Subir Presupuesto Inicial y Evidencia</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <label for="lexpediente">No. Expediente</label>
                    <input type="text" name="iexpediente" id="iexpediente" class="form-control" require>
                </div>
                <div class="col-md-4"></div>
            </div> 
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <label for="lexpediente">Archivos</label>
                    <input type="file" name ="izip[]" id="izip" class="form-control" multiple require>
                </div>
                <div class="col-md-4"></div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="wrapper" style="display: none">
                        <div class="progress progress_wrapper">
                            <div class="progress-bar progress-bar-striped bg-info progress-bar-animated progress_bar" role="progressbar" style="width: 0%;">0%</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <label for=""></label>
                    <button type="button" class="btn btn-primary btn-lg btn-block" id="btn_subir">Subir</button>
                </div>
                <div class="col-md-4"></div>
            </div>

        </form>
    </div>

    <script src="/siga/vista/js/altaarchivospresupuesto.js"></script>