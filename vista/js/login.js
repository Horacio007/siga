$(document).ready(function(){
    //si esta entrando al js
    //console.log("funciona");
    $("#btn_login").on("click", function(){
        //vallido que esta entrando al boton y creo una variable que contiene el control recaptcha
        //console.log("Entra al boton de entrar al login");
        var captcha = grecaptcha.getResponse();

        //valido que el campo de usuario no este vacio
        if ($("#iusuario").val()=="") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Rellena el campo de Usuario',
            })

            return false
        }

        //valido que el campo de conttraseña no este vacio
        if ($("#icontraseña").val()=="") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Rellena el campo de Contraseña',
            })
              
            return false
        }

        //valido que el control captcha este marcado y pasado
        if (captcha==0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Marca la casilla de ReCaptcha',
            })
              
            return false
        }
        // creo un json/diccionario para poder mandar la informacion ppor ajax
        var data = {
            usuario: $("#iusuario").val(),
            contrasena: $("#icontrasena").val()
        }

        
        //console.log(data.usuario, data.contrasena)
        //hago una peticion ajax para saber que si existe el usuario y contraseña
        $.ajax({
            url: "/siga/controlador/login_verificar.php",
            type: "POST",
            data: data,
            success: function (result) {
                //console.log(result)
                if (result == 1) {
                    //console.log(result);
                    document.getElementById("formdata").reset();
                    grecaptcha.reset();
                    window.location.href = '/siga/vista/paginas/menu.php';
                } else {
                    //console.log(result)
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: result,
                    })
                    document.getElementById("formdata").reset();
                    grecaptcha.reset();
                }
            }   
        });
       
    });
});