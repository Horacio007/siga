$(document).ready(function(){
    //desde luego luego le agrego que no tiene chance de jalar y tambien una listita toda bonita
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
                    text: 'No se encontraron valuaciones registradas',
                })
    
                return false
            }
        }
    })

    //
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
                    //intento si no jala borrar jajajja
                        $.ajax({
                            url: '/siga/controlador/get_MLM.php',
                            type: 'POST',
                            data: {
                                id: $("#iexpediente").val()
                            },
                            success: function(result){
                                arro = JSON.parse(result);
                                //console.log(arr);
                                $("#inf").fadeIn();
                                $("#inf").css('border-radius', '5px');
                                $("#inf").css('background-color', '#53ee7e'); 
                                $("#info").text('Vehiculo: '+ arro['marca'] + ' ' + arro['linea'] + ' ' + arro['modelo']);
                            }
                        })


                        //intento borrrar jajaj
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
    var reparacion = [];
    var hojalateria = [];
    var pintura = [];
    var mecanica = [];
    //ahora guardare la info talves en un arreglo :v
    $("#btn_agregar").on('click', function(){
        // saco la informacion
        if ($("#ireparacion").val() == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa la Reparacion a realizar',
            })
              
            return false
        }

        reparacion.push($("#ireparacion").val());

        if ($("#hojalateria").prop('checked')) {
            hojalateria.push(1);
        } else {
            hojalateria.push(0);
        }

        if ($("#pintura").prop('checked')) {
            pintura.push(1);
        } else {
            pintura.push(0);
        }

        if ($("#mecanica").prop('checked')) {
            mecanica.push(1);
        } else {
            mecanica.push(0);
        }

        //le quito el no jalar cuando tiene un vslor de mas de uno 
        if (reparacion[0] != '') {
            $("#btn_crear").attr('disabled', false);
        } 

        //le reinicio la informacion :v
        $("#ireparacion").val('') 
        $("#hojalateria").prop('checked', true)
        $("#pintura").prop('checked', true)
        $("#mecanica").prop('checked', true)

        if (reparacion.length == 26) {
            Swal.fire({
                icon: 'warning',
                title: 'Oopps...',
                text: 'Sobrepasaste 26 conceptos, debe crear una nueva Orden de Trabajo',
            })
        }

        //console.log(reparacion, hojalateria, pintura, mecanica)

    })

    $("#btn_crear").on('click', function(){
        //console.log(arr[0]['marca'])
        var obs = $("#tobservaciones").val()
        //console.log(obs.length)
        obs = obs.split('/');
        //console.log(obs, obs.length)
        // Default export is a4 paper, portrait, using millimeters for units
        const doc = new jsPDF();
        doc.addImage('/siga/vista/img/orden_trabajo.jpg', 'jpg', 0, 0, 210, 300)
        doc.setFontSize(11)
        let f1 = new Date();
        let f2 = f1.getDate() + "/" + (f1.getMonth() +1) + "/" + f1.getFullYear()
        doc.text(25, 15, f2)
        doc.text(25, 22, arr[0]['marca']);
        doc.text(25, 28, arr[0]['linea']);
        doc.text(25, 34, arr[0]['modelo']);
        doc.text(25, 40, arr[0]['color']);
        doc.text(25, 46, arr[0]['placas']);
        doc.text(92, 22, $("#iexpediente").val());
        doc.text(92, 28, arr[0]['cliente']);
        var y = 64;
        for (let i = 0; i < reparacion.length; i++) {
            doc.text(25, y, reparacion[i]);
            y = y + 6;
        }
        var yy = 64;
        for (let i = 0; i < reparacion.length; i++) {
            if (hojalateria[i] == 1) {
                doc.text(145, yy, 'X');
            }
            yy = yy + 6;
        }
        var yyy = 64;
        for (let i = 0; i < reparacion.length; i++) {
            if (pintura[i] == 1) {
                doc.text(169, yyy, 'X');
            }
            yyy = yyy + 6;
        }
        var yyyy = 64;
        for (let i = 0; i < reparacion.length; i++) {
            if (mecanica[i] == 1) {
                doc.text(195, yyyy, 'X');
            }
            yyyy = yyyy + 6;
        }
        //le pongo el nombre de quien lo hizo 
        doc.text(84, 293, arr[0]['asesor']);
        //70 235
        var x = 230;
        var xx = 230;
        doc.setFontSize(10);
        for (let i = 0; i < obs.length; i++) {
            //aqui considero dos lineas
            if (obs[i].length > 43) {
                let l1 = obs[i].slice(0, 80)
                let l2 = obs[i].slice(80, 160)
                doc.text(70, x, l1);
                x = x + 6;
                doc.text(70, x, l2);
                x = x + 6;
            //aqui 3
            
                //obs.shift();
            } else {
                let l1 = obs[i]
                doc.text(70, xx, l1);
                xx = xx + 6;
                //obs.shift();
            }
            
        }
        
        //doc.text(70, 235, obs);
        doc.save("orden_trabajo.pdf");
        //aqui va a ir un ajax en donde guarde las ordenes :v
        var data = {
            id: $("#iexpediente").val(),
            fecha: f2,
            reparacion: reparacion,
            hojalateria: hojalateria,
            pintura: pintura,
            mecanica: mecanica,
            observaciones: $("#tobservaciones").val(),
            elaboro: arr[0]['asesor']
        }

        $.ajax({
            url: '/siga/controlador/insert_orden_trabajo.php',
            type: 'POST',
            data : data,
            success: function (result) {
                //console.log(result)
                if (result == 1) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Correcto',
                        text: 'Orden de Trabajo registrada',
                    })
                    document.getElementById("formdata").reset();
                    $("#info").text('');
                    $("#inf").fadeOut();
                    $("#iexpediente").removeAttr("readonly");
                    $("#tobservaciones").val('');
                    $("#btn_crear").attr('disabled', true);
                    $("#btn_agregar").attr('disabled', true);
                    reparacion.length = 0;
                    hojalateria.length = 0;
                    pintura.length = 0;
                    mecanica.length = 0;
                    recargar()
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Orden de Trabajo no registrada',
                    })
                    document.getElementById("formdata").reset();
                    $("#info").text('');
                    $("#inf").fadeOut();
                    $("#iexpediente").removeAttr("readonly");
                    $("#tobservaciones").val('');
                    $("#btn_crear").attr('disabled', true);
                    $("#btn_agregar").attr('disabled', true);
                    reparacion.length = 0;
                    hojalateria.length = 0;
                    pintura.length = 0;
                    mecanica.length = 0;
                    recargar()
                }
            }
        })

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
                    text: 'No se encontraron valuaciones registradas',
                })
    
                return false
            }
        }
    })
}