$(document).ready(function(){
    //
    $("#btn_agregar").attr('disabled', true);
    $("#btn_calcular").attr('disabled', true);
    $("#btn_calcular2").attr('disabled', true);
    //btn_calcular2
    $("#btn_buscar").on('click', function(){
        //valido que no este vacio el campo de expediente
        if ($("#iexpediente").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa el Numero de Expediente',
            })
              
            return false
        }
        
        //hago la peticion ajax
        $.ajax({
            url: '/siga/controlador/existe_vehiculo_checklist.php',
            type: 'POST',
            data: {
                id: $("#iexpediente").val()
            },
            success: function(result){
                //console.log(result);
                if (result == 1) {
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
                        title: 'Oops...',
                        text: 'Vehiculo no encontrado y/o registrado',
                    })
                    document.getElementById("formdata").reset();
                }
            }
        })
    
    
    });
    //creo las variables para guardar los datos
    var operacion = [];
    var nivel = [];
    var concepto = [];
    var momh = [];
    var momp = [];
    var momm = [];
    var tot = [];
    var refacciones = [];
    //que jale lo del boton de actualizar
    $("#btn_agregar").on('click', function(){
        // valido que nada este vacio
        if ($("#toperacion").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa la Operacion',
            })
              
            return false
        }

        if ($("#tnivel").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa el Nivel de Daño',
            })
              
            return false
        }

        if ($("#tconcepto").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa el Concepto',
            })
              
            return false
        }

        if ($("#tmomh").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa el costo de Mano de Obra Material y Hojalateria',
            })
              
            return false
        }

        if ($("#tmomp").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa el costo de Mano de Obra Material y Pintura',
            })
              
            return false
        }

        if ($("#tmomm").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa el costo de Mano de Obra Material y Mecanica',
            })
              
            return false
        }

        if ($("#ttot").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa el costo de Trabajos en otro Taller',
            })
              
            return false
        }

        if ($("#trefacciones").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa el costo de las Refacciones',
            })
              
            return false
        }
        //le asigno los valores a cada uno de los diferentes arreglos que se han creasdo
        operacion.push($("#toperacion").val());
        nivel.push($("#tnivel").val());
        concepto.push($("#tconcepto").val());
        momh.push($("#tmomh").val());
        momp.push($("#tmomp").val());
        momm.push($("#tmomm").val());
        tot.push($("#ttot").val());
        refacciones.push($("#trefacciones").val());
        //si es diferente de 0 se le pone lo de poder registrar _v
        if (operacion.length != 0) {
            $("#btn_calcular").attr('disabled', false);
            $("#btn_calcular2").attr('disabled', false);
        }
        //limpio las cosas
        $("#toperacion").val('');
        $("#tnivel").val('');
        $("#tconcepto").val('');
        $("#tmomh").val('');
        $("#tmomp").val('');
        $("#tmomm").val('');
        $("#ttot").val('');
        $("#trefacciones").val('');

    })

    $("#btn_calcular").on('click', function(){
        // valido que todos tengan el mismo tamaño
        if (operacion.length == nivel.length && operacion.length == concepto.length && operacion.length == momh.length && operacion.length == momp.length && operacion.length == momm.length && operacion.length == tot.length && operacion.length == refacciones.length) {
            //creo las variables para guardar los valroes
            sumamomh = 0.0;
            sumamomp = 0.0;
            sumamomm = 0.0;
            sumatot = 0.0;
            sumarefacciones = 0.0;
            // transformo cada elemento de cada arreglo en float y de una vez lo sumo 
            for (let i = 0; i < momh.length; i++) {
                momh[i] = parseFloat(momh[i]);
                sumamomh+= momh[i];
            }

            for (let i = 0; i < momp.length; i++) {
                momp[i] = parseFloat(momp[i]);
                sumamomp+= momp[i];
            }

            for (let i = 0; i < momm.length; i++) {
                momm[i] = parseFloat(momm[i]);
                sumamomm+= momm[i];
            }

            for (let i = 0; i < tot.length; i++) {
                tot[i] = parseFloat(tot[i]);
                sumatot+= tot[i];
            }

            for (let i = 0; i < refacciones.length; i++) {
                refacciones[i] = parseFloat(refacciones[i]);
                sumarefacciones+= refacciones[i];
                
            }
            //console.log(sumamomh, sumamomp, sumamomm, sumatot, sumarefacciones);
            //le mando los valores a los lugares correspondientes
            $("#itmomh").val(sumamomh.toFixed(2));
            $("#itmomp").val(sumamomp.toFixed(2));
            $("#itmomm").val(sumamomm.toFixed(2));
            $("#ittot").val(sumatot.toFixed(2));
            $("#itrefacciones").val(sumarefacciones.toFixed(2));

        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Recuerda que todos los campos deben de tener el mismo tamaño',
            })
              
        }

    })
    // calculo los totales de los totales
    $("#btn_calcular2").on('click', function(){

        totalmomh = parseFloat($("#itmomh").val());
        totalmomp = parseFloat($("#itmomp").val());
        totalmomm = parseFloat($("#itmomm").val());
        totaltot = parseFloat($("#ittot").val());
        totalrefacciones = parseFloat($("#itrefacciones").val());
        subtotal = totalmomh + totalmomp + totalmomm + totaltot + totalrefacciones;
        iva = subtotal * 0.16;
        total = subtotal + iva;
        
        $("#isubtotal").val(subtotal.toFixed(2));
        $("#iiva").val(iva.toFixed(2));
        $("#itotal").val(total.toFixed(2));
    })

    //ahora registro todo este rollo
    $("#btn_registrar").on('click', function(){

        if ($("#itmomh").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Calcula el total de Mano de obra Material y Hojalateria',
            })
              
            return false
        }

        if ($("#itmomp").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Calcula el total de Mano de obra Material y Pintura',
            })
              
            return false
        }

        if ($("#itmomm").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Calcula el total de Mano de obra Material y Mecanica',
            })
              
            return false
        }

        if ($("#ittot").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Calcula el total de Trabajo en otro Taller',
            })
              
            return false
        }

        if ($("#itrefacciones").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Calcula el total de las Refacciones',
            })
              
            return false
        }

        if ($("#isubtotal").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Calcula el subtotal',
            })
              
            return false
        }

        if ($("#iiva").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Calcula el iva',
            })
              
            return false
        }

        if ($("#itotal").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Calcula el total',
            })
              
            return false
        }

        let f1 = new Date();
        let f2 = f1.getFullYear() + '-' +(f1.getMonth() +1) + "-" + f1.getDate()
        let operacion1 = '';
        let nivel1 = '';
        let concepto1 = '';
        let momh1 = '';
        let momp1 = '';
        let momm1 = '';
        let tot1 = '';
        let refacciones1 = '';

        for (let i = 0; i < operacion.length; i++) {
            operacion1 += operacion[i] + '/';
        }

        for (let i = 0; i < nivel.length; i++) {
            nivel1 += nivel[i] + '/';
        }

        for (let i = 0; i < concepto.length; i++) {
            concepto1 += concepto[i] + '/';
        }

        for (let i = 0; i < momh.length; i++) {
            momh1 += momh[i] + '/';
        }

        for (let i = 0; i < momp.length; i++) {
            momp1 += momp1[i] + '/';
        }

        for (let i = 0; i < momm.length; i++) {
            momm1 += momm[i] + '/';
        }

        for (let i = 0; i < tot.length; i++) {
            tot1 += tot[i] + '/';
        }

        for (let i = 0; i < refacciones.length; i++) {
            refacciones1 += refacciones[i] + '/';
        }

        // me creo el arreglo que voy a mandar a registrar 
        var data = {
            expediente: $("#iexpediente").val(),
            operacion: operacion1,
            nivel: nivel1,
            concepto: concepto1,
            momh: momh1,
            momp: momp1,
            momm: momm1,
            tot: tot1,
            refacciones: refacciones1,
            tmomh: $("#itmomh").val(),
            tmomp: $("#itmomp").val(),
            tmomm: $("#itmomm").val(),
            ttot: $("#ittot").val(),
            trefacciones: $("#itrefacciones").val(),
            subtotal: $("#isubtotal").val(),
            iva: $("#iiva").val(),
            total: $("#itotal").val(),
            fecha: f2
        }
        //saco la informacion del nombre
        /*
        var ncliente;
        $.ajax({
            url: '/siga/controlador/get_nombreClien.php',
            type: 'POST',
            data: {
                id: $("#iexpediente").val()
            },
            success: function(response){
                ncliente = JSON.parse(response).cliente
            }
        })
        //creo el pdf
        const doc = new jsPDF();
        doc.addImage('/siga/vista/img/formato_presupuesto.jpg', 'jpg', 0, 0, 210, 300)
        doc.setFontSize(11)
        //saco el nomrbe del cliente al que le pertenece el presupuesto
        console.log(ncliente)
        //doc.text(25, 15, nombre)
        //lo creo y lo mando
        doc.save("presupuesto_inicial.pdf");
        */
        //console.log(data.expediente, data.operacion, data.nivel, data.concepto, data.momh, data.momp, data.momm, data.tot, data.refacciones, data.tmomh, data.tmomp, data.tmomm, data.ttot, data.trefacciones, data.subtotal, data.iva, data.total);
        // mando la info a registrar
        
        $.ajax({
            url: '/siga/controlador/insert_presupuesto.php',
            type: 'POST',
            data: data,
            success: function(result){
                if (result == 1) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Correcto',
                        text: 'Presupuesto Registrado',
                    })
                    $("#iexpediente").removeAttr("readonly");
                    $("#btn_agregar").attr('disabled', true);
                    $("#btn_calcular").attr('disabled', true);
                    $("#btn_calcular2").attr('disabled', true);
                    document.getElementById("formdata").reset();
                    operacion.length = 0;
                    operacion1.length = 0;
                    nivel.length = 0;
                    nivel1.length = 0;
                    concepto.length = 0;
                    concepto1.length = 0;
                    momh.length = 0;
                    momh1.length = 0;
                    momp.length = 0;
                    momp1.length = 0;
                    momm.length = 0;
                    momm1.length = 0;
                    tot.length = 0;
                    tot1.length = 0;
                    refacciones.length = 0;
                    refacciones1.length = 0;
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: result,
                    })
                    $("#iexpediente").removeAttr("readonly");
                    $("#btn_agregar").attr('disabled', true);
                    $("#btn_calcular").attr('disabled', true);
                    $("#btn_calcular2").attr('disabled', true);
                    document.getElementById("formdata").reset();
                    operacion.length = 0;
                    operacion1.length = 0;
                    nivel.length = 0;
                    nivel1.length = 0;
                    concepto.length = 0;
                    concepto1.length = 0;
                    momh.length = 0;
                    momh1.length = 0;
                    momp.length = 0;
                    momp1.length = 0;
                    momm.length = 0;
                    momm1.length = 0;
                    tot.length = 0;
                    tot1.length = 0;
                    refacciones.length = 0;
                    refacciones1.length = 0;
                }
            }
        })
        
    })
})