$(document).ready(function(){
    //agrego la marca ala cual se le agregara una nueva linea
    $.ajax({
        url: '/siga/controlador/s_autos.php',
        type: 'POST',
        data: {
            marcas_select: true
        },
        success: function(result){
            $("#select_marca").html(result);
        }
    });

    // boton que registra la nueva linea
    $("#btn_registrar").on('click', function(){
        //valido que este selecionado una marca
        if ($("#sautos").val()==0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Seleccion una marca de vehículo',
            })

            return false
        }

        //verifico que no este vacio submarca a registrar
        if ($("#ilinea").val()==0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Agrega la linea a registrar',
            })

            return false
        }

        // creo un array con la info a guardar
        var data = {
            marca: $("#sautos").val(),
            linea: $("#ilinea").val()
        }
        //console.log(data.marca, data.linea);
        //registro la informacion con un ajax
        $.ajax({
            url: '/siga/controlador/insert_linea.php',
            type: 'POST',
            data : data,
            success: function(result){
                if (result == 1) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Correcto',
                        text: 'Linea agregada correctamente',
                    })
                    document.getElementById("formdata").reset();
                }else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: result,
                    })
                    document.getElementById("formdata").reset();
                }
            }
        });
    });

})