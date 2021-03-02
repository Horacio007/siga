$(document).ready(function(){
    //pongo en no jalar
    $("#btnmodificar").attr('disabled', true);
    //toltips
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      })
    //saco los que ya estan asignados
    $.ajax({
        url: '/siga/controlador/t_personalAsignado.php',
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
                            messageTop: 'Personal Asignado',
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
    
    //le pongo lo de buscar la informacion y sacarla
    $("#btn_buscar").on('click', function(){
        if ($("#id_vehiculo").val() == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Cargar Expediente',
            })
            $("#id_vehiculo").val('')

            return false
        }

        $.ajax({
            url: '/siga/controlador/get_procesoVehiculo.php',
            type: 'POST',
            data: {
                id: $("#id_vehiculo").val()
            }, 
            success: function(result){
                var arr = JSON.parse(result);
                //console.log(arr);
                if (arr['result'] == 1) {
                    //
                    Swal.fire({
                        icon: 'success',
                        title: 'Correcto',
                        text: 'Vehiculo Encontrado',
                    })
                    //hoja
                    $("#laplicahoja").append(arr['aplica_hoja']);
                    $("#lasignadohoja").append(arr['asignado_hoja']);
                    $("#fechahoja").val(arr['fecha_hoja']);
                    $("#comentariosHoja").val(arr['comentarios_hoja']);
                    //prep
                    /*
                    $("#laplicaPrepa").append(arr['aplica_prepa']);
                    $("#lasignadoprepa").append(arr['asignado_prepa']);
                    $("#fechaprepa").val(arr['fecha_prepa']);
                    $("#comentariosprepa").val(arr['comentarios_prepa']);
                    */
                    //pin
                    $("#laplicapin").append(arr['aplica_pin']);
                    $("#lasignadopin").append(arr['asignado_pin']);
                    $("#fechapin").val(arr['fecha_pin']);
                    $("#comentariospin").val(arr['comentarios_pin']);
                    //arm
                    $("#laplicaarm").append(arr['aplica_arm']);
                    $("#lasignadoarm").append(arr['asignado_arm']);
                    $("#fechaarm").val(arr['fecha_arm']);
                    $("#comentariosarm").val(arr['comentarios_arm']);
                    //det
                    $("#laplicadeta").append(arr['aplica_det']);
                    $("#lasignadodeta").append(arr['asignado_det']);
                    $("#fechadeta").val(arr['fecha_det']);
                    $("#comentariosdeta").val(arr['comentarios_det']);
                    //mec
                    $("#laplicameca").append(arr['aplica_meca']);
                    $("#lasignadomeca").append(arr['asignado_meca']);
                    $("#fechameca").val(arr['fecha_meca']);
                    $("#comentariosmeca").val(arr['comentarios_meca']);
                    //lav
                    $("#laplicalava").append(arr['aplica_lava']);
                    $("#lasignadolava").append(arr['asignado_lava']);
                    $("#fechalava").val(arr['fecha_lava']);
                    $("#comentarioslava").val(arr['comentarios_lava']);
                    //entrega
                    $("#fechainter").val(arr['fecha_entrega'])
                    $("#entrego").val(arr['entrego'])
                    $("#recibio").val(arr['recibio'])
                    //cosas
                    $("#id_vehiculo").attr("readonly","readonly");
                    $("#btnmodificar").attr('disabled', false);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Primero debes de Asignar Personal al Vehiculo',
                    })
                    $("#id_vehiculo").val('')

                    return false
                }
            }
        })
    })

    $("#btnmodificar").on('click', function(){
        var data = {
            id: $("#id_vehiculo").val(),
            fecha_hojalateria: $("#fechahoja").val(),
            comentarios_hojalateria: $("#comentariosHoja").val(),
            //fecha_preparacion: $("#fechaprepa").val(),
            //comentarios_preparacion: $("#comentariosprepa").val(),
            fecha_pintura: $("#fechapin").val(),
            comentarios_pintura: $("#comentariospin").val(),
            fecha_armado: $("#fechaarm").val(),
            comentarios_armado: $("#comentariosarm").val(),
            fecha_detallado: $("#fechadeta").val(),
            comentarios_detallado: $("#comentariosdeta").val(),
            fecha_mecanica: $("#fechameca").val(),
            comentarios_mecanica: $("#comentariosmeca").val(),
            fecha_lavado: $("#fechalava").val(),
            comentarios_lavado: $("#comentarioslava").val(),
            fecha_entrega: $("#fechainter").val(),
            entrego: $("#entrego").val(),
            recibio: $("#recibio").val()
        }

        //console.log(data)
        //actualzir
        $.ajax({
            url: '/siga/controlador/update_BprocesoAsignado.php',
            type: 'POST',
            data: data,
            success: function(result){
                //console.log(result);
                if (result == 1) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Correcto',
                        text: 'Vehiculo Actualizado',
                    })
                    document.getElementById("formdata").reset();
                    $("#id_vehiculo").removeAttr("readonly");
                    $("#btnmodificar").attr('disabled', true);
                    $("#lista_refacciones").DataTable().destroy();
                    //hoja
                    $("#laplicahoja").text('Aplica -> ');
                    $("#lasignadohoja").text('Asignado -> ');
                    //pre
                    /*
                    $("#laplicaPrepa").text('Aplica -> ');
                    $("#lasignadoprepa").text('Asignado -> ');
                    */
                    //pin
                    $("#laplicapin").text('Aplica -> ');
                    $("#lasignadopin").text('Asignado -> ');
                    //arm
                    $("#laplicaarm").text('Aplica -> ');
                    $("#lasignadoarm").text('Asignado -> ');
                    //det
                    $("#laplicadeta").text('Aplica -> ');
                    $("#lasignadodeta").text('Asignado -> ');
                    //mec
                    $("#laplicameca").text('Aplica -> ');
                    $("#lasignadomeca").text('Asignado -> ');
                    //lav
                    $("#laplicalava").text('Aplica -> ');
                    $("#lasignadolava").text('Asignado -> ');
                    //
                    recargar();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Vehiculo no Actualizado',
                    })
                    document.getElementById("formdata").reset();
                    $("#id_vehiculo").removeAttr("readonly");
                    $("#btnmodificar").attr('disabled', true);
                }
            }
        })
    })

    $("#btnnvo").on('click', function(){
        //console.log('si entra');
        document.getElementById("formdata").reset();
        $("#id_vehiculo").removeAttr("readonly");
        $("#btnmodificar").attr('disabled', true);
        $("#lista_refacciones").DataTable().destroy();
        //hoja
        $("#laplicahoja").text('Aplica -> ');
        $("#lasignadohoja").text('Asignado -> ');
        //pre
        /*
        $("#laplicaPrepa").text('Aplica -> ');
        $("#lasignadoprepa").text('Asignado -> ');
        */
        //pin
        $("#laplicapin").text('Aplica -> ');
        $("#lasignadopin").text('Asignado -> ');
        //arm
        $("#laplicaarm").text('Aplica -> ');
        $("#lasignadoarm").text('Asignado -> ');
        //det
        $("#laplicadeta").text('Aplica -> ');
        $("#lasignadodeta").text('Asignado -> ');
        //mec
        $("#laplicameca").text('Aplica -> ');
        $("#lasignadomeca").text('Asignado -> ');
        //lav
        $("#laplicalava").text('Aplica -> ');
        $("#lasignadolava").text('Asignado -> ');
    })

})

function recargar(){
    $.ajax({
        url: '/siga/controlador/t_personalAsignado.php',
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
                            messageTop: 'Personal Asignado',
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
}