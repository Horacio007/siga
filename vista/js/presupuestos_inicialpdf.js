$(document).ready(function(){
    //console.log("Estoy en el checklist inicial")

    $("#btn_Buscar").on('click', function(){
        //console.log("entra al boton");
        var data = {
            id: $("#iexpediente").val()
        }

        
        $.ajax({
            url: '/siga/controlador/existe_presupuestoini.php',
            type: 'POST',
            data: data,
            success: function(response){
                if (response == 1) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oopps...',
                        text: 'Presupuesto no encontrado/registrado',
                    })
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: 'Correcto',
                        text: 'Presupuesto Incial Creado',
                    })
                    document.getElementById("generarpdf").innerHTML = response;
                }
                
            }
        })
    });
})