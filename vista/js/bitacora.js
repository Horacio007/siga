$(document).ready(function(){
    //preparo la lista para valuaciones
    $("#btn_valuaciones").on('click', function(){
        //console.log("ola");
        $.ajax({
            url: '/siga/vista/paginas/valuaciones.php',
            success: function (result){
                $("#vista").html(result);
            }
        })
    })
})