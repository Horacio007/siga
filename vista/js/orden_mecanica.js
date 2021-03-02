$(document).ready(function(){
    //
    $.ajax({
        url: '/siga/controlador/t_ordens.php',
        type: 'POST',
        data: {
            catalago_ordens: true
        },
        success: function(result){
            document.getElementById("listado_orden").innerHTML = result;
    
            if($("#lista_orden").length){
                $('#lista_orden').DataTable({
                    dom: 'Blfrtip',
                    buttons: [{
                            extend: 'excelHtml5',
                            messageTop: 'Orden Trabajo',
                            text: "Excel",
                            title: "Orden Trabajo",
                        },
                        {
                            /*'csvHtml5',*/
                            extend: 'csvHtml5',
                            text: "CSV",
                            title: "Orden Trabajo",
                            messageTop: 'Orden Trabajo',
                        },
                        {
                            extend: 'pdfHtml5',
                            title: 'Orden Trabajo'
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
    //desde luego luego le agrego que no tiene chance de jalar
    $("#btn_crear").attr('disabled', true);
    $("#btn_agregar").attr('disabled', true);

    var arr = [];

    $("#btn_Buscar").on('click', function(){
        //console.log("entra al boton");
        var data = {
            id: $("#iexpediente").val()
        }

        $.ajax({
            url: '/siga/controlador/exist_vorden.php',
            type: 'POST',
            data: data,
            success: function(response){
                arr[0] = JSON.parse(response)
                if (arr[0]['resultado'] == 1) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Correcto',
                        text: 'Vehiculo Encontrado',
                    })
                    $("#iexpediente").attr("readonly","readonly");
                    $("#btn_agregar").attr('disabled', false);  
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oopps...',
                        text: 'Vehiculo no encontrado/registrado',
                    })
                    document.getElementById("formdata").reset();
                }
                
            }
        })
    });
    // var que andan opir ahi
    var diagnostico = [];
    //ahora guardare la info talves en un arreglo :v
    $("#btn_agregar").on('click', function(){
        // saco la informacion
        if ($("#idiagnostico").val() == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa la Obervacion del cliente.',
            })
              
            return false
        }

        diagnostico.push($("#idiagnostico").val());

        //le quito el no jalar cuando tiene un vslor de mas de uno 
        if (diagnostico[0] != '') {
            $("#btn_crear").attr('disabled', false);
        } 

        //le reinicio la informacion :v
        $("#idiagnostico").val('') 

        if (diagnostico.length == 10) {
            Swal.fire({
                icon: 'warning',
                title: 'Oopps...',
                text: 'Sobrepasaste 10 conceptos, debe crear una nueva Orden de Mecanica',
            })
        }

        //console.log(reparacion, hojalateria, pintura, mecanica)

    })

    $("#btn_crear").on('click', function(){
        // Default export is a4 paper, portrait, using millimeters for units
        const doc = new jsPDF();
        doc.addImage('/siga/vista/img/orden_mecanica.jpg', 'jpg', 0, 0, 210, 300)
        doc.setFontSize(12)
        let f1 = new Date();
        let f2 = f1.getDate() + "/" + (f1.getMonth() +1) + "/" + f1.getFullYear()
        doc.text(25, 12, f2)
        doc.text(25, 16.8, arr[0]['marca']);
        doc.text(25, 21.5, arr[0]['linea']);
        doc.text(25, 25.8, arr[0]['modelo']);
        doc.text(25, 30.5, arr[0]['color']);
        doc.text(25, 35, arr[0]['placas']);
        doc.text(92, 16.8, $("#iexpediente").val());
        doc.text(92, 21.5, arr[0]['cliente']);
        var y = 48;
        var yy = 48;
        for (let i = 0; i < diagnostico.length; i++) {
            if (diagnostico.length > 70) {
                let l1 = diagnostico[i].slice(0, 67)
                let l2 = diagnostico[i].slice(67, 134)
                doc.text(25, y, l1);
                y = y + 4.5;
                doc.text(25, y, l2);
                y = y + 4.5;
            } else {
                doc.text(25, yy, diagnostico[i]);
                yy = yy + 4.5;
            }
        }
        
        doc.save("orden_mecanica.pdf");

        var data = {
            id: $("#iexpediente").val(),
            fecha: f2,
            diagnostico: diagnostico,
            elaboro: arr[0]['asesor']
        }

        $.ajax({
            url: '/siga/controlador/insert_orden_mecanica.php',
            type: 'POST',
            data : data,
            success: function (result) {
                //console.log(result)
                if (result == 1) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Correcto',
                        text: 'Orden de Mecanica registrada',
                    })
                    document.getElementById("formdata").reset();
                    $("#iexpediente").removeAttr("readonly");
                    $("#btn_crear").attr('disabled', true);
                    $("#btn_agregar").attr('disabled', true);
                    diagnostico.length = 0;
                    recargar()
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Orden de Mecanica no registrada',
                    })
                    document.getElementById("formdata").reset();
                    $("#iexpediente").removeAttr("readonly");
                    $("#btn_crear").attr('disabled', true);
                    $("#btn_agregar").attr('disabled', true);
                    diagnostico.length = 0;
                    recargar()
                }
            }
        })
        //doc.text(70, 235, obs);
        
        
        //limio toda la informacion

    })
})

function recargar() {
    $.ajax({
        url: '/siga/controlador/t_ordens.php',
        type: 'POST',
        data: {
            catalago_ordens: true
        },
        success: function(result){
            document.getElementById("listado_orden").innerHTML = result;
    
            if($("#lista_orden").length){
                $('#lista_orden').DataTable({
                    dom: 'Blfrtip',
                    buttons: [{
                            extend: 'excelHtml5',
                            messageTop: 'Orden Mecanica',
                            text: "Excel",
                            title: "Orden Mecanica",
                        },
                        {
                            /*'csvHtml5',*/
                            extend: 'csvHtml5',
                            text: "CSV",
                            title: "Orden Mecanica",
                            messageTop: 'Orden Mecanica',
                        },
                        {
                            extend: 'pdfHtml5',
                            title: 'Orden Mecanica'
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
}