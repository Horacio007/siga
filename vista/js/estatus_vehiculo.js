$(document).ready(function(){
    //le agrego el ajax para crearme la tablita :v
    $("#btnmodificar").attr('disabled', true);

    //agrego los estatus
    $.ajax({
        url: '/siga/controlador/s_estatus.php',
        type: 'POST',
        data: {
            select_estatus: true
        },
        success: function(response) {
            document.getElementById("select_estatus").innerHTML = response;
        }
    });
    // le agrego la info
    $.ajax({
        url: '/siga/controlador/t_estatusVehiEntrega.php',
        type: 'POST',
        data: {
            catalago_taller_transito: true
        },
        success: function(result){
            document.getElementById("listado_tallerTransito").innerHTML = result;

            if($("#lista_tallerTransito").length){
                $('#lista_tallerTransito').DataTable({
                    dom: 'Blfrtip',
                    buttons: [{
                            extend: 'excelHtml5',
                            messageTop: 'Taller/Transito',
                            text: "Excel",
                            title: "Listado de Taller/Transito",
                        },
                        {
                            /*'csvHtml5',*/
                            extend: 'csvHtml5',
                            text: "CSV",
                            title: "Listado de Taller/Transito",
                            messageTop: 'Listado de Taller/Transito',
                        },
                        {
                            extend: 'pdfHtml5',
                            title: 'Listado de Taller/Transito'
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
                    text: 'No se encontraron vehivulos registradas',
                })
    
                return false
            }
        }
    });

    // boton de buscar
    $("#btn_buscar").on('click', function(){
        //valido qu el campo de expediente este lleno
        if ($("#iexpediente").val() == 0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Rellena el campo de Expediente',
            })
              
            return false
        }

        //hago una peticion par obtener el estatus del vehiculo para posteriormente actualizarlo
        $.ajax({
            url: '/siga/controlador/existe_vehiculo_estatus.php',
            type: 'POST',
            data: {
                id: $("#iexpediente").val()
            },
            success: function (result){
                if (result == 1) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Correcto',
                        text: 'Vehiculo encontrado',
                    })
                    var id = $("#iexpediente").val();
                    $("#iexp").val(id);

                    //agrego el estatus actual
                    $.ajax({
                        url: '/siga/controlador/get_estatus_vehiculo.php',
                        type: 'POST',
                        data: {
                            id: $("#iexpediente").val()
                        },
                        success: function(response) {
                            $("#iestatusA").val(response);
                        }
                    });
                    //le quito lo del desabilitado del actualziar 
                    $("#btnmodificar").attr('disabled', false);
                    $("#iexpediente").attr("readonly","readonly");

                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Vehiculo no registrado',
                    })
                    document.getElementById("formdata").reset();
                }
            }
        })
    });

    $("#btnmodificar").on('click', function(){

        if ($("#sestatus").val() == 0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Selecciona el nuevo Estatus del Vehiculo',
            })

            return false;
        }

        if ($("#dfecha_salida").val() == 0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Selecciona la fecha de Salida del Vehiculo',
            })

            return false;
        }

        var datos = {
            id: $("#iexpediente").val(),
            estatus: $("#sestatus").val(),
            fecha_sal: $("#dfecha_salida").val()
        }

        //console.log(datos)
        //HAGO el ajazx ára actualizar el vehivulo 
        $.ajax({
            url: '/siga/controlador/update_estatus.php',
            type: 'POST',
            data: datos,
            success: function(result) {
                //console.log(result)
                if (result == 1) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Correcto',
                        text: 'Vehiculo Entregado',
                    })

                    document.getElementById("formdata").reset();
                    $("#iexpediente").removeAttr("readonly");
                    $("#btnmodificar").attr('disabled', true);
                    $("#lista_tallerTransito").DataTable().destroy();
                    recarga();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Vehiculo no Entregado',
                    })
                    document.getElementById("formdata").reset();
                    $("#iexpediente").removeAttr("readonly");
                    $("#btnmodificar").attr('disabled', true);
                }
            }
        })
    })
})

function recarga(){
    $.ajax({
        url: '/siga/controlador/t_estatusVehiEntrega.php',
        type: 'POST',
        data: {
            catalago_taller_transito: true
        },
        success: function(result){
            document.getElementById("listado_tallerTransito").innerHTML = result;

            if($("#lista_tallerTransito").length){
                $('#lista_tallerTransito').DataTable({
                    dom: 'Blfrtip',
                    buttons: [{
                            extend: 'excelHtml5',
                            messageTop: 'Taller/Transito',
                            text: "Excel",
                            title: "Listado de Taller/Transito",
                        },
                        {
                            /*'csvHtml5',*/
                            extend: 'csvHtml5',
                            text: "CSV",
                            title: "Listado de Taller/Transito",
                            messageTop: 'Listado de Taller/Transito',
                        },
                        {
                            extend: 'pdfHtml5',
                            title: 'Listado de Taller/Transito'
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
                    text: 'No se encontraron vehivulos registradas',
                })
    
                return false
            }
        }
    });
}