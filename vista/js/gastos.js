$(document).ready(function(){
    //
    Swal.fire({
        icon: 'warning',
        title: 'Oops...',
        text: 'Recuerda el No. Expediente aplica con: Materiales de Acabado, Refacciones, T.O.T.\nSi no aplica es "N/A"',
    })
    //
    $.ajax({
        url: '/siga/controlador/t_vEntregados.php',
        type: 'POST',
        data: {
            catalago_ventregados: true
        },
        success: function(result){
            document.getElementById("listado_vehiculos").innerHTML = result;
    
            if($("#lista_vehiculos").length){
                $('#lista_vehiculos').DataTable({
                    dom: 'Blfrtip',
                    buttons: [{
                            extend: 'excelHtml5',
                            messageTop: 'Vehiculos Entregados',
                            text: "Excel",
                            title: "Listado de Vehiculos Entregados",
                        },
                        {
                            /*'csvHtml5',*/
                            extend: 'csvHtml5',
                            text: "CSV",
                            title: "Listado de Vehiculos Entregados",
                            messageTop: 'Listado de Vehiculos Entregados',
                        },
                        {
                            extend: 'pdfHtml5',
                            title: 'Listado de Vehiculos Entregados'
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
                    "pageLength": 100,
                    "rowCallback": function(nRow, aData) {

                    } 
    
                });
    
            }
            else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'No se encontraron vehiculos registradas',
                })
    
                return false
            }
        }
    })
    //agrego los estatus
    $.ajax({
        url: '/siga/controlador/s_forma_pago.php',
        type: 'POST',
        data: {
            select_fpago: true
        },
        success: function(response) {
            document.getElementById("select_fpago").innerHTML = response;
        }
    });

    //agrego los estatus
    $.ajax({
        url: '/siga/controlador/s_tipo_gasto.php',
        type: 'POST',
        data: {
            select_tipo: true
        },
        success: function(response) {
            document.getElementById("select_tipo").innerHTML = response;
        }
    });

    //agrego la tabla de los carros que estan en entregados
    $.ajax({
        url: '/siga/controlador/t_vEntregados.php',
        type: 'POST',
        data: {
            catalago_ventregados: true
        },
        success: function(response) {
            document.getElementById("listado_vehiculos").innerHTML = response;
        }
    });
    //

    $("#expediente").on('keyup', function(){
        var dataa = $(this).val();
        //console.log(dataa)
        $.ajax({
            url: '/siga/controlador/get_idV.php',
            type: 'POST',
            data: {
                id: dataa
            },
            success: function(result){
                //console.log(result);
                $("#expp").fadeIn();
                if (result == 'N/A') {
                    $("#exp").text('No aplica');
                    $("#expp").css('border-radius', '5px');
                    $("#expp").css('background-color', '#53ee7e'); 
                } else {
                    $.ajax({
                        url: '/siga/controlador/existe_vehiculo_checklist.php',
                        type: 'POST',
                        data: {
                            id: dataa
                        },
                        success: function(result){
                            //console.log(result);
                            if (result == 0) {
                                $("#exp").text('Vehiculo No Encontrado');
                                $("#expp").css('border-radius', '5px');
                                $("#expp").css('background-color', '#F08080');  
                            } else {
                                $("#exp").text('Vehiculo Encontrado');
                                $("#expp").css('border-radius', '5px');
                                $("#expp").css('background-color', '#53ee7e'); 
                            }
                        }
                    })
                }
            }
        })
        /*
        if (dataa == 'N/A') {
            console.log('no aplica')
            $("#exp").text('No aplica');
        } else {

            if (dataa.length == 9 || dataa.length == 10) {
                $.ajax({
                    url: '/siga/controlador/existe_vehiculo_checklist.php',
                    type: 'POST',
                    data: {
                        id: dataa
                    },
                    success: function(result){
                        //console.log(result);
                        if (result == 2) {
                            
                        }
                        if (result == 1) {
                            $("#exp").text('Vehiculo Encontrado');
                            $("#expediente").attr("readonly","readonly");                  
                        } else {
                            
                        }
                    }
                })
            }
        }
        */
        
    })

    //agrego mensajitos para ver cosas extras
    $("#btn_registrar").on('click', function(){
        
        if ($("#fecha").val() == 0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa la Fecha en que se realizo el gasto',
            })

            return false;
        }

        if ($("#articulo").val() == 0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa el Articulo',
            })

            return false;
        }

        if ($("#cantidad").val() == 0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa la Cantidad',
            })

            return false;
        }

        if ($("#sfpago").val() == 0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa la Forma de Pago',
            })

            return false;
        }

        if ($("#sfactura").val() == 0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa si Aplica Factura',
            })

            return false;
        }

        if ($("#cpago").val() == 0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa el Tipo de Gasto',
            })

            return false;

        }
        /*
        if ($("#cpago").val() == 5) {

            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: 'Recuerda Ingresar le Numero de Expediente',
            })

        }

        if ($("#cpago").val() == 6) {

            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: 'Recuerda Ingresar le Numero de Expediente',
            })

        }

        if ($("#cpago").val() == 9) {

            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: 'Recuerda Ingresar le Numero de Expediente',
            })

        }
        */
        if ($("#proveedor").val() == 0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa el Nombre del Proveedor',
            })

            return false;
        }

        if ($("#expediente").val() == 0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa el No. Expediente',
            })

            return false;
        }

        //guardo la info
        var data = {
            id: $("#expediente").val(),
            fecha: $("#fecha").val(),
            articulos: $("#articulo").val(),
            cantidad: $("#cantidad").val(),
            fpago: $("#sfpago").val(),
            factura: $("#sfactura").val(),
            tipogasto: $("#cpago").val(),
            proveedor: $("#proveedor").val(),
            expediente: $("#expediente").val()
        }

        //console.log(data)
        //ME CREO EL AJAX para guardar cositas
        $.ajax({
            url: '/siga/controlador/insert_gastos.php',
            type: 'POST',
            data: data,
            success: function(result) {
                //console.log(result)
                
                if (result == 1) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Correcto',
                        text: 'Gasto Registrado',
                    })
                    document.getElementById("formdata").reset();
                    $("#exp").text('');
                    $("#expp").fadeOut();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: result,
                    })
                    document.getElementById("formdata").reset();
                    $("#exp").text('');
                    $("#expp").fadeOut();
                }
                
            }
        })
    })
})