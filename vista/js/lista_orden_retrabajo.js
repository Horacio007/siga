// le agrego la info
$.ajax({
    url: '/siga/controlador/t_ordenes_retrabajo.php',
    type: 'POST',
    data: {
        catalago_ordenes_retrabajo: true
    },
    success: function(result){
        document.getElementById("listado_ordeneret").innerHTML = result;

        if($("#lista_ordenesret").length){
            $('#lista_ordenesret').DataTable({
                dom: 'Blfrtip',
                buttons: [{
                        extend: 'excelHtml5',
                        messageTop: 'Ordenes de Re-Trabajo',
                        text: "Excel",
                        title: "Listado de Ordenes de Re-Trabajo",
                    },
                    {
                        /*'csvHtml5',*/
                        extend: 'csvHtml5',
                        text: "CSV",
                        title: "Listado de Productos",
                        messageTop: 'Listado de Ordenes de Re-Trabajo',
                    },
                    {
                        extend: 'pdfHtml5',
                        title: 'Listado de Ordenes de Re-Trabajo'
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
                text: 'No se encontraron ordenes de re-trabajo registradas',
            })

            return false
        }
    }
})