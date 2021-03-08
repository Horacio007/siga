$(document).ready(function(){
    //pongo todos los checklist en true
    
    //valido que si exista el vehiculo al cual se le quiere hacer el checklist
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
                    //intento si no jala borrar jajajja
                        $.ajax({
                            url: '/siga/controlador/get_MLM.php',
                            type: 'POST',
                            data: {
                                id: $("#iexpediente").val()
                            },
                            success: function(result){
                                arr = JSON.parse(result);
                                //console.log(arr);
                                $("#inf").fadeIn();
                                $("#inf").css('border-radius', '5px');
                                $("#inf").css('background-color', '#53ee7e'); 
                                $("#info").text('Vehiculo: '+ arr['marca'] + ' ' + arr['linea'] + ' ' + arr['modelo']);
                            }
                        })


                        //intento borrrar jajaj           
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

    //valido y obtengo la informacion de cada control que esta 
    $("#btn_registrar").on('click', function(){
        //valido que el campo de expediente siga estando marcado y con un expeidente valido
        //valido que no este vacio el campo de expediente
        if ($("#iexpediente").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa el Numero de Expediente',
            })
              
            return false
        }

        //cosdas del exterior
        if( $("#lucesfrontales").prop('checked') ) {
            var lucesfrontales = 1;
        }else{
            var lucesfrontales = 0;
        }

        if( $("#cuartoluces").prop('checked') ) {
            var cuartoluces = 1;
        }else{
            var cuartoluces = 0;
        }

        if( $("#direccionalizq").prop('checked') ) {
            var direccionalizq = 1;
        }else{
            var direccionalizq = 0;
        }

        if( $("#direccionalder").prop('checked') ) {
            var direccionalder = 1;
        }else{
            var direccionalder = 0;
        }

        if( $("#espejoder").prop('checked') ) {
            var espejoder = 1;
        }else{
            var espejoder = 0;
        }

        if( $("#espejoizq").prop('checked') ) {
            var espejoizq = 1;
        }else{
            var espejoizq = 0;
        }

        if( $("#cristales").prop('checked') ) {
            var cristales = 1;
        }else{
            var cristales = 0;
        }

        if( $("#emblemas").prop('checked') ) {
            var emblemas = 1;
        }else{
            var emblemas = 0;
        }

        if( $("#llantas").prop('checked') ) {
            var llantas = 1;
        }else{
            var llantas = 0;
        }

        if( $("#tapon_ruedas").prop('checked') ) {
            var tapon_ruedas = 1;
        }else{
            var tapon_ruedas = 0;
        }

        if( $("#molduras").prop('checked') ) {
            var molduras = 1;
        }else{
            var molduras = 0;
        }

        if( $("#tapa_gasolina").prop('checked') ) {
            var tapa_gasolina = 1;
        }else{
            var tapa_gasolina = 0;
        }

        if( $("#stop").prop('checked') ) {
            var stop = 1;
        }else{
            var stop = 0;
        }

        if( $("#luz_tras_izq").prop('checked') ) {
            var luz_tras_izq = 1;
        }else{
            var luz_tras_izq = 0;
        }

        if( $("#luz_tras_der").prop('checked') ) {
            var luz_tras_der = 1;
        }else{
            var luz_tras_der = 0;
        }

        if( $("#direccional_tras_izq").prop('checked') ) {
            var direccional_tras_izq = 1;
        }else{
            var direccional_tras_izq = 0;
        }

        if( $("#direccional_tras_der").prop('checked') ) {
            var direccional_tras_der = 1;
        }else{
            var direccional_tras_der = 0;
        }

        if( $("#luz_placa").prop('checked') ) {
            var luz_placa = 1;
        }else{
            var luz_placa = 0;
        }

        if( $("#luz_cajuela").prop('checked') ) {
            var luz_cajuela = 1;
        }else{
            var luz_cajuela = 0;
        }

        // cosas del interior
        if( $("#luztablero").prop('checked') ) {
            var luztablero = 1;
        }else{
            var luztablero = 0;
        }

        if( $("#instrumentostablero").prop('checked') ) {
            var instrumentostablero = 1;
        }else{
            var instrumentostablero = 0;
        }

        if( $("#llaves").prop('checked') ) {
            var llaves = 1;
        }else{
            var llaves = 0;
        }

        if( $("#limpiaparabrisasfront").prop('checked') ) {
            var limpiaparabrisasfront = 1;
        }else{
            var limpiaparabrisasfront = 0;
        }

        if( $("#limpiaparabrisastras").prop('checked') ) {
            var limpiaparabrisastras = 1;
        }else{
            var limpiaparabrisastras = 0;
        }

        if( $("#estereo").prop('checked') ) {
            var estereo = 1;
        }else{
            var estereo = 0;
        }

        if( $("#bocinasfront").prop('checked') ) {
            var bocinasfront = 1;
        }else{
            var bocinasfront = 0;
        }

        if( $("#bocinastras").prop('checked') ) {
            var bocinastras = 1;
        }else{
            var bocinastras = 0;
        }

        if( $("#encendedor").prop('checked') ) {
            var encendedor = 1;
        }else{
            var encendedor = 0;
        }

        if( $("#espejoretro").prop('checked') ) {
            var espejoretro = 1;
        }else{
            var espejoretro = 0;
        }

        if( $("#cenicero").prop('checked') ) {
            var cenicero = 1;
        }else{
            var cenicero = 0;
        }
        
        if( $("#cinturones").prop('checked') ) {
            var cinturones = 1;
        }else{
            var cinturones = 0;
        }

        if( $("#luzinterior").prop('checked') ) {
            var luzinterior = 1;
        }else{
            var luzinterior = 0;
        }

        if( $("#parasolizq").prop('checked') ) {
            var parasolizq = 1;
        }else{
            var parasolizq = 0;
        }

        if( $("#parasolder").prop('checked') ) {
            var parasolder = 1;
        }else{
            var parasolder = 0;
        }

        if( $("#vestidurastela").prop('checked') ) {
            var vestidurastela = 1;
        }else{
            var vestidurastela = 0;
        }

        if( $("#vestiduraspiel").prop('checked') ) {
            var vestiduraspiel = 1;
        }else{
            var vestiduraspiel = 0;
        }

        if( $("#testigostablero").prop('checked') ) {
            var testigostablero = 1;
        }else{
            var testigostablero = 0;
        }

        //accesorios
        if( $("#refaccion").prop('checked') ) {
            var refaccion = 1;
        }else{
            var refaccion = 0;
        }

        if( $("#dadoseguridad").prop('checked') ) {
            var dadoseguridad = 1;
        }else{
            var dadoseguridad = 0;
        }

        if( $("#gato").prop('checked') ) {
            var gato = 1;
        }else{
            var gato = 0;
        }

        if( $("#maneral").prop('checked') ) {
            var maneral = 1;
        }else{
            var maneral = 0;
        }

        if( $("#herramientas").prop('checked') ) {
            var herramientas = 1;
        }else{
            var herramientas = 0;
        }

        if( $("#triangulo").prop('checked') ) {
            var triangulo = 1;
        }else{
            var triangulo = 0;
        }

        if( $("#botiquin").prop('checked') ) {
            var botiquin = 1;
        }else{
            var botiquin = 0;
        }

        if( $("#extintor").prop('checked') ) {
            var extintor = 1;
        }else{
            var extintor = 0;
        }

        if( $("#cables").prop('checked') ) {
            var cables = 1;
        }else{
            var cables = 0;
        }

        //componentes mecanicos
        if( $("#claxon").prop('checked') ) {
            var claxon = 1;
        }else{
            var claxon = 0;
        }

        if( $("#taponaceite").prop('checked') ) {
            var taponaceite = 1;
        }else{
            var taponaceite = 0;
        }

        if( $("#tapongasolin").prop('checked') ) {
            var tapongasolin = 1;
        }else{
            var tapongasolin = 0;
        }

        if( $("#taponradiador").prop('checked') ) {
            var taponradiador = 1;
        }else{
            var taponradiador = 0;
        }

        if( $("#vayoneta").prop('checked') ) {
            var vayoneta = 1;
        }else{
            var vayoneta = 0;
        }

        if( $("#bateria").prop('checked') ) {
            var bateria = 1;
        }else{
            var bateria = 0;
        }

        //saco la gasolina
        if ($("#sgasolina").val()==0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa la cantidad de gasolina',
            })
              
            return false
        }

        var gasolina = $("#sgasolina").val();

        //saco el kilometraje
        if ($("#kilometraje").val()=="") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa la cantidad de kilometros recorridos',
            })
              
            return false
        }

        if (isNaN($("#kilometraje").val())) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'El kilometraje esta compuesto por numeros',
            })

            $("#kilometraje").val('');

            return false
        }

        var kilometraje = $("#kilometraje").val();

        //saco las observfaciones
        if ($("#observaciones").val()=="") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingresa las observaciones',
            })
              
            return false
        }

        var observaciones = $("#observaciones").val();



        //creo el arreglo que va a contener toda esta informacion
        var data = {
            expediente: $("#iexpediente").val(),
            lucesfrontales: lucesfrontales,
            cuartoluces: cuartoluces,
            direccionalizq: direccionalizq,
            direccionalder: direccionalder,
            espejoder: espejoder,
            espejoizq: espejoizq,
            cristales: cristales,
            emblemas: emblemas,
            llantas: llantas,
            tapon_ruedas: tapon_ruedas,
            molduras: molduras,
            tapa_gasolina: tapa_gasolina,
            stop: stop,
            luz_tras_izq: luz_tras_izq,
            luz_tras_der: luz_tras_der,
            direccional_tras_izq: direccional_tras_izq,
            direccional_tras_der: direccional_tras_der,
            luz_placa: luz_placa,
            luz_cajuela: luz_cajuela,
            luztablero: luztablero,
            instrumentostablero: instrumentostablero,
            llaves: llaves,
            limpiaparabrisasfront: limpiaparabrisasfront,
            limpiaparabrisastras: limpiaparabrisastras,
            estereo: estereo,
            bocinasfront: bocinasfront,
            bocinastras: bocinastras,
            encendedor: encendedor,
            espejoretro: espejoretro,
            cenicero: cenicero,
            cinturones: cinturones,
            luzinterior: luzinterior,
            parasolizq: parasolizq,
            parasolder: parasolder,
            vestidurastela: vestidurastela,
            vestiduraspiel: vestiduraspiel,
            testigostablero: testigostablero,
            refaccion: refaccion,
            dadoseguridad: dadoseguridad,
            gato: gato,
            maneral: maneral,
            herramientas: herramientas,
            triangulo: triangulo,
            botiquin: botiquin,
            extintor: extintor,
            cables: cables,
            claxon: claxon,
            taponaceite: taponaceite,
            tapongasolin: tapongasolin,
            taponradiador: taponradiador,
            vayoneta: vayoneta,
            bateria: bateria,
            gasolina: gasolina,
            kilometraje: kilometraje,
            observaciones: observaciones
        };

        $.ajax({
            url: '/siga/controlador/insert_checklist.php',
            type: 'POST',
            data: data,
            success: function (result){
                //console.log(result);
                if (result == 1) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Correcto',
                        text: 'Checklist creado',
                    })
                    $("#iexpediente").removeAttr("readonly");
                    $("#info").text('');
                    $("#inf").fadeOut();
                    document.getElementById("formdata").reset();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: result,
                    })
                    $("#info").text('');
                    $("#inf").fadeOut();
                    $("#iexpediente").removeAttr("readonly");
                    document.getElementById("formdata").reset();
                }
            }
        })

        
        /*
        for (var i in data) {
            console.log("Nombre -> "+data+'Valor ->'+data[i]);
            
        }
        */

    });
})