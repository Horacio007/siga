$(document).ready(function(){

    $("#btn_subir").on('click', function(){

        if ($("#iexpediente").val()==0) {
            Swal.fire({
                icon: 'error',
                title: 'Oopps...',
                text: 'Rellena el campo de expediente',
            })
    
            return false
        }
    
        if ($("#izip").val()==0) {
            Swal.fire({
                icon: 'error',
                title: 'Oopps...',
                text: 'Selecciona un archivo',
            })
    
            return false
        }

        var data = new FormData(document.getElementById('formdata'));
        var wrapper = $('.wrapper');
        var progress_bar = $('.progress_bar');

        progress_bar.removeClass('bg-success bg-danger').addClass('bg-info');
        progress_bar.css('width', '0%');
        progress_bar.html('Preparando...')
        wrapper.fadeIn();
        
        $.ajax({
            xhr: function(){
                let xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(e){
                    if (e.lengthComputable) {
                        let percentComplete = Math.floor((e.loaded / e.total) * 100);

                        progress_bar.css('width', percentComplete + '%');
                        progress_bar.html(percentComplete + '%')
                    }
                }, false)

                return xhr;
            },
            url: '/siga/controlador/upload_archivos.php',
            type: 'POST',
            data: data,
            processData: false,  // tell jQuery not to process the data
            contentType: false,
            beforeSend: () => {
                $("#btn_subir").attr('disabled', true)
            },
            success: function (result){
                if (result == 'Evidencia almacenada') {
                    progress_bar.removeClass('bg-info').addClass('bg-success');
                    progress_bar.html('¡Listo Evidencia Almacenda!');
                    $("#btn_subir").attr('disabled', false);
                    document.getElementById("formdata").reset();
                    setTimeout(() => {
                        wrapper.fadeOut();
                        progress_bar.removeClass('bg-success bg-danger').addClass('bg-info');
                        progress_bar.css('width', '0%');
                    }, 3000);
                    /*
                    Swal.fire({
                        icon: 'success',
                        title: 'Correcto',
                        text: result,
                    })
                    */
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oopps...',
                        text: result,
                    })
                    document.getElementById("formdata").reset();
                }
                
            }
        });

    })
})