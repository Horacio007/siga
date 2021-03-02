$(document).ready(function(){
    //valido que no este vacio el campo de expediente
    $("#btn_buscar").on('click', function(){

        if ($("#iexpediente").val()==0) {
            Swal.fire({
                icon: 'error',
                title: 'Oopps...',
                text: 'Rellena el campo de expediente',
            })
    
            return false
        }

        
        $.ajax({
            url: '/siga/controlador/verarchivoss.php',
            type: 'POST',
            data: {
                expediente: $("#iexpediente").val()
            },
            success: function(result){
                //console.log(result)
                $("#tbodi").html(result);
                if($("#lista_archivos").length){
                    $('#lista_archivos').DataTable({
                        dom: 'Blfrtip',
                        buttons: [{
                                extend: 'excelHtml5',
                                messageTop: 'Archivos',
                                text: "Excel",
                                title: "Listado de Archivos",
                            },
                            {
                                /*'csvHtml5',*/
                                extend: 'csvHtml5',
                                text: "CSV",
                                title: "Listado de Archivos",
                                messageTop: 'Listado de Archivos',
                            },
                            {
                                extend: 'pdfHtml5',
                                title: 'Listado de Archivos'
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
    });

    
})