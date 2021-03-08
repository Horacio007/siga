$(document).ready(function(){
    //si esta entrando al js
    //console.log("funciona")
    //al precionaar este boton se va la pagina principal
    $("#dtrIndex").on("click", function(){
        location.href = "/siga/vista/paginas/menu.php";
    })

    //entro a la pagina de alta del vehiculo
    $("#altaVehiculo").on("click", function(){
        $.ajax({
            url: "/siga/vista/paginas/alta_vehiculo.php",
            success: function (result) {
               $("#principal").html(result);
            }   
        });
    });

    //entro a la pagina del checklist inicial
    $("#altachecklist").on("click", function(){
        $.ajax({
            url: "/siga/vista/paginas/checklist.php",
            success: function (result) {
               $("#principal").html(result);
            }   
        });
    });

    //entro a la pagina de entrega de documentos
    $("#documentosEntrega").on("click", function(){
        $.ajax({
            url: "/siga/vista/paginas/entrega_vehiculo.php",
            success: function (result) {
               $("#principal").html(result);
            }   
        });
    });

    //entro a la pagina de agregacion de una linea nueva
    $("#agregarLinea").on("click", function(){
        $.ajax({
            url: "/siga/vista/paginas/alta_linea.php",
            success: function (result) {
               $("#principal").html(result);
            }   
        });
    });

    //agrego la pagina la cual me hace cambiar el estatus del vehiculo una vez entregado
    $("#estatus_vehiculo").on('click', function(){
        $.ajax({
            url: '/siga/vista/paginas/estatus_vehiculo.php',
            success: function (result){
                $("#principal").html(result);
            }
        })
    });

    //agrego la pagina de la subida de archivos
    $("#subir_archivo").on('click', function(){
        $.ajax({
            url: '/siga/vista/paginas/alta_archivos.php',
            success: function (result){
                $("#principal").html(result);
            }
        })
    });

    //agrego la pagina que me da opcion de descargar los archivos
    $("#descargar_archivo").on('click', function(){
        $.ajax({
            url: '/siga/vista/paginas/descargar_archivos.php',
            success: function (result){
                $("#principal").html(result);
            }
        })
    });

    //agrego la evidencia de fotos y eso
    $("#evidenciafirma").on('click', function(){
        $.ajax({
            url: '/siga/vista/paginas/alta_archivosff.php',
            success: function (result){
                $("#principal").html(result);
            }
        })
    });

    //agrego la sacacion del pdf
    $("#checklistpdf").on('click', function(){
        $.ajax({
            url: '/siga/vista/paginas/checklistinicial.php',
            success: function (result){
                $("#principal").html(result);
            }
        })
    });

    //agrego la sacacion de los archivos
    $("#verarchivos").on('click', function(){
        $.ajax({
            url: '/siga/vista/paginas/verarchivos.php',
            success: function (result){
                $("#principal").html(result);
            }
        })
    });

    //agrego la agregacion de los presupuestos
    $("#presupuestoini").on('click', function(){
        $.ajax({
            url: '/siga/vista/paginas/presupuesto_inicial.php',
            success: function (result){
                $("#principal").html(result);
            }
        })
    });

    // agrego la agregacion del pdf del presupuestop
    $("#presupuestopdf").on('click', function(){
        $.ajax({
            url: '/siga/vista/paginas/presupuestos_inicialpdf.php',
            success: function (result){
                $("#principal").html(result);
            }
        })
    });

    // agrego la agregacion dde la subicion del costeo incial
    $("#evidencipresupuesto").on('click', function(){
        $.ajax({
            url: '/siga/vista/paginas/altaarchivospresupuesto.php',
            success: function (result){
                $("#principal").html(result);
            }
        })
    });

    // agrego la agregacion dde la subicion del costeo incial
    $("#cotizarrefacciones").on('click', function(){
        $.ajax({
            url: '/siga/vista/paginas/refacciones.php',
            success: function (result){
                $("#principal").html(result);
            }
        })
    });

    
    // agrego la agregacion dde la subicion del costeo incial
    $("#refaccionespd").on('click', function(){
        $.ajax({
            url: '/siga/vista/paginas/refaccionespd.php',
            success: function (result){
                $("#principal").html(result);
            }
        })
    });

    //agrego la agregacion de la subida de evidencias
    $("#evidenciarefacciones").on('click', function(){
        $.ajax({
            url: '/siga/vista/paginas/altaarchivosrefacciones.php',
            success: function (result){
                $("#principal").html(result);
            }
        })
    });

    //agrego la agregacion de la registrada de refacciones
    $("#altarefacciones").on('click', function(){
        $.ajax({
            url: '/siga/vista/paginas/alta_almacen.php',
            success: function (result){
                $("#principal").html(result);
            }
        })
    });

    // agrego las listas de las refas
    $("#listarefaccionespd").on('click', function(){
        $.ajax({
            url: '/siga/vista/paginas/listarefaccionespdf.php',
            success: function (result){
                $("#principal").html(result);
            }
        })
    });

    // agrego las bajas de las refas
    $("#bajarefacciones").on('click', function(){
        $.ajax({
            url: '/siga/vista/paginas/baja_almacen.php',
            success: function (result){
                $("#principal").html(result);
            }
        })
    });

    // agrego las listas de las refas
    $("#listarefacciones").on('click', function(){
        $.ajax({
            url: '/siga/vista/paginas/lista_refacciones.php',
            success: function (result){
                $("#principal").html(result);
            }
        })
    });

    //le agrego lo entregado
    $("#listaentregadas").on('click', function(){
        $.ajax({
            url: '/siga/vista/paginas/lista_ref_entregado.php',
            success: function (result){
                $("#principal").html(result);
            }
        })
    });

    //agrego lo de la asginacion de personal
    $("#ordentrabajo").on('click', function(){
        $.ajax({
            url: '/siga/vista/paginas/orden_trabajo.php',
            success: function (result){
                $("#principal").html(result);
            }
        })
    });

     //agreo lo del retrabajo
    //agrego lo de la asginacion de personal
    $("#ordenmecanica").on('click', function(){
        $.ajax({
            url: '/siga/vista/paginas/orden_mecanica.php',
            success: function (result){
                $("#principal").html(result);
            }
        })
    });

    //agrego lo de la asginacion de personal
    $("#listaordenmecanica").on('click', function(){
        $.ajax({
            url: '/siga/vista/paginas/lista_orden_mecanica.php',
            success: function (result){
                $("#principal").html(result);
            }
        })
    });

     //agrego lo de la asginacion de personal
     $("#listaordentrabajo").on('click', function(){
        $.ajax({
            url: '/siga/vista/paginas/lista_orden_trabajo.php',
            success: function (result){
                $("#principal").html(result);
            }
        })
    });

    //agreo lo del retrabajo
    //agrego lo de la asginacion de personal
    $("#ordenretrabajo").on('click', function(){
        $.ajax({
            url: '/siga/vista/paginas/orden_retrabajo.php',
            success: function (result){
                $("#principal").html(result);
            }
        })
    });

    //agrego lo de la asginacion de personal
    $("#listaordenretrabajo").on('click', function(){
        $.ajax({
            url: '/siga/vista/paginas/lista_orden_retrabajo.php',
            success: function (result){
                $("#principal").html(result);
            }
        })
    });

    //agrego lo de la asginacion de personal
    $("#actualizarpresupuestoini").on('click', function(){
        $.ajax({
            url: '/siga/vista/paginas/actualizar_presupuesto.php',
            success: function (result){
                $("#principal").html(result);
            }
        })
    });

     //agrego lo de la asginacion de bitacora
     $("#valuaciones").on('click', function(){
        $.ajax({
            url: '/siga/vista/paginas/valuaciones.php',
            success: function (result){
                $("#principal").html(result);
            }
        })
    });

    //agrego lo de la asginacion de bitacora
    $("#brefacciones").on('click', function(){
        $.ajax({
            url: '/siga/vista/paginas/BRefacciones.php',
            success: function (result){
                $("#principal").html(result);
            }
        })
    });

    //agrego lo de la asginacion de bitacora
    $("#asignacion_personal").on('click', function(){
        $.ajax({
            url: '/siga/vista/paginas/asignacion_personal.php',
            success: function (result){
                $("#principal").html(result);
            }
        })
    });

    //agrego lo de la asginacion de bitacora 
    $("#procesoTaller").on('click', function(){
        $.ajax({
            url: '/siga/vista/paginas/taller.php',
            success: function (result){
                $("#principal").html(result);
            }
        })
    });

    $("#procesoAdmon").on('click', function(){
        $.ajax({
            url: '/siga/vista/paginas/proceso_administrativo.php',
            success: function (result){
                $("#principal").html(result);
            }
        })
    });

    $("#procesosegtaller").on('click', function(){
        $.ajax({
            url: '/siga/vista/paginas/proceso_taller.php',
            success: function (result){
                $("#principal").html(result);
            }
        })
    });

    $("#gastos").on('click', function(){
        $.ajax({
            url: '/siga/vista/paginas/gastos.php',
            success: function (result){
                $("#principal").html(result);
            }
        })
    });

    $("#tipogmes").on('click', function(){
        $.ajax({
            url: '/siga/vista/paginas/tipo_gasto_mes.php',
            success: function (result){
                $("#principal").html(result);
            }
        })
    });

    $("#hisgastos").on('click', function(){
        $.ajax({
            url: '/siga/vista/paginas/h_gastos.php',
            success: function (result){
                $("#principal").html(result);
            }
        })
    });

    $("#metricoss").on('click', function(){
        $.ajax({
            url: '/siga/vista/paginas/metricos.php',
            success: function (result){
                $("#principal").html(result);
            }
        })
    });

    $("#isccliente").on('click', function(){
        $.ajax({
            url: '/siga/vista/paginas/iscliente.php',
            success: function (result){
                $("#principal").html(result);
            }
        })
    });

    $("#fact").on('click', function(){
        $.ajax({
            url: '/siga/vista/paginas/facturas.php',
            success: function (result){
                $("#principal").html(result);
            }
        })
    });

    $("#afact").on('click', function(){
        $.ajax({
            url: '/siga/vista/paginas/a_facturas.php',
            success: function (result){
                $("#principal").html(result);
            }
        })
    });

    $("#a_gastos").on('click', function(){
        $.ajax({
            url: '/siga/vista/paginas/a_gastos.php',
            success: function (result){
                $("#principal").html(result);
            }
        })
    });

    $("#ingr").on('click', function(){
        $.ajax({
            url: '/siga/vista/paginas/ingresos.php',
            success: function (result){
                $("#principal").html(result);
            }
        })
    });

    $("#resingr").on('click', function(){
        $.ajax({
            url: '/siga/vista/paginas/resumen_ingresos.php',
            success: function (result){
                $("#principal").html(result);
            }
        })
    });

    $("#barraqr").on('click', function(){
        $.ajax({
            url: '/siga/vista/paginas/c_barras_qr.php',
            success: function (result){
                $("#principal").html(result);
            }
        })
    });

    $("#afina").on('click', function(){
        $.ajax({
            url: '/siga/vista/paginas/afinaciones.php',
            success: function (result){
                $("#principal").html(result);
            }
        })
    });
})