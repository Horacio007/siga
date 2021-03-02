$(document).ready(function(){
    //
    $("#marca").attr('disabled', true);
    $("#linea").attr('disabled', true);
    $("#color").attr('disabled', true);
    $("#modelo").attr('disabled', true);
    $("#placas").attr('disabled', true);
    $("#cliente").attr('disabled', true);
    //le agrego lo de la tabla 
    $.ajax({
        url: '/siga/controlador/t_ingresos.php',
        type: 'POST',
        data: {
            catalago_ingresos: true
        },
        success: function(result){
            document.getElementById("listado_ingresos").innerHTML = result;
    
            if($("#lista_ingresos").length){
                $('#lista_ingresos').DataTable({
                    dom: 'Blfrtip',
                    buttons: [{
                            extend: 'excelHtml5',
                            messageTop: 'Ingresos',
                            text: "Excel",
                            title: "Listado de Ingresos",
                        },
                        {
                            /*'csvHtml5',*/
                            extend: 'csvHtml5',
                            text: "CSV",
                            title: "Listado de Ingresos",
                            messageTop: 'Listado de Ingresos',
                        },
                        {
                            extend: 'pdfHtml5',
                            title: 'Listado de Ingresos'
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
                    text: 'No se encontraron Ingresos registrados',
                })
    
                return false
            }
        }
    })
    //saco los servicios
    $.ajax({
        url: '/siga/controlador/s_tipo_servicio.php',
        type: 'POST',
        data: {
            select_tipo: true
        },
        success: function(response) {
            document.getElementById("select_servicio").innerHTML = response;
        }
    });

    //saco los tipos de pago 
    $.ajax({
        url: '/siga/controlador/s_tipo_pago.php',
        type: 'POST',
        data: {
            select_tipo: true
        },
        success: function(response) {
            document.getElementById("select_tipo_pago_anticipo").innerHTML = response;
        }
    });

    //saco los tipos de pago 
    $.ajax({
        url: '/siga/controlador/s_tipo_pagof.php',
        type: 'POST',
        data: {
            select_tipo: true
        },
        success: function(response) {
            document.getElementById("select_tipo_pago_finiquito").innerHTML = response;
        }
    });

    $("#id_vehiculo").on('click', function(){
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            text: 'Recuerda Utilizar el Id de la primer columna'
        });
    })

    //le agrego lo del buscar jejejejps
    $("#btn_buscar").on('click', function(){
        $.ajax({
            url: '/siga/controlador/get_info_ingresos.php',
            type: 'POST',
            data: {
                id: $("#id_vehiculo").val()
            },
            success: function(result) {
                arr = JSON.parse(result);
                //console.log(arr);
                if (arr['result'] == 1) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Correcto',
                        text: 'Ingreso Encontrado',
                    });
                    
                    $("#marca").val(arr['marca']);
                    $("#linea").val(arr['linea']);
                    $("#color").val(arr['color']);
                    $("#modelo").val(arr['modelo']);
                    $("#placas").val(arr['placas']);
                    $("#cliente").val(arr['cliente']);
                    $("#tservicio").val(arr['tipo_servicio']);
                    $("#fanticipo").val(arr['f_anticipo']);
                    $("#ianticipo").val(arr['anticipo']);
                    $("#tpago").val(arr['tipo_pago_anticipo']);
                    $("#ffiniquito").val(arr['f_finiquito']);
                    $("#ifiniquito").val(arr['finiquito']);
                    $("#tpagof").val(arr['tipo_pago_finiquito']);
                    $("#totla").val(arr['total']);
                    $("#id_vehiculo").attr('disabled', true);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: arr['error'],
                    });

                    document.getElementById("formdata").reset();
                }
                
            }
        })
    })

    //obtengo la informaacion
    $("#btn_registrar").on('click', function(){

        if ($("#id_vehiculo").val() == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa el No. de Expediente',
            })

            return false
        }

        if ($("#tservicio").val() == 0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Selecciona el Servicio que se Brindo',
            })

            return false
        }

        if ($("#fanticipo").val() == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Recuerda Seleccionar la Fecha en la que se dejo el Anticipo si "Aplica"',
            })

        }

        if ($("#ianticipo").val() == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Recuerda Ingresar el monto del Anticipo si "Aplica"',
            })

        }

        if ($("#tpago").val() == 0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Recuerda Seleccionar la forma de Pago si "Aplica"',
            })

        }

        if ($("#ffiniquito").val() == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Recuerda Seleccionar la fecha en donde se pago el Finiquito si "Aplica"',
            })

        }

        if ($("#ifiniquito").val() == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Recuerda Ingresar la Cantidad del Finiquito si "Aplica"',
            })

        }

        if ($("#tpagof").val() == 0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Recuerda Seleccionar la forma en la que se pago el Finiquito si "Aplica"',
            })

        }

        if ($("#totla").val() == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa el monto Total',
            })

        }
        //saco la informacion
        var data = {
            id: $("#id_vehiculo").val(),
            marca: $("#marca").val(),
            linea: $("#linea").val(),
            color: $("#color").val(),
            modelo: $("#modelo").val(),
            placas: $("#placas").val(),
            cliente: $("#cliente").val(),
            tipo_servicio: $("#tservicio").val(),
            f_anticipo: $("#fanticipo").val(),
            m_anticipo: $("#ianticipo").val(),
            f_pago_anticipo: $("#tpago").val(),
            f_finiquito: $("#ffiniquito").val(),
            m_finiquito: $("#ifiniquito").val(),
            f_pago_finiquito: $("#tpagof").val(),
            total: $("#totla").val()
        }

        //console.log(data);
        $.ajax({
            url: '/siga/controlador/update_ingresos.php',
            type: 'POST',
            data: data,
            success:function(result) {
                //console.log(result);

                if (result == 1) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Correcto',
                        text: 'Ingreso Actualizado',
                    })
                    document.getElementById("formdata").reset();
                    $("#id_vehiculo").attr('disabled', false);
                    $("#lista_ingresos").DataTable().destroy();
                    recarga();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: result,
                    })
                    document.getElementById("formdata").reset();
                    $("#id_vehiculo").attr('disabled', false);
                }
            }
        })
        
    })
})

function recarga() {
    
    //le agrego lo de la tabla 
    $.ajax({
        url: '/siga/controlador/t_ingresos.php',
        type: 'POST',
        data: {
            catalago_ingresos: true
        },
        success: function(result){
            document.getElementById("listado_ingresos").innerHTML = result;

            if($("#lista_ingresos").length){
                $('#lista_ingresos').DataTable({
                    dom: 'Blfrtip',
                    buttons: [{
                            extend: 'excelHtml5',
                            messageTop: 'Ingresos',
                            text: "Excel",
                            title: "Listado de Ingresos",
                        },
                        {
                            /*'csvHtml5',*/
                            extend: 'csvHtml5',
                            text: "CSV",
                            title: "Listado de Ingresos",
                            messageTop: 'Listado de Ingresos',
                        },
                        {
                            extend: 'pdfHtml5',
                            title: 'Listado de Ingresos'
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
                    text: 'No se encontraron Ingresos registrados',
                })

                return false
            }
        }
    })
}