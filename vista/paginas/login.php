<!doctype html>
<html lang="en">
  <head>
    <title>SIGA</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/vnd.microsoft.icon" href="/siga/vista/img/dtrblanco.ico" sizes="16x16 32x32">
    <link rel="stylesheet" href="/siga/vista/css/login.css">
</head>
  <body>
    <div class="container-fluid">
      <form action="" id="formdata">
        <div class="row">
          <div class="col text-center">
            <img src="/siga/vista/img/dtrlogoblanco.jpg" alt="logo no cargado" id="logodtr">
          </div> 
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-4 text-center">
            <input type="text" class="form-control" name="isuario" id="iusuario" placeholder="&#xF007; Usuario" required>
          </div>
          <div class="col-md-4"></div>
        </div>
        <br>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-4 text-center">
            <input type="password" class="form-control" name="icontrasena" id="icontrasena" placeholder="&#xF09C; Contraseña" required>
          </div>
          <div class="col-md-4"></div>
        </div>
        <br>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-4 text-center">
            <div class="g-recaptcha" data-sitekey="6LfH4u0UAAAAAP2iM5RpHHbBYMk1sMkmqVzg-6tm"  id="irecaptcha"></div>
          </div>
          <div class="col-md-4"></div>
        </div>
        <br>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-4 text-center">
            <button type="button" class="btn btn-primary btn-lg btn-block" id="btn_login">Entrar</button>
          </div>
          <div class="col-md-4"></div>
        </div>
      </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/63b2220411.js" crossorigin="anonymous"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="/siga/vista/js/login.js"></script>
  </body>
</html>