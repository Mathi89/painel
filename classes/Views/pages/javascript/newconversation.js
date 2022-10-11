
$('body').on('click', '#submitresp', function (e) {
    e.preventDefault();


    const form = $(".form-respostas")[0];
    var formData = new FormData(form);
    
    $.ajax({
        method: "post",
        url: 'newconversation/addresposta',
        data: formData,
        dataType: 'json',
        contentType: false,
        processData: false,
        success: function (res) {

            if(res == true){
                alertSucesso("Conversa criada com sucesso!")
                $('.form-respostas').each (function(){
                    this.reset();
                });
            }else{
                alertErro("Houve algum erro. Tente novamente mais tarde.")
            }
            
        },
    });

})



$('body').on('click', '#submiteditresp', function (e) {
    e.preventDefault();


    const form = $(".form-respostas")[0];
    var formData = new FormData(form);
    
    $.ajax({
        method: "post",
        url: 'newconversation/editresposta',
        data: formData,
        dataType: 'json',
        contentType: false,
        processData: false,
        success: function (res) {

            if(res == true){
                alertSucesso("Conversa atualizada com sucesso!")

            }else{
                alertErro("Houve algum erro. Atualize a página e tente novamente.")
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