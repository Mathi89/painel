
$('body').on('click', '#submitcodigo', function (e) {
    e.preventDefault();


    const form = $(".form-codigos")[0];
    var formData = new FormData(form);
    
    $.ajax({
        method: "post",
        url: 'codigos/addcodigos',
        data: formData,
        dataType: 'json',
        contentType: false,
        processData: false,
        success: function (res) {

            if(res == true){
                alertSucesso("Códigos adicionados com sucesso!")
                $('.form-codigos').each (function(){
                    this.reset();
                });
            }else{
                alertErro("Houve algum erro. Tente novamente mais tarde.")
            }
            
        },
    });

})



function alertErro(msg,temp = 3200,rl = false){

    $('.erroJ').html(msg);
    $('.erroJ').slideDown();

    setTimeout(function () {
        $('.erroJ').slideUp();
        if(rl != false){location.reload();}
    }, temp)
}

function alertSucesso(msg,temp = 3200,rl = false){

    $('.sucessoJ').html(msg);
    $('.sucessoJ').slideDown();

    setTimeout(function () {
        $('.sucessoJ').slideUp();
        if(rl != false){location.reload();}
    }, temp)
}
function alertAtencao(msg,temp = 3200,rl = false){

    $('.atencaoJ').html(msg);
    $('.atencaoJ').slideDown();

    setTimeout(function () {
        $('.atencaoJ').slideUp();
        if(rl != false){location.reload();}
    }, temp)
}

// FIM DAS FUNÕES PARA USAR GERALMENTE