$(document).ready(function(){
    //se obtiene la vista de als cosas
    $("#btnmodificar").attr('disabled', true);
    //
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      })
    //
    $.ajax({
        url: '/siga/controlador/t_valuaciones.php',
        type: 'POST',
        data: {
            catalago_valuaciones: true
        },
        success: function(result){
            document.getElementById("listado_valuaciones").innerHTML = result;
    
            if($("#lista_valuaciones").length){
                $('#lista_valuaciones').DataTable({
                    dom: 'Blfrtip',
                    buttons: [{
                            extend: 'excelHtml5',
                            messageTop: 'Valuaciones',
                            text: "Excel",
                            title: "Listado de Valuaciones",
                        },
                        {
                            /*'csvHtml5',*/
                            extend: 'csvHtml5',
                            text: "CSV",
                            title: "Listado de Valuaciones",
                            messageTop: 'Listado de Valuaciones',
                        },
                        {
                            extend: 'pdfHtml5',
                            title: 'Listado de Valuaciones'
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

                        if (aData[10] >= 0 && aData[10] <= 3) {

                            $(nRow).find('td:eq(10)').css('background-color', '#53ee7e'); 

                            /*
                            if (aData[14] != "") {
                                $(nRow).find('td:eq(10)').css('background-color', '#53ee7e'); 
                            }
                            */
                        }

                        if (aData[10] > 3){ 
                            $(nRow).find('td:eq(10)').css('background-color', '#F08080');  
                        }

                        if (aData[10] == 0) {
                            $(nRow).find('td:eq(10)').css('background-color', '#53ee7e'); 
                        }

                        if (aData[15] == 1) {
                            $(nRow).find('td:eq(15)').css('background-color', '#F08080'); 
                        }

                        if(aData[20] != null){
                            
                            if (aData[20] > 0.00 && aData[20] < 80.00) { 
                                $(nRow).find('td:eq(20)').css('background-color', '#F08080');  
                            }else if (aData[20] >= 80.00) {
                                $(nRow).find('td:eq(20)').css('background-color', '#53ee7e'); 
                            }
                        }
                    } 
    
                });
    
            }
            else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'No se encontraron valuaciones registradas',
                })
    
                return false
            }
        }
    })

    //le agrego la info que ya tiene a los botones correspondientes

    //agrego lo del estatus por si se ocupa cambiar de uno antiguo a uno nuevo
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

    var datos;

    //le agrego lo de la busqueda
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
            url: '/siga/controlador/selec_valid.php',
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
                        text: 'Valuacion Encontrada',
                    })
                    if (datos['estatus'] == 'Taller') {
                        $("#sestatus").val(5);
                    }
            
                    if (result['estatus'] == 'Transito') {
                        $("#sestatus").val(6);
                    }
                    $("#id_vehiculo").attr("readonly","readonly");
                    $("#btnmodificar").attr('disabled', false);
                    $("#fecha_envio").val(datos['fecha_valuacion']);
                    $("#fecha_llegada").val(datos['fecha_llegada_taller']);
                    $("#cantidadini").val(datos['cantidad_inicial']);
                    $("#pzscambioini").val(datos['piezas_cambio_inicial']);
                    $("#pzsreparaini").val(datos['piezas_reparacion_inicial']);
                    $("#fecha_autorizacion").val(datos['fecha_autorizacion']);
                    $("#cantidadfin").val(datos['cantidad_final']);
                    $("#pzscambiofin").val(datos['piezas_cambio_final']);
                    $("#pzsreparafin").val(datos['piezas_reparacion_final']);
                    $("#pzsvendidas").val(datos['piezas_vendidas']);
                    $("#importepzsvendidas").val(datos['importe_piezas_vendidas']);
                    $("#porcentapro").val(datos['porcentaje']);
                     //intento si no jala borrar jajajja
                     $.ajax({
                        url: '/siga/controlador/get_MLM.php',
                        type: 'POST',
                        data: {
                            id: $("#id_vehiculo").val()
                        },
                        success: function(result){
                            arre = JSON.parse(result);
                            //console.log(arr);
                            $("#inf").fadeIn();
                            $("#inf").css('border-radius', '5px');
                            $("#inf").css('background-color', '#53ee7e'); 
                            $("#info").text('Vehiculo: '+ arre['marca'] + ' ' + arre['linea'] + ' ' + arre['modelo']);
                        }
                    })


                    //intento borrrar jajaj
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

    //le agrego el boton de actualizar
    $("#btnmodificar").on('click', function() {
        //console.log(datos);
        if ($("#sestatus").val() == 0) {
            Swal.fire({
                icon: 'warning',
                title: 'IMPORTANTE',
                text: 'Recuerda Actualizar el estatus del Vehiculo...',
            })

            return false;
        }
        $.ajax({
            url: '/siga/controlador/update_valuaciones.php',
            type: 'POST',
            data: {
                id: datos['id'],
                estatus: $("#sestatus").val(),
                fecha_envio: $("#fecha_envio").val(),
                fecha_llegada: $("#fecha_llegada").val(),
                diferencia: datos['diferencia'],
                cantidad_ini: $("#cantidadini").val(),
                piezas_cambio_ini: $("#pzscambioini").val(),
                piezas_repara_ini: $("#pzsreparaini").val(),
                fecha_autorizacion: $("#fecha_autorizacion").val(),
                cantidad_fini: $("#cantidadfin").val(),
                piezas_cambio_fin: $("#pzscambiofin").val(),
                piezas_repara_fin: $("#pzsreparafin").val(),
                piezas_vendidas: $("#pzsvendidas").val(),
                importe_piezas_vend: $("#importepzsvendidas").val(),
                porcentaje_aprob: $("#porcentapro").val()
            },
            success: function(result){
                //console.log(result);
                
                if (result == 1) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Correcto',
                        text: 'Valuacion Actualizada',
                    })
                    document.getElementById("formdata").reset();
                    $("#id_vehiculo").removeAttr("readonly");
                    $("#btnmodificar").attr('disabled', true);
                    $("#lista_valuaciones").DataTable().destroy();
                    recarga();
                    $("#info").text('');
                    $("#inf").fadeOut();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Valuacion no Actualizada',
                    })
                    $("#info").text('');
                    $("#inf").fadeOut();
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
        $("#lista_valuaciones").DataTable().destroy();
        recarga()
        $("#info").text('');
        $("#inf").fadeOut();
    })

})

function recarga(){

    $.ajax({
        url: '/siga/controlador/t_valuaciones.php',
        type: 'POST',
        data: {
            catalago_valuaciones: true
        },
        success: function(result){
            document.getElementById("listado_valuaciones").innerHTML = result;
    
            if($("#lista_valuaciones").length){
                $('#lista_valuaciones').DataTable({
                    dom: 'Blfrtip',
                    buttons: [{
                            extend: 'excelHtml5',
                            messageTop: 'Valuaciones',
                            text: "Excel",
                            title: "Listado de Valuaciones",
                        },
                        {
                            /*'csvHtml5',*/
                            extend: 'csvHtml5',
                            text: "CSV",
                            title: "Listado de Valuaciones",
                            messageTop: 'Listado de Valuaciones',
                        },
                        {
                            extend: 'pdfHtml5',
                            title: 'Listado de Valuaciones'
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
                        if (aData[10] > 3){ 
                            $(nRow).find('td:eq(10)').css('background-color', '#F08080');  
                        }

                        if (aData[10] > 0 && aData[10] <= 3) {

                            if (aData[14] != "") {
                                $(nRow).find('td:eq(10)').css('background-color', '#53ee7e'); 
                            }
                            
                        }

                        if (aData[10] == 0) {
                            //$(nRow).find('td:eq(10)').css('background-color', '#53ee7e'); 
                        }

                        if (aData[15] == 1) {
                            $(nRow).find('td:eq(15)').css('background-color', '#F08080'); 
                        }

                        if(aData[20] != null){
                            
                            if (aData[20] > 0.00 && aData[20] < 80.00) { 
                                $(nRow).find('td:eq(20)').css('background-color', '#F08080');  
                            }else if (aData[20] >= 80.00) {
                                $(nRow).find('td:eq(20)').css('background-color', '#53ee7e'); 
                            }
                        }
                    } 
    
                });
    
            }
            else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'No se encontraron valuaciones registradas',
                })
    
                return false
            }
        }
    })
}

function toObject(arr) { 
    var rv = {}; 
    for (var i = 0; i < arr.length; ++i) 
    rv[i] = arr[i]; 
    return rv; 
}