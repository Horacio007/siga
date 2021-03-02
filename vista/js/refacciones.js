$(document).ready(function (){

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
            url: '/siga/controlador/existe_presupuesto.php',
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
                        text: 'Presupuesto Encontrado',
                    })
                    $("#iexpediente").attr("readonly","readonly");
                    //saco la info del op y el concepto
                    $.ajax({
                        url: '/siga/controlador/get_concepto.php',
                        type: 'POST',
                        data: {
                            id: $("#iexpediente").val()
                        },
                        success: function (result){
                            var data = JSON.parse(result)
                            //console.log(data[0])
                            var con = "";
                            for (let i = 0; i < data.length; i++) {
                                con+= data[i]+"\n";
                                //console.log(data[i])
                            }

                            $("#tconcepto").val(con)
                            
                        }
                    })             
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: result,
                    })
                    document.getElementById("formdata").reset();
                }
            }
        })
    
    
    });

    $("#btn_calcular").on('click', function(){

        if ($("#iexpediente").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa el Numero de Expediente',
            })
              
            return false
        }

        if ($("#tcantidad").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa las Cantidades de cada Concepto',
            })
              
            return false
        }

        if ($("#nprovedor1").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa el nombre del proveedpr 1',
            })
              
            return false
        }

        if ($("#nprovedor2").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa el nombre del proveedpr 2',
            })
              
            return false
        }

        if ($("#nprovedor3").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa el nombre del proveedor 3',
            })
              
            return false
        }

        if ($("#tproveedor1").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa los Precios de Premier',
            })
              
            return false
        }

        if ($("#tproveedor2").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa los Precios de Roto',
            })
              
            return false
        }

        if ($("#tproveedor3").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa los Precios de Aldo',
            })
              
            return false
        }

        //console.log($("#tconcepto").val())
        //saco los datos y valores de cada una de las cosas
        concepto = $("#tconcepto").val()
        //concepto = concepto.replace("\n", '')
        concepto = concepto.split('\n')
        concepto.pop();
        //console.log(concepto)
        cantidad = $("#tcantidad").val()
        //concepto = concepto.replace("\n", '')
        cantidad = cantidad.split('\n')
        if (concepto.length != cantidad.length) {
            cantidad.pop()
        }
        //console.log(concepto)
        proveedor1 = $("#tproveedor1").val()
        //concepto = concepto.replace("\n", '')
        proveedor1 = proveedor1.split('\n')
        if (concepto.length != proveedor1.length) {
            proveedor1.pop()
        }
        //console.log(concepto)
        proveedor2 = $("#tproveedor2").val()
        //concepto = concepto.replace("\n", '')
        proveedor2 = proveedor2.split('\n')
        if (concepto.length != proveedor2.length) {
            proveedor2.pop()
        }
        //console.log(concepto)
        proveedor3 = $("#tproveedor3").val()
        //concepto = concepto.replace("\n", '')
        proveedor3 = proveedor3.split('\n')
        if (concepto.length != proveedor3.length) {
            proveedor3.pop()
        }
        //console.log(concepto, cantidad, proveedor1, proveedor2, proveedor3)
        //ahora si calculo las cosas para ponerlo en los totales
        sumap1 = 0.0
        sumap2 = 0.0
        sumap3 = 0.0

        for (let i = 0; i < proveedor1.length; i++) {
            proveedor1[i] = parseFloat(proveedor1[i]);
            sumap1+= proveedor1[i]
        }

        for (let i = 0; i < proveedor2.length; i++) {
            proveedor2[i] = parseFloat(proveedor2[i]);
            sumap2+= proveedor2[i]
        }

        for (let i = 0; i < proveedor3.length; i++) {
            proveedor3[i] = parseFloat(proveedor3[i]);
            sumap3+= proveedor3[i]
        }

        if (concepto.length == cantidad.length && concepto.length == proveedor1.length && concepto.length == proveedor2.length && concepto.length == proveedor3.length) {
            // le pongo los valores al precionar lo de los totales 
            document.getElementById('lpremier').innerHTML = "Total "+$("#nprovedor1").val()
            document.getElementById('lroto').innerHTML = "Total "+$("#nprovedor2").val()
            document.getElementById('laldo').innerHTML = "Total "+$("#nprovedor3").val()

            $("#tpremier").val(sumap1.toFixed(2))
            $("#troto").val(sumap2.toFixed(2))
            $("#taldo").val(sumap3.toFixed(2))
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Recuerda que todos los campos deben de tener el mismo tamaño',
            })
              
            return false
        }
    });

    $("#btn_calcular2").on('click', function(){

        if ($("#iexpediente").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa el Numero de Expediente',
            })
              
            return false
        }

        if ($("#tcantidad").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa las Cantidades de cada Concepto',
            })
              
            return false
        }

        if ($("#nprovedor1").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa el nombre del proveedpr 1',
            })
              
            return false
        }

        if ($("#nprovedor2").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa el nombre del proveedpr 2',
            })
              
            return false
        }

        if ($("#nprovedor3").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa el nombre del proveedpr 3',
            })
              
            return false
        }

        if ($("#tproveedor1").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa los Precios de Premier',
            })
              
            return false
        }

        if ($("#tproveedor2").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa los Precios de Roto',
            })
              
            return false
        }

        if ($("#tproveedor3").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa los Precios de Aldo',
            })
              
            return false
        }

        if ($("#tpremier").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Debes calcular el total de Premier',
            })
              
            return false
        }

        if ($("#troto").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Debes calcular el total de Roto',
            })
              
            return false
        }

        if ($("#taldo").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Debes calcular el total de Aldo',
            })
              
            return false
        }


        //console.log($("#tconcepto").val())
        //saco los datos y valores de cada una de las cosas
        concepto = $("#tconcepto").val()
        //concepto = concepto.replace("\n", '')
        concepto = concepto.split('\n')
        concepto.pop();
        //console.log(concepto)
        cantidad = $("#tcantidad").val()
        //concepto = concepto.replace("\n", '')
        cantidad = cantidad.split('\n')
        if (concepto.length != cantidad.length) {
            cantidad.pop()
        }
        //console.log(concepto)
        proveedor1 = $("#tproveedor1").val()
        //concepto = concepto.replace("\n", '')
        proveedor1 = proveedor1.split('\n')
        if (concepto.length != proveedor1.length) {
            proveedor1.pop()
        }
        //console.log(concepto)
        proveedor2 = $("#tproveedor2").val()
        //concepto = concepto.replace("\n", '')
        proveedor2 = proveedor2.split('\n')
        if (concepto.length != proveedor2.length) {
            proveedor2.pop()
        }
        //console.log(concepto)
        proveedor3 = $("#tproveedor3").val()
        //concepto = concepto.replace("\n", '')
        proveedor3 = proveedor3.split('\n')
        if (concepto.length != proveedor3.length) {
            proveedor3.pop()
        }
        //console.log(concepto, cantidad, proveedor1, proveedor2, proveedor3)
        //ahora si calculo las cosas para ponerlo en los totales
        sumap1 = 0.0
        sumap2 = 0.0
        sumap3 = 0.0

        for (let i = 0; i < proveedor1.length; i++) {
            proveedor1[i] = parseFloat(proveedor1[i]);
            sumap1+= proveedor1[i]
        }

        for (let i = 0; i < proveedor2.length; i++) {
            proveedor2[i] = parseFloat(proveedor2[i]);
            sumap2+= proveedor2[i]
        }

        for (let i = 0; i < proveedor3.length; i++) {
            proveedor3[i] = parseFloat(proveedor3[i]);
            sumap3+= proveedor3[i]
        }

        var prov = '';
        var cant = ''; 

        // le pongo los valores al precionar lo de los totales 
        for (let i = 0; i < concepto.length; i++) {
            apoyo = [proveedor1[i], proveedor2[i], proveedor3[i]].sort((a, b) => a - b)

            if (proveedor1.includes(apoyo[0])) {
                prov+=$("#nprovedor1").val()+'\n';
                cant+=''+apoyo[0]+'\n';
            } else if (proveedor2.includes(apoyo[0])) {
                prov+=$("#nprovedor2").val()+'\n';
                cant+=''+apoyo[0]+'\n';
            } else {
                prov+=$("#nprovedor3").val()+'\n';
                cant+=''+apoyo[0]+'\n';
            }
            
        }

        prov = prov.split('\n')
        cant = cant.split('\n')
        prov.pop()
        cant.pop()

        if (concepto.length == cantidad.length && concepto.length == proveedor1.length && concepto.length == proveedor2.length && concepto.length == proveedor3.length) {
            // le pongo los valores al precionar lo de los totales 
            var pfinal = '';
            var ctotales = '';
            var sumacto = 0.0;
            for (let i = 0; i < prov.length; i++) {
                pfinal+= prov[i]+'\n';
                ctotales+= cant[i]+'\n';  
            }

            ctotales2 = ctotales.split('\n');
            if (concepto.length != ctotales2.length) {
                ctotales2.pop()
            }

            for (let i = 0; i < ctotales2.length; i++) {
                ctotales2[i] = parseFloat(ctotales2[i]);
                sumacto+= ctotales2[i];
            }

            $("#tproveedorf").val(pfinal);
            $("#tcostos").val(ctotales);
            $("#tcostosf").val(sumacto.toFixed(2));
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Recuerda que todos los campos deben de tener el mismo tamaño',
            })
              
            return false
        }

        // le agrego las cosas en donde deben de ir

        //console.log(prov, cant, ctotales, ctotales2)
    });

    $("#btn_registrar").on('click', function (){
        if ($("#iexpediente").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa el Numero de Expediente',
            })
              
            return false
        }

        if ($("#tcantidad").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa las Cantidades de cada Concepto',
            })
              
            return false
        }

        if ($("#nprovedor1").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa el nombre del proveedpr 1',
            })
              
            return false
        }

        if ($("#nprovedor2").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa el nombre del proveedpr 2',
            })
              
            return false
        }

        if ($("#nprovedor3").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa el nombre del proveedpr 3',
            })
              
            return false
        }

        if ($("#tproveedor1").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa los Precios de Premier',
            })
              
            return false
        }

        if ($("#tproveedor2").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa los Precios de Roto',
            })
              
            return false
        }

        if ($("#tproveedor3").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa los Precios de Aldo',
            })
              
            return false
        }

        if ($("#tpremier").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Debes calcular el total de Premier',
            })
              
            return false
        }

        if ($("#troto").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Debes calcular el total de Roto',
            })
              
            return false
        }

        if ($("#taldo").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Debes calcular el total de Aldo',
            })
              
            return false
        }

        if ($("#tproveedorf").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Debes calcular primero los Totales de cada proveedor',
            })
              
            return false
        }

        if ($("#tcostos").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Debes calcular primero los Totales de cada proveedor',
            })
              
            return false
        }

        if ($("#tcostosf").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Debes calcular primero los Totales de cada proveedor',
            })
              
            return false
        }

        if ($("#tfechapromesa").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Debes ingresar las Fechas promesa',
            })
              
            return false
        }

        if ($("#tnumguia").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Debes ingresar los Numeros de guia',
            })
              
            return false
        }

        if ($("#tcomentarios").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Debes ingresar los Comentarios',
            })
              
            return false
        }

        //prepara la informacion con puros / y - para las fechas
        expediente = $("#iexpediente").val()
        concepto = $("#tconcepto").val().split('\n')
        var nconcepto = "";
        for (let i = 0; i < concepto.length; i++) {
            nconcepto+= concepto[i]+'/';           
        }
        var ncantidad = "";
        cantidad = $("#tcantidad").val().split('\n')
        for (let i = 0; i < cantidad.length; i++) {
            ncantidad+= cantidad[i]+'/';
        }
        nombreprov1 = $("#nprovedor1").val()
        nombreprov2 =  $("#nprovedor2").val()
        nombreprov3 = $("#nprovedor3").val()
        var nproveedor1 = "";
        proveedor1 = $("#tproveedor1").val().split('\n')
        for (let i = 0; i < proveedor1.length; i++) {
            nproveedor1+= proveedor1[i]+'/';          
        }
        var nproveedor2 = "";
        proveedor2 = $("#tproveedor2").val().split('\n')
        for (let i = 0; i < proveedor2.length; i++) {
            nproveedor2+= proveedor2[i]+'/';          
        }
        var nproveedor3 = "";
        proveedor3 = $("#tproveedor3").val().split('\n')
        for (let i = 0; i < proveedor3.length; i++) {
            nproveedor3+= proveedor3[i]+'/';          
        }
        tpremier = $("#tpremier").val(),
        troto = $("#troto").val(),
        taldo = $("#taldo").val(),
        ntproveedorf = "";
        tproveedorf = $("#tproveedorf").val().split('\n')
        for (let i = 0; i < tproveedorf.length; i++) {
            ntproveedorf+= tproveedorf[i]+'/';          
        }
        ntcostos = "";
        tcostos = $("#tcostos").val().split('\n')
        for (let i = 0; i < tcostos.length; i++) {
            ntcostos+= tcostos[i]+'/';   
        }
        tcostosf =  $("#tcostosf").val()
        ntfechapromesa = "";
        tfechapromesa = $("#tfechapromesa").val().split('\n')
        for (let i = 0; i < tfechapromesa.length; i++) {
            ntfechapromesa+= tfechapromesa[i]+'-';         
        }
        ntnumguia = "";
        tnumguia = $("#tnumguia").val().split('\n')
        for (let i = 0; i < tnumguia.length; i++) {
            ntnumguia+= tnumguia[i]+'/';           
        }
        ntcomentarios = "";
        tcomentarios = $("#tcomentarios").val().split('\n')
        for (let i = 0; i < tcomentarios.length; i++) {
            ntcomentarios+= tcomentarios[i]+'/';      
        }

        
        //console.log(expediente, concepto, cantidad, nombreprov1, nombreprov2, nombreprov3, proveedor1, proveedor2, proveedor3, tpremier, troto, taldo, tproveedorf, tcostos, tfechapromesa, tnumguia, tcomentarios)
        let f1 = new Date();
        let f2 = f1.getFullYear() + '-' +(f1.getMonth() +1) + "-" + f1.getDate()
        // me creo el arreglo con el que guardare toda la informacion
        var data = {
            expediente: expediente,
            concepto: nconcepto,
            cantidad: ncantidad,
            nombreprov1: nombreprov1,
            nombreprov2: nombreprov2,
            nombreprov3: nombreprov3,
            proveedor1: nproveedor1,
            proveedor2: nproveedor2,
            proveedor3: nproveedor3,
            tpremier: tpremier,
            troto: troto,
            taldo: taldo,
            tproveedorf: ntproveedorf,
            tcostos: ntcostos,
            tcostosf: tcostosf,
            tfechapromesa: ntfechapromesa,
            tnumguia: ntnumguia,
            tcomentarios: ntcomentarios,
            fecha: f2

        }

        //console.log(dataa.expediente, dataa.concepto, dataa.cantidad, dataa.nombreprov1, dataa.nombreprov2, dataa.nombreprov3, dataa.proveedor1, dataa.proveedor2, dataa.proveedor3, dataa.tpremier, dataa.troto, dataa.taldo, dataa.tproveedorf,  dataa.tcostos,dataa.tcostosf, dataa.tfechapromesa, dataa.tnumguia, dataa.tcomentarios)
      
        //console.log(data)
        $.ajax({
            url: '/siga/controlador/insert_cotrefacciones.php',
            type: 'POST',
            data: data,
            success: function(result){
                //console.log(result);
                if (result == 1) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Correcto',
                        text: 'Costeo de Refacciones registrado',
                    })
                    $("#iexpediente").removeAttr("readonly");
                    document.getElementById("formdata").reset();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: result,
                    })
                    $("#iexpediente").removeAttr("readonly");
                    document.getElementById("formdata").reset();
                }
            }
        })

    })
})