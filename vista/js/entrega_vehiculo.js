$(document).ready(function(){
    //console.log("Estoy en el checklist inicial")
    // le agrego la info
$.ajax({
    url: '/siga/controlador/t_ventrega.php',
    type: 'POST',
    data: {
        catalago_ventregados: true
    },
    success: function(result){
        document.getElementById("listado_vtaller").innerHTML = result;

        if($("#lista_vtaller").length){
            $('#lista_vtaller').DataTable({
                dom: 'Blfrtip',
                buttons: [{
                        extend: 'excelHtml5',
                        messageTop: 'Vehiculos',
                        text: "Excel",
                        title: "Listado de Vehiculos",
                    },
                    {
                        /*'csvHtml5',*/
                        extend: 'csvHtml5',
                        text: "CSV",
                        title: "Listado de Productos",
                        messageTop: 'Listado de Vehiculos',
                    },
                    {
                        extend: 'pdfHtml5',
                        title: 'Listado de Vehiculos'
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
    
    $("#btn_Buscar").on('click', function(){
        //console.log("entra al boton");
        var data = {
            id: $("#iexpediente").val()
        }

        $.ajax({
            url: '/siga/controlador/existe_vehiculo_docs.php',
            type: 'POST',
            data: data,
            success: function(response){
                if (response == 1) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oopps...',
                        text: 'Vehiculo no encontrado/registrado',
                    })
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: 'Correcto',
                        text: 'Documentacion creada',
                    })
                    document.getElementById("generarpdf").innerHTML = response;
                    $("#lista_vtaller").DataTable().destroy();
                    recargar();
                }
                
            }
        })
    });
})

function recargar() {
            // le agrego la info
    $.ajax({
        url: '/siga/controlador/t_ventrega.php',
        type: 'POST',
        data: {
            catalago_ventregados: true
        },
        success: function(result){
            document.getElementById("listado_vtaller").innerHTML = result;

            if($("#lista_vtaller").length){
                $('#lista_vtaller').DataTable({
                    dom: 'Blfrtip',
                    buttons: [{
                            extend: 'excelHtml5',
                            messageTop: 'Vehiculos',
                            text: "Excel",
                            title: "Listado de Vehiculos",
                        },
                        {
                            /*'csvHtml5',*/
                            extend: 'csvHtml5',
                            text: "CSV",
                            title: "Listado de Productos",
                            messageTop: 'Listado de Vehiculos',
                        },
                        {
                            extend: 'pdfHtml5',
                            title: 'Listado de Vehiculos'
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