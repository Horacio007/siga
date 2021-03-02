$(document).ready(function(){
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

    //agrego el estatus de las refaciones
    //agrego los estatus
    $.ajax({
        url: '/siga/controlador/s_estatusalmacen.php',
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

    //le agrego al ernestus un buscador para que no busque mucho 
    $.ajax({
        url: '/siga/controlador/t_almacenvehiculos.php',
        type: 'POST',
        data: {
            catalago_valuaciones: true
        },
        success: function(result){
            document.getElementById("listado_vehiculos").innerHTML = result;

            if($("#lista_vehiculos").length){
                $('#lista_vehiculos').DataTable({
                    dom: 'Blfrtip',
                    buttons: [{
                            extend: 'excelHtml5',
                            messageTop: 'Vehiculos',
                            text: "Excel",
                            title: "Listado de Vehiuclos",
                        },
                        {
                            /*'csvHtml5',*/
                            extend: 'csvHtml5',
                            text: "CSV",
                            title: "Listado de Vehiculos",
                            messageTop: 'Listado de Vehiculos',
                        },
                        {
                            extend: 'pdfHtml5',
                            title: 'Listado de Vehiculos'
                        }
                    ],
                    responsive: true,
                    destroy: true,
                    language: {
                        "sProcessing":     "Procesando...",
                                    "sLengthMenu":     "Mostrar _MENU_ registros",
                                    "sZeroRecords":    "No se encontraron resultados",
                                    "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
                                    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                                    "sInfoPostFix":    "",
                                    "sSearch":         "Buscar:",
                                    "sUrl":            "",
                                    "sInfoThousands":  ",",
                                    "sLoadingRecords": "Cargando...",
                                    "oPaginate": {
                                        "sFirst":    "Primero",
                                        "sLast":     "Último",
                                        "sNext":     "Siguiente",
                                        "sPrevious": "Anterior"
                                    },
                                    "oAria": {
                                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                                    },
                                    "buttons": {
                                        "copy": "Copiar",
                                        "colvis": "Visibilidad"
                                    }
                    },
                    select: true,
    
                });

            }
            else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'No se encontraron vehiculos registrados',
                })
    
                return false
            }
        }
    })

    $("#btn_buscar").on('click', function(){

        //le pongo la condicion de que va a ser una refaccion disponible
        if ($("#iexpediente").val() == "123" || $("#iexpediente").val() == "456") {
            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: 'Recuerda que estas dando de alta una refaccion disponible con 123 y/o Recuerda que estas dando de alta una refaccion a devolucion con 456',
            })
            $("#iexpediente").attr("readonly","readonly"); 
            $("#iexpediente2").val($("#iexpediente").val());   
            $("#iexpediente2").attr("readonly","readonly");    
            
        } else {

        //hago la peticion ajax
            $.ajax({
                url: '/siga/controlador/existe_cotrefaccionesin.php',
                type: 'POST',
                data: {
                    id: $("#iexpediente").val()
                },
                success: function(result){
                    //console.log(result);
                    if (result == 1) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Correcto',
                            text: 'Vehiculo Encontrado',
                        })
                        $("#iexpediente").attr("readonly","readonly"); 
                        $("#iexpediente2").val($("#iexpediente").val());   
                        $("#iexpediente2").attr("readonly","readonly");
                        
                        //intento si no jala borrar jajajja
                        $.ajax({
                            url: '/siga/controlador/get_MLM.php',
                            type: 'POST',
                            data: {
                                id: $("#iexpediente").val()
                            },
                            success: function(result){
                                arr = JSON.parse(result);
                                //console.log(arr);
                                $("#inf").fadeIn();
                                $("#inf").css('border-radius', '5px');
                                $("#inf").css('background-color', '#53ee7e'); 
                                $("#info").text('Vehiculo: '+ arr['marca'] + ' ' + arr['linea'] + ' ' + arr['modelo']);
                            }
                        })


                        //intento borrrar jajaj
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Vehiculo no encontrado y/o registrado',
                        })
                        document.getElementById("formdata").reset();
                    }
                }
            })
        }
    })

    //le agrego unas frases para poder dejar el dateee
    $("#ifechaentrega").on('click', function(){
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            text: 'Recuerda ingresar la fecha de entrega solo si se entrega el mismo dia de llegada.\nDe lo contrario dejar en blanco',
        })

    })

    $("#btn_registrar").on('click', function(){
        //le agrego las cosas para saber que si estan llenos los campos
        if ($("#iexpediente").val()==0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa el campo de Expediente',
            })

            return false
        }

        if ($("#ifechallegada").val()==0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa la Fecha de Llegada de la pieza',
            })

            return false
        }

        if ($("#saseguradora").val()==0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa la Aseguradora',
            })

            return false
        }

        if ($("#idescripcion").val()==0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa la Descreipcion',
            })

            return false
        }

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
                text: 'Ingresa el campo modelo',
            })

            return false
        }

        if ($("#iexpediente2").val()==0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa el expediente',
            })

            return false
        }

        if ($("#iubicacion").val()==0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa la ubicacion',
            })

            return false
        }
        /*
        if ($("#ifechaentrega").val()==0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa la Fecha de Entrega',
            })

            return false
        }
        */
        if ($("#sestatus").val()==0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Seleccion el Estatus de la pieza',
            })

            return false
        }

        if ($("#icomentarios").val()==0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa los Comentarios',
            })

            return false
        }

        // agrego un arreglo para agregar los datos
        var data = {
            idexp: $("#iexpediente").val(),
            fechallegada: $("#ifechallegada").val(),
            aseguradora: $("#saseguradora").val(),
            descripcion: $("#idescripcion").val(),
            marca: $("#sautos").val(),
            linea: $("#sautoslinea").val(),
            modelo: $("#imodelo").val(),
            noexpediente: $("#iexpediente2").val(),
            ubicacion: $("#iubicacion").val(),
            fechaentrega: $("#ifechaentrega").val(),
            esatus: $("#sestatus").val(),
            comentarios: $("#icomentarios").val()
        }

        //console.log(data);
        //agrego la agrecion de la refa ajax
        $.ajax({
            url: '/siga/controlador/insert_refacion.php',
            type: 'POST',
            data: data,
            success: function(result){
                //console.log(result);
                if (result == 1) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Correcto',
                        text: 'Pieza registrada',
                    })
                    $("#info").text('');
                    $("#inf").fadeOut();
                    $("#iexpediente").removeAttr("readonly");
                    $("#iexpediente2").removeAttr("readonly");
                    document.getElementById("formdata").reset();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: result,
                    })
                    $("#info").text('');
                    $("#inf").fadeOut();
                    $("#iexpediente").removeAttr("readonly");
                    $("#iexpediente2").removeAttr("readonly");
                    document.getElementById("formdata").reset();
                }
            }
        });
        
    })


    
})