$(document).ready(function(){
    //console.log("Estoy en el checklist inicial")

    
    $("#btn_Buscar").on('click', function(){
        //console.log("entra al boton");
        var data = {
            id: $("#iexpediente").val()
        }

        $.ajax({
            url: '/siga/controlador/existe_vehiculo.php',
            type: 'POST',
            data: data,
            success: function(response){
                if (response == 1) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oopps...',
                        text: 'Vehiculo no encontrado/registrado',
                    })
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: 'Correcto',
                        text: 'Checklist Creado',
                    })
                    document.getElementById("generarpdf").innerHTML = response;
                }
                
            }
        })
    });
})