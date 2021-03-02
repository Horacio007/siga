$(document).ready(function(){
    //pongo redonly el boton de modificar
    $("#btnmodificar").attr('disabled', true);
    //le pongo al selec estatus el estatus
    // le pongo los estaus
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
    // le agrego la info
    $.ajax({
        url: '/siga/controlador/t_refacciones.php',
        type: 'POST',
        data: {
            catalago_refacciones: true
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
    });
    //pongo un lido mensaje
    Swal.fire({
        icon: 'warning',
        title: 'IMPORTANTE',
        text: 'Utilizar el Id ubicado en la primer columna',
    })

    //le agrego las cosas para el boton de actualizar me busque la informacion
    $("#btn_buscar").on('click', function(){

        if ($("#id_vehiculo").val() == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Favor de Ingresar el Id',
            })

            return false
        }

        
        $.ajax({
            url: '/siga/controlador/existe_vehiculoAl.php',
            type: 'POST',
            data: {
                id: $("#id_vehiculo").val()
            },
            success: function(result){
                var arr = JSON.parse(result);
                if (arr['result'] == 1) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Correcto',
                        text: 'Refaccion Encontrada',
                    })
                    //console.log(arr)
                    $("#id_vehiculo").attr("readonly","readonly");
                    $("#btnmodificar").attr('disabled', false);   
                    $("#aubicacion").val(arr['ubicacion']);
                    $("#afechaentrega").val(arr['fecha_entrega']);
                    $("#aestatus").val(arr['estatus']);
                    $("#acomentarios").val(arr['comentarios'])
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Vehiculo no encontrado y/o registrado - '+'\nPieza Entregada',
                    })
                    $("#id_vehiculo").val('')
                    return false
                }
            }
        });
    })

    $("#btnmodificar").on('click', function(){
        // saco la informacion de lo que acabo de poenr
        var datnueva = {
            idd: $("#id_vehiculo").val(),
            ubicacion: $("#aubicacion").val(),
            fecha_entrega: $("#afechaentrega").val(),
            status: $("#sestatus").val(),
            comentarios: $("#acomentarios").val()
        }

        $.ajax({
            url: '/siga/controlador/update_refaccion.php',
            type: 'POST',
            data: datnueva,
            success: function(result){
                //console.log(result);
                if (result == 1) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Correcto',
                        text: 'Refaccion Actualizada',
                    })
                    document.getElementById("formdata").reset();
                    $("#id_vehiculo").removeAttr("readonly");
                    $("#btnmodificar").attr('disabled', true);
                    $("#lista_refacciones").DataTable().destroy();
                    recargar();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Refaccion no Actualizada',
                    })
                    document.getElementById("formdata").reset();
                    $("#id_vehiculo").removeAttr("readonly");
                    $("#btnmodificar").attr('disabled', true);
                }
                
            }
        })
    })
})

function recargar(){
    $.ajax({
        url: '/siga/controlador/t_refacciones.php',
        type: 'POST',
        data: {
            catalago_refacciones: true
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