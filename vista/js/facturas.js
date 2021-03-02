$(document).ready(function(){
    //
    Swal.fire({
        icon: 'warning',
        title: 'Oops...',
        text: 'Recuerda Seleccionar la Fecha BBVA cuando el Estatus de la Aseguradora sea "Pagado"'
    });
    //cosas que no jalan
    $("#marca").attr('disabled', true);
    $("#linea").attr('disabled', true);
    $("#color").attr('disabled', true);
    $("#modelo").attr('disabled', true);
    $("#placas").attr('disabled', true);
    $("#cliente").attr('disabled', true);
    //listado de carros entregados
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
    //busco la info
    $("#btn_buscar").on('click', function(){
        if ($("#iexpediente").val() == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa el No. de Expediente',
            })

            return false
        }


        $.ajax({
            url: '/siga/controlador/get_vinfo.php',
            type: 'POST',
            data: {
                id: $("#iexpediente").val()
            },
            success: function(result){
                arr = JSON.parse(result);
                //console.log(arr)
                if (arr['result'] == 1) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Correcto',
                        text: 'Vehiculo Encontrado',
                    });
                    $("#marca").val(arr['marca']);
                    $("#linea").val(arr['linea']);
                    $("#color").val(arr['color']);
                    $("#modelo").val(arr['modelo']);
                    $("#placas").val(arr['placas']);
                    $("#cliente").val(arr['cliente']);
                    $("#iexpediente").attr('disabled', true);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: arr['error'],
                    })
                    $("#iexpediente").val('')
                }
            }
        });
    })

    //cuando presiono el boton de registrar
    $("#btn_registrar").on('click', function(){

        if ($("#iexpediente").val() == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa el No. de Expediente',
            })

            return false
        }

        if ($("#cantidad").val() == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa la Cantidada Facturar',
            })

            return false
        }

        if ($("#fechaf").val() == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa la Fecha de Facturacion',
            })

            return false
        }

        if ($("#sestatus").val() == 0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Elige el Estatus de en la Aseguradora',
            })

            return false
        }

        if ($("#comentarios").val() == 0) {
            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: 'Agrega un comentario'
            });

            return false
        }

        //saco la info
        var data = {
            id: $("#iexpediente").val(),
            marca: $("#marca").val(),
            linea: $("#linea").val(),
            color: $("#color").val(),
            modelo: $("#modelo").val(),
            placas: $("#placas").val(),
            cliente: $("#cliente").val(),
            cantidad: $("#cantidad").val(),
            fechaf: $("#fechaf").val(),
            estatusA: $("#sestatus").val(),
            fechabbva: $("#fbbva").val(),
            comentarios: $("#comentarios").val()
        };

        //console.log(data);
        //mando las cositas
        $.ajax({
            url: '/siga/controlador/insert_factura.php',
            type: 'POST',
            data: data,
            success: function(result) {
                if (result == 1) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Correcto',
                        text: 'Factura Registrada',
                    })
                    document.getElementById("formdata").reset();
                    $("#iexpediente").attr('disabled', false);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: result,
                    })
                    document.getElementById("formdata").reset();
                    $("#iexpediente").attr('disabled', false);
                }
            }
        })
    })
})