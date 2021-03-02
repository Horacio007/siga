$(document).ready(function(){
    //cosas
    $("#btnmodificar").attr('disabled', true);
    //le pongo el ajax para ver lo de la tabla mas chidori
    $.ajax({
        url: '/siga/controlador/t_asignacionPer.php',
        type: 'POST',
        data: {
            catalago_tallertransito: true
        },
        success: function(result){
            document.getElementById("listado_refacciones").innerHTML = result;

            if($("#lista_refacciones").length){
                $('#lista_refacciones').DataTable({
                    dom: 'Blfrtip',
                    buttons: [{
                            extend: 'excelHtml5',
                            messageTop: 'Proceso',
                            text: "Excel",
                            title: "Listado de Personal Asignado",
                        },
                        {
                            /*'csvHtml5',*/
                            extend: 'csvHtml5',
                            text: "CSV",
                            title: "Listado de Personal Asignado",
                            messageTop: 'Listado de Personal Asignado',
                        },
                        {
                            extend: 'pdfHtml5',
                            title: 'Listado de Personal Asignado'
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
                    text: 'No se encontraron vehiculos registradas',
                })
    
                return false
            }
        }
    })


    //saco el select de hojalateria
    $.ajax({
        url: '/siga/controlador/s_personalH.php',
        type: 'POST',
        data: {
            select_personalH: true
        },
        success: function(result){
            document.getElementById("selec_hoja").innerHTML = result;
        }
    })

    //saco el select de preparacion
    /*
    $.ajax({
        url: '/siga/controlador/s_personalPrep.php',
        type: 'POST',
        data: {
            select_personalPrep: true
        },
        success: function(result){
            document.getElementById("selec_Prepa").innerHTML = result;
        }
    })
    */
    //saco el select de pintura
    $.ajax({
        url: '/siga/controlador/s_personalPin.php',
        type: 'POST',
        data: {
            select_personalPin: true
        },
        success: function(result){
            document.getElementById("selec_Pin").innerHTML = result;
        }
    })

    //saco el select de armado
    $.ajax({
        url: '/siga/controlador/s_personalArm.php',
        type: 'POST',
        data: {
            select_personalArm: true
        },
        success: function(result){
            document.getElementById("selec_Arm").innerHTML = result;
        }
    })

    //saco el select de detallaio
    $.ajax({
        url: '/siga/controlador/s_personalDet.php',
        type: 'POST',
        data: {
            select_personalDet: true
        },
        success: function(result){
            document.getElementById("selec_Det").innerHTML = result;
        }
    })

    //saco el select de mecanica
    $.ajax({
        url: '/siga/controlador/s_personalMeca.php',
        type: 'POST',
        data: {
            select_personalMeca: true
        },
        success: function(result){
            document.getElementById("selec_Meca").innerHTML = result;
        }
    })

    //saco el select de mecanica
    $.ajax({
        url: '/siga/controlador/s_personalLava.php',
        type: 'POST',
        data: {
            select_personalLava: true
        },
        success: function(result){
            document.getElementById("selec_Lava").innerHTML = result;
        }
    })

    //le agrego lo de buscar el vehiculo :)
    $("#btn_buscar").on('click', function(){
        if ($("#id_vehiculo").val() == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Favor de Ingresar el No. Expediente',
            })

            return false
        }

        $.ajax({
            url: '/siga/controlador/existe_vehASP.php',
            type: 'POST',
            data: {
                id: $("#id_vehiculo").val()
            },
            success: function (result) {
                if (result == 1) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Correcto',
                        text: 'Vehiculo Encontrado',
                    })

                    $("#id_vehiculo").attr("readonly","readonly");
                    $("#btnmodificar").attr('disabled', false);   
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Vehiculo no encontrado y/o registrado',
                    })
                    $("#id_vehiculo").val('')
                    return false
                }
            }
        })
    })

    //le pongo lo del boton de actualizar
    $("#btnmodificar").on('click', function(){
        //saco la info de todos los controles y los echo en un array de los chekes
        if ($("#aplicaHoja").prop('checked') ) {
            var aplica_hojalateria = 1;
        } else {
            var aplica_hojalateria = 0;
        }
        /*
        if ($("#aplicaPrepa").prop('checked') ) {
            var aplica_preparacion = 1;
        } else {
            var aplica_preparacion = 0;
        }
        */
        if ($("#aplicaPin").prop('checked') ) {
            var aplica_pintura = 1;
        } else {
            var aplica_pintura = 0;
        }

        if ($("#aplicaArm").prop('checked') ) {
            var aplica_armado = 1;
        } else {
            var aplica_armado = 0;
        }

        if ($("#aplicaDet").prop('checked') ) {
            var aplica_detallado = 1;
        } else {
            var aplica_detallado = 0;
        }

        if ($("#aplicaMeca").prop('checked') ) {
            var aplica_mecanica = 1;
        } else {
            var aplica_mecanica = 0;
        }

        if ($("#aplicaLava").prop('checked') ) {
            var aplica_lavado = 1;
        } else {
            var aplica_lavado = 0;
        }

        // guardo todo en el arreglo 
        var data = {
            id: $("#id_vehiculo").val(),
            aplica_hojalateria: aplica_hojalateria,
            fecha_hojalateria: $("#fechahoja").val(),
            asignado_hojalateria: $("#spersonalH").val(),
            comentarios_hojalateria: $("#comentariosHoja").val(),
            //aplica_preparacion: aplica_preparacion,
            //fecha_preparacion: $("#fechaPrepa").val(),
            //asignado_preparacion: $("#spersonalPrep").val(),
            //comentarios_preparacion: $("#comentariosPrepa").val(),
            aplica_pintura: aplica_pintura,
            fecha_pintura: $("#fechaPin").val(),
            asignado_pintura: $("#spersonalPin").val(),
            comentarios_pintura: $("#comentariosPin").val(),
            aplica_armado: aplica_armado,
            fecha_armado: $("#fechaArm").val(),
            asignado_armado: $("#spersonalArm").val(),
            comentarios_armado: $("#comentariosArm").val(),
            aplica_detallado: aplica_detallado,
            fecha_detallado: $("#fechaDet").val(),
            asignado_detallado: $("#spersonalDet").val(),
            comentarios_detallado: $("#comentariosDet").val(),
            aplica_mecanica: aplica_mecanica,
            fecha_mecanica: $("#fechaMeca").val(),
            asignado_mecanica: $("#spersonalMeca").val(),
            comentarios_mecanica: $("#comentariosMeca").val(),
            aplica_lavado: aplica_lavado,
            fecha_lavado: $("#fechaLava").val(),
            asignado_lavado: $("#spersonalLava").val(),
            comentarios_lavado: $("#comentariosLava").val()
        }

        //console.log(data)
        $.ajax({
            url: '/siga/controlador/update_Bproceso.php',
            type: 'POST',
            data: data,
            success: function(result){
                //console.log(result)
                if (result == 1) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Correcto',
                        text: 'Personal Asignado',
                    })
                    limpiar()
                    document.getElementById("formdata").reset();
                    $("#formdata")[0].reset();
                    $("#id_vehiculo").removeAttr("readonly");
                    $("#btnmodificar").attr('disabled', true);
                    $("#lista_refacciones").DataTable().destroy();
                    recargar();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Personal no Asignado',
                    })
                    limpiar()
                    document.getElementById("formdata").reset();
                    $("#id_vehiculo").removeAttr("readonly");
                    $("#btnmodificar").attr('disabled', true);
                }
            }
        })
    })
})

function limpiar(){
    $("#aplicaHoja").prop('checked', true) 
    $("#fechahoja").val(''),
    $("#spersonalH").val(0),
    $("#comentariosHoja").val(''),
    //$("#aplicaPrepa").prop('checked', true)
    //$("#fechaPrepa").val(''),
    //$("#spersonalPrep").val(0),
    //$("#comentariosPrepa").val(''),
    $("#aplicaPin").prop('checked', true)
    $("#fechaPin").val(''),
    $("#spersonalPin").val(0),
    $("#comentariosPin").val(''),
    $("#aplicaArm").prop('checked', true)
    $("#fechaArm").val(''),
    $("#spersonalArm").val(0),
    $("#comentariosArm").val(''),
    $("#aplicaDet").prop('checked', true)
    $("#fechaDet").val(''),
    $("#spersonalDet").val(0),
    $("#comentariosDet").val(''),
    $("#aplicaMeca").prop('checked', true)
    $("#fechaMeca").val(''),
    $("#spersonalMeca").val(0),
    $("#comentariosMeca").val(''),
    $("#aplicaLava").prop('checked', true)
    $("#fechaLava").val(''),
    $("#spersonalLava").val(0),
    $("#comentariosLava").val('')
}

function recargar(){
    $.ajax({
        url: '/siga/controlador/t_asignacionPer.php',
        type: 'POST',
        data: {
            catalago_tallertransito: true
        },
        success: function(result){
            document.getElementById("listado_refacciones").innerHTML = result;

            if($("#lista_refacciones").length){
                $('#lista_refacciones').DataTable({
                    dom: 'Blfrtip',
                    buttons: [{
                            extend: 'excelHtml5',
                            messageTop: 'Refacciones',
                            text: "Excel",
                            title: "Listado de Refacciones",
                        },
                        {
                            /*'csvHtml5',*/
                            extend: 'csvHtml5',
                            text: "CSV",
                            title: "Listado de Productos",
                            messageTop: 'Listado de Refacciones',
                        },
                        {
                            extend: 'pdfHtml5',
                            title: 'Listado de Refacciones'
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
                    text: 'No se encontraron refacciones registradas',
                })
    
                return false
            }
        }
    })
}