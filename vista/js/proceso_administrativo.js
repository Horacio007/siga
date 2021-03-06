$(document).ready(function(){
    //le agrego al ernestus un buscador para que no busque mucho 
    $.ajax({
        url: '/siga/controlador/t_procesoAdmon.php',
        type: 'POST',
        data: {
            catalago_proceso: true
        },
        success: function(result){
            document.getElementById("listado_proceso").innerHTML = result;

            if($("#lista_proceso").length){
                $('#lista_proceso').DataTable({
                    dom: 'Blfrtip',
                    buttons: [{
                            extend: 'excelHtml5',
                            messageTop: 'Vehiculos',
                            text: "Excel",
                            title: "Listado de Vehiuclos",
                        },
                        {
                            /*'csvHtml5',*/
                            extend: 'csvHtml5',
                            text: "CSV",
                            title: "Listado de Vehiculos",
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
                    "pageLength": 100,
                    "order": [[9, "desc"], [11, "desc"], [13, "desc"], [15, "desc"]],
                    "rowCallback": function(nRow, aData) {
                        if (aData[7] == 0) {
                            $(nRow).find('td:eq(7)').css('background-color', '#53ee7e');
                        }

                        if (aData[8] >= 0 && aData[8] <= 2) {
                            $(nRow).find('td:eq(8)').css('background-color', '#53ee7e'); 
                        } else {
                            $(nRow).find('td:eq(8)').css('background-color', '#F08080');
                        }

                        if (aData[9] == 'Autorizado') {
                            $(nRow).find('td:eq(9)').css('background-color', '#53ee7e');
                        } else {
                            $(nRow).find('td:eq(9)').css('background-color', '#F9FFC9');
                        }

                        if (aData[10] >= 0 && aData[10] <= 3) {
                            $(nRow).find('td:eq(10)').css('background-color', '#53ee7e');
                        } else {
                            $(nRow).find('td:eq(10)').css('background-color', '#F08080');
                        }

                        if (aData[11] == 'Autorizado') {
                            $(nRow).find('td:eq(11)').css('background-color', '#53ee7e');
                        } else {
                            $(nRow).find('td:eq(11)').css('background-color', '#F9FFC9');
                        }

                        if (aData[12] >= 0 && aData[12] <= 4) {
                            $(nRow).find('td:eq(12)').css('background-color', '#53ee7e');
                        } else {
                            $(nRow).find('td:eq(12)').css('background-color', '#F08080');
                        }

                        if (aData[13] == 'Autorizado') {
                            $(nRow).find('td:eq(13)').css('background-color', '#53ee7e');
                        } else {
                            $(nRow).find('td:eq(13)').css('background-color', '#F9FFC9');
                        }

                        if (aData[14] >= 0 && aData[14] <= 7) {
                            $(nRow).find('td:eq(14)').css('background-color', '#53ee7e');
                        } else {
                            $(nRow).find('td:eq(14)').css('background-color', '#F08080');
                        }

                        if (aData[15] == 'Autorizado') {
                            $(nRow).find('td:eq(15)').css('background-color', '#53ee7e');
                        } else {
                            $(nRow).find('td:eq(15)').css('background-color', '#F9FFC9');
                        }
                         
                    }
    
                });

            }
            else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'No se encontraron vehiculos registrados',
                })
    
                return false
            }
        }
    })
})