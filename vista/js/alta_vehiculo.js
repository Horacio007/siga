$(document).ready(function(){
    //agrego la lista de marcas
    /*
    $.ajax({
        url: '/siga/controlador/s_autos.php',
        type: 'POST',
        data: {
            marcas_select: true
        },
        success: function(response) {
            //alert(response);
            // remueve el registro tambien del datatable
          document.getElementById("select_marca").innerHTML = response;

        }
    });
    */

    //agrego la fecha del dia de hoy
    var d = new Date();
    var dia = d.getDate();
    var mes = d.getMonth() + 1;
    var ano = d.getFullYear();
    var strfecha = dia+"/"+mes+"/"+ano;
    $("#ifecha").val(strfecha);

    //agrego el nuevo numero de expediento
    $.ajax({
        url: "/siga/controlador/ultimo_vehiculo_nuevo.php",
        type: "POST",
        data: {
            noexpediente: true
        },
        success: function(response) {
            $("#iexpediente").val(response);
        }
    });

    //agrego el ultimo numero de expediento
    $.ajax({
        url: "/siga/controlador/ultimo_vehiculo.php",
        type: "POST",
        data: {
            nouexpediente: true
        },
        success: function(response) {
            $("#iuexpediente").val(response);
        }
    });


    //agrego la submarca de la marca de los autos de manera automatica
    $("#sautos").change(function(){
        $.ajax({
            url: '/siga/controlador/s_autoslinea.php',
            type: 'POST',
            data: {
                submarcas_select: true,
                id_marca: $(this).val()
            },
            success: function(response) {
                //alert(response);
                // remueve el registro tambien del datatable
              document.getElementById("select_submarca").innerHTML = response;
        
            }
        });

    });

    //agrego a los asesores
    $.ajax({
        url: '/siga/controlador/s_asesores.php',
        type: 'POST',
        data: {
            select_asesor: true
        },
        success: function(response) {
            //alert(response);
            // remueve el registro tambien del datatable
          document.getElementById("select_asesor").innerHTML = response;
    
        }
    });

    //agrego las aseguradoras
    $.ajax({
        url: '/siga/controlador/s_aseguradora.php',
        type: 'POST',
        data: {
            select_aseguradora: true
        },
        success: function(response) {
            //alert(response);
            // remueve el registro tambien del datatable
          document.getElementById("select_aseguradora").innerHTML = response;
    
        }
    });

    //agrego los estatus
    $.ajax({
        url: '/siga/controlador/s_estatus.php',
        type: 'POST',
        data: {
            select_estatus: true
        },
        success: function(response) {
            //alert(response);
            // remueve el registro tambien del datatable
          document.getElementById("select_estatus").innerHTML = response;
    
        }
    });

    //boton que valida los datos para su posterior agregacion
    $("#btn_registrar").on('click', function(){
        //datos del cliente verificacion de que esten completos
        if ($("#inombre").val()=="") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Rellena el campo de Nombre',
            })

            return false
        }

        if ($("#itel").val()=="") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Rellena el campo de Telefono',
            })

            return false
        }

        if ($("#itel").val().length != 10) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Un numero telefonico esta compuesto por 10 numeros',
            })

            $("#itel").val('');

            return false
        }

        if (isNaN($("#itel").val())) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Un numero telefonico solo esta compuesto por numeros',
            })

            $("#itel").val('');

            return false
        }

        if ($("#icorreo").val()=="") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Rellena el campo de Correo Electronico',
            })

            return false
        }

        //datos del vehiculo
        if ($("#sautos").val()==0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Seleccion una marca de vehículo',
            })

            return false
        }

        if ($("#sautoslinea").val()==0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Seleccion una linea de vehículo',
            })

            return false
        }

        if ($("#imodelo").val()==0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Rellena el campo modelo',
            })

            return false
        }

        if ($("#icolor").val()==0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Rellena el campo color',
            })

            return false
        }

        if ($("#iplacas").val()==0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Rellena el campo de placas',
            })

            return false
        }

        if ($("#isiniestro").val()==0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Rellena el campo de siniestro',
            })

            return false
        }

        if ($("#sasesores").val()==0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Seleccion un asesor',
            })

            return false
        }

        if ($("#saseguradora").val()==0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Seleccion una aseguradora',
            })

            return false
        }

        if ($("#sestatus").val()==0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Seleccion un estatus',
            })

            return false
        }

        //creo el arreglo que mandara la informacion 
        //agrego la fecha en el formato correcto para almacenarla en la bd
        var strfechabd = ano+"-"+mes+"-"+dia;

        //creo el arreglo del cliente
        var datac = {
            ncliente: $("#inombre").val(),
            tel: $("#itel").val(),
            correo: $("#icorreo").val()
        }

        //creo el arreglo del vehiculo
        var datav = {
            fecha: strfechabd,
            expediente: $("#iexpediente").val(),
            marca: $("#sautos").val(),
            submarca: $("#sautoslinea").val(),
            modelo: $("#imodelo").val(),
            color: $("#icolor").val(),
            placas: $("#iplacas").val(),
            siniestro: $("#isiniestro").val(),
            asesor: $("#sasesores").val(),
            aseguradora: $("#saseguradora").val(),
            estatus:  $("#sestatus").val()
        }

        //console.log(datav.fecha, datav.expediente, datav.marca, datav.submarca, datav.modelo, datav.color, datav.placas, datav.siniestro, datav.asesor, datav.aseguradora)

        //registro primero el cliente
        $.ajax({
            url: '/siga/controlador/insert_cliente.php',
            type: 'POST',
            data: datac,
            success: function(result){
                //console.log(result);
                //var id_cliente = result;
                /*
                Swal.fire({
                    icon: 'success',
                    title: 'Correcto',
                    text: result,
                })
                */
            }
        });
        
        //registro ahora el vehiculo
        $.ajax({
            url: '/siga/controlador/insert_vehiculo.php',
            type: 'POST',
            data: datav,
            success: function(result){
                Swal.fire({
                    icon: 'success',
                    title: 'Correcto',
                    text: result,
                })
                document.getElementById("formdata").reset();
                //agrego la fecha del dia de hoy
                var d = new Date();
                var dia = d.getDate();
                var mes = d.getMonth() + 1;
                var ano = d.getFullYear();
                var strfecha = dia+"/"+mes+"/"+ano;
                $("#ifecha").val(strfecha);

                //agrego el nuevo numero de expediento
                $.ajax({
                    url: "/siga/controlador/ultimo_vehiculo_nuevo.php",
                    type: "POST",
                    data: {
                        noexpediente: true
                    },
                    success: function(response) {
                        $("#iexpediente").val(response);
                    }
                });

                //agrego el ultimo numero de expediento
                $.ajax({
                    url: "/siga/controlador/ultimo_vehiculo.php",
                    type: "POST",
                    data: {
                        nouexpediente: true
                    },
                    success: function(response) {
                        $("#iuexpediente").val(response);
                    }
                });
            }
        });
                
    });

    //evento que muestra un mensaje al darle click en el input del siniestro
    $("#isiniestro").on('click', function(){
        //console.log("si jala");
        Swal.fire({
            icon: 'warning',
            title: 'Atención',
            text: 'Si es un trabajo particular poner "N/A", de lo contrario el No. de Siniestro',
        })
    })
})