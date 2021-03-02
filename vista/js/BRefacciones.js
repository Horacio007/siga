$(document).ready(function(){
    //
    $("#btnmodificar").attr('disabled', true);
    // le pongo mas info
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      })
     //agrego los estatus
     $.ajax({
        url: '/siga/controlador/s_estatusrefacciones.php',
        type: 'POST',
        data: {
            select_estatus: true
        },
        success: function(response) {
            document.getElementById("select_estatus").innerHTML = response;
        }
    });
    // le agrego la info
    $("#btnmodificar").attr('disabled', true);
    //
    $.ajax({
        url: '/siga/controlador/t_brefacciones.php',
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
                            title: "Listado de Refacciones",
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
                    "pageLength": 100
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

    var datos;
    //le agrego lo del boton de buscar
    $("#btn_buscar").on('click', function(){

        if ($("#id_vehiculo").val() == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Favor de Ingresar el Expediente',
            })

            return false
        }
        
        $.ajax({
            url: '/siga/controlador/select_Brefacciones.php',
            type: 'POST',
            data: {
                id: $("#id_vehiculo").val()
            },
            success: function(result){
                var arr = JSON.parse(result)
                datos = arr;
                //console.log(datos)
                if (datos['result'] == 1) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Correcto',
                        text: 'Refacciones Encontradas',
                    })
                    
                    $("#id_vehiculo").attr("readonly","readonly");
                    $("#btnmodificar").attr('disabled', false);
                    $("#refatsion").val(datos['refacciones']);
                    $("#proveedor1").val(datos['proveedor1']);
                    $("#provrefaccion1").val(datos['refaccionaria1']);
                    $("#fechap1").val(datos['fecha1']);
                    $("#proveedor2").val(datos['proveedor2']);
                    $("#provrefaccion2").val(datos['refaccionaria2']);
                    $("#fechap2").val(datos['fecha2']);
                    $("#proveedor3").val(datos['proveedor3']);
                    $("#provrefaccion3").val(datos['refaccionaria3']);
                    $("#fechap3").val(datos['fecha3']);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Vehiculo no encontrado y/o registrado',
                    })
                    $("#id_vehiculo").val(0)

                    return false
                }
            }
        })
    })

    $("#btnmodificar").on('click', function() {
        //console.log($("#refatsion").val())

        if ($("#refatsion").val() == 0 || $("#refatsion").val() == null) {
            Swal.fire({
                icon: 'warning',
                title: 'IMPORTANTE',
                text: 'Recuerda seleccionar el estatus de las Refacciones...',
            })

            return false;
        }

        var datnueva = {
            idd: datos['id'],
            refacciones: $("#refatsion").val(),
            proveedor1: $("#proveedor1").val(),
            refaccionaria1: $("#provrefaccion1").val(),
            fp1: $("#fechap1").val(),
            proveedor2: $("#proveedor2").val(),
            refaccionaria2: $("#provrefaccion2").val(),
            fp2: $("#fechap2").val(),
            proveedor3: $("#proveedor3").val(),
            refaccionaria3: $("#provrefaccion3").val(),
            fp3: $("#fechap3").val()
        }

        $.ajax({
            url: '/siga/controlador/update_brefaccion.php',
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

    });

    $("#btnnvo").on('click', function(){
        //console.log('si entra');
        document.getElementById("formdata").reset();
        $("#id_vehiculo").removeAttr("readonly");
        $("#btnmodificar").attr('disabled', true);
        $("#lista_valuaciones").DataTable().destroy();
        recarga()
    })
})

function recargar(){
    $.ajax({
        url: '/siga/controlador/t_brefacciones.php',
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
                    "pageLength": 100
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