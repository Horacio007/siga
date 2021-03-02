$(document).ready(function(){
    //
    $("#btn_registrar").attr('disabled', true);
    $("#icliente").attr('disabled', true);
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
                    "pageLength": 10,
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

    //
    $.ajax({
        url: '/siga/controlador/t_encuestas.php',
        type: 'POST',
        data: {
            catalago_encuestas: true
        },
        success: function(result){
            document.getElementById("listado_encuestas").innerHTML = result;

            if($("#lista_encuestas").length){
                $('#lista_encuestas').DataTable({
                    dom: 'Blfrtip',
                    buttons: [{
                            extend: 'excelHtml5',
                            messageTop: 'Encuestas',
                            text: "Excel",
                            title: "Listado de Encuestas",
                        },
                        {
                            /*'csvHtml5',*/
                            extend: 'csvHtml5',
                            text: "CSV",
                            title: "Listado de Encuestas",
                            messageTop: 'Listado de Encuestas',
                        },
                        {
                            extend: 'pdfHtml5',
                            title: 'Listado de Encuestas'
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
                    "pageLength": 10,
                    "rowCallback": function(nRow, aData) {

                    } 

                });

            }
            else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'No se encontraron encuestas registradas',
                })

                return false
            }
        }
    })

    var datos;
    //busco lo del clinete y la info
    $("#btn_Buscar").on('click', function(){
        if ($("#iexpediente").val() == 0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa el No. de Expediente',
            })

            return false
        }

        $.ajax({
            url: '/siga/controlador/get_idVC.php',
            type: 'POST',
            data: {
                id: $("#iexpediente").val()
            },
            success:function(result) {
                arr = JSON.parse(result)
                datos = arr
                //console.log(datos)
                if (datos['result'] == 1) {

                    Swal.fire({
                        icon: 'success',
                        title: 'Correcto',
                        text: 'Vehiculo y Cliente Encontrados',
                    })

                    $("#icliente").val(datos['nombre']);
                    $("#iexpediente").attr('disabled', true);
                    $("#btn_registrar").attr('disabled', false);
                } else {
                    document.getElementById('formdata').reset();
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Vehiculo no Entregado',
                    })
        
                    return false
                }

            }
        })

    })

    //saco la info puesta por los registradores
    $("#btn_registrar").on('click', function(){
        //checo que no este vacio 
        if ($("#iatendio").val() == 0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa el Nombre de quien lo Atendio',
            })

            return false
        }

        if ($("#ifecha").val() == 0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa la Fecha en que se realizo la encuesta',
            })

            return false
        }

        if ($("#pr1").val() == 0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Responde la primer pregunta',
            })

            return false
        }

        if ($("#pr2").val() == 0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Responde la segunda pregunta',
            })

            return false
        }

        if ($("#pr3").val() == 0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Responde la tercer pregunta',
            })

            return false
        }

        if ($("#pr4").val() == 0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Responde la cuarta pregunta',
            })

            return false
        }

        if ($("#pr5").val() == 0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Responde la quinta pregunta',
            })

            return false
        }

        if ($("#pr6").val() == 0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Responde la sexta pregunta',
            })

            return false
        }

        if ($("#pr7").val() == 0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Responde la septima pregunta',
            })

            return false
        }

        //pongo toda la info en un arreglo y le checo las coasas par ver el total de lo que se junto
        var p1;
        var p2;
        var p3;
        var p4;
        var p5;
        var p6;
        var p7;
        var suma;

        if ($("#pr1").val() == 1) {
            p1 = 18;
        } else if ($("#pr1").val() == 2){
            p1 = 9;
        } else {
            p1 = 0;
        }

        if ($("#pr2").val() == 1) {
            p2 = 18;
        } else if ($("#pr2").val() == 2){
            p2 = 9;
        } else {
            p2 = 0;
        }

        if ($("#pr3").val() == 1) {
            p3 = 7;
        } else {
            p3 = 0;
        }

        if ($("#pr4").val() == 1) {
            p4 = 18;
        } else if ($("#pr4").val() == 2) {
            p4 = 9;
        } else {
            p4 = 0;
        }

        if ($("#pr5").val() == 1) {
            p5 = 7;
        } else {
            p5 = 0;
        }

        if ($("#pr6").val() == 1) {
            p6 = 14;
        } else {
            p6 = 0;
        }

        if ($("#pr7").val() == 1) {
            p7 = 18;
        } else if ($("#pr7").val() == 2) {
            p7 = 9;
        } else {
            p7 = 0;
        }

        suma = p1 + p2 + p3 + p4 + p5 + p6 + p7;

        var data = {
            id: $("#iexpediente").val(),
            n_cliente: datos['nombre'],
            id_c: datos['id_cliente'],
            atendio: $("#iatendio").val(),
            fecha: $("#ifecha").val(),
            p1: p1,
            p2: p2,
            p3: p3,
            p4: p4,
            p5: p5,
            p6: p6,
            p7: p7,
            total: suma
        }

        //console.log(data)
        $.ajax({
            url: '/siga/controlador/insert_isc.php',
            type: 'POST',
            data: data,
            success: function(result) {
                //console.log(result)
                if (result == 1) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Correcto',
                        text: 'Encuesta Registrada',
                    })
                    document.getElementById('formdata').reset();
                    //$("#icliente").val(datos['nombre']);
                    $("#iexpediente").attr('disabled', false);
                    $("#btn_registrar").attr('disabled', true);
                    $("#lista_encuestas").DataTable().destroy();
                    recarga();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: result,
                    })
                    document.getElementById('formdata').reset();
                    //$("#icliente").val(datos['nombre']);
                    $("#iexpediente").attr('disabled', false);
                    $("#btn_registrar").attr('disabled', true);
                }
            }
        })

    })

})

function recarga(){

    $.ajax({
        url: '/siga/controlador/t_encuestas.php',
        type: 'POST',
        data: {
            catalago_encuestas: true
        },
        success: function(result){
            document.getElementById("listado_encuestas").innerHTML = result;

            if($("#lista_encuestas").length){
                $('#lista_encuestas').DataTable({
                    dom: 'Blfrtip',
                    buttons: [{
                            extend: 'excelHtml5',
                            messageTop: 'Encuestas',
                            text: "Excel",
                            title: "Listado de Encuestas",
                        },
                        {
                            /*'csvHtml5',*/
                            extend: 'csvHtml5',
                            text: "CSV",
                            title: "Listado de Encuestas",
                            messageTop: 'Listado de Encuestas',
                        },
                        {
                            extend: 'pdfHtml5',
                            title: 'Listado de Encuestas'
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
                    "pageLength": 10,
                    "rowCallback": function(nRow, aData) {

                    } 

                });

            }
            else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'No se encontraron encuestas registradas',
                })

                return false
            }
        }
    })
}