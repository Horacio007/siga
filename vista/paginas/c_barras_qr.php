<?php 
    include_once '../incluciones/sesion.php';

    if ($_SESSION['user'] == 'Raul' || $_SESSION['user'] == 'Karen' || $_SESSION['user'] == 'Alfredo' || $_SESSION['user'] == 'Erika') {
        header("Refresh:");
        echo 'No tienes permisos para acceder';
        die();
        exit();
    }
  
?>
    <link rel="stylesheet" type="text/css" href="/siga/vista/libs/DataTables-1.10.22/css/jquery.dataTables.css"/>
    <link rel="stylesheet" type="text/css" href="/siga/vista/libs/Buttons-1.6.5/css/buttons.dataTables.css"/>
    <link rel="stylesheet" type="text/css" href="/siga/vista/libs/Responsive-2.2.6/css/responsive.dataTables.css"/>
    <link rel="stylesheet" type="text/css" href="/siga/vista/libs/Select-1.3.1/css/select.dataTables.css"/>
    <link rel="stylesheet" href="/siga/vista/css/c_barras_qr.css">
    <div class="container-fluid">
        <form action="" class="formdata" id="formdata">
            <div class="row">
                <div class="col text-center">
                    <h3>Creación de Codigo de Barras y QR</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="">Contenido</label>
                    <input type="text" id="icontenido" class="form-control" require>
                </div>
                <div class="col-md-2">
                    <label for=""></label>
                    <button type="button" class="btn btn-primary btn-lg btn-block" id="btn_cbarras">Barras</button>
                </div>
                <div class="col-md-2">
                    <label for=""></label>
                    <button type="button" class="btn btn-primary btn-lg btn-block" id="btn_cqr">QR</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 text-center">
                    <img id="barcode"></img>
                </div>
                <div class="col-md-6 text-center">
                    <br>
                    <div id="qrcode" class="col text-center"></div>
                </div>
            </div>
        </form>
    </div>
    <script src="/siga/vista/js/c_barras_qr.js"></script>
    <script type="text/javascript" src="/siga/vista/js/qrcode.js"></script>
    <script type="text/javascript" src="/siga/vista/js/JsBarcode.all.min.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/pdfmake-0.1.36/pdfmake.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/DataTables-1.10.22/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Buttons-1.6.5/js/dataTables.buttons.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Buttons-1.6.5/js/buttons.flash.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Buttons-1.6.5/js/buttons.html5.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Responsive-2.2.6/js/dataTables.responsive.js"></script>
    <script type="text/javascript" src="/siga/vista/libs/Select-1.3.1/js/dataTables.select.js"></script>