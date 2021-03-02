// le agrego la info
$.ajax({
    url: '/siga/controlador/t_ordenes_mecanica.php',
    type: 'POST',
    data: {
        catalago_ordenes_mecanica: true
    },
    success: function(result){
        document.getElementById("listado_ordenesm").innerHTML = result;

        if($("#lista_ordenesm").length){
            $('#lista_ordenesm').DataTable({
                dom: 'Blfrtip',
                buttons: [{
                        extend: 'excelHtml5',
                        messageTop: 'Ordenes de Mecanica',
                        text: "Excel",
                        title: "Listado de Ordenes de Mecanica",
                    },
                    {
                        /*'csvHtml5',*/
                        extend: 'csvHtml5',
                        text: "CSV",
                        title: "Listado de Productos",
                        messageTop: 'Listado de Ordenes de Mecanica',
                    },
                    {
                        extend: 'pdfHtml5',
                        title: 'Listado de Ordenes de Mecanica'
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
                text: 'No se encontraron ordenes de mecanica registradas',
            })

            return false
        }
    }
})