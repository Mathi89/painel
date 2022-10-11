$('body').on('click', '#status-product', function () {

    const idproduto = $(this).data("idproduct");
    const nomeproduto = $(this).data("name");

    // CONTEUDO DE TITULO
    $(".modal-title").html("Produtos");

    // CONTEUDO DO CORPO
    const corpo = "<p> Você deseja mesmo alterar o status do produto <b>"+nomeproduto+"</b>? </p>";
    $(".modal-body").html(corpo);

    // CONTEUDO DO FOOTER
    const btnfooter = '<button id="editstatus" data-idproduct="'+idproduto+'" type="button" class="btn btn-primary">Sim</button> <button type="button" id="closemodal" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>';
    $(".modal-footer").html(btnfooter);



$("#exampleModal").modal("show");
$("#exampleModal").modal("toggle");


})



$('body').on('click', '#deleteconfirm', function () {

    const idproduct = $(this).data("idproduct");
    const urlloja = $(".title-page").data("urlloja");

    $.ajax({
        method: "post",
        url: 'produtos/deleteproduto',
        data: {idproduct:idproduct},
        dataType: 'json',
        success: function (res) {
            if(res == true){

                $.ajax({
                    method: "post",
                    url: 'produtos/deleteimgproduct',
                    data: {idproduct:idproduct},
                    dataType: 'json',
                    success: function (res) {
                        if(res == true){
                            alertSucesso("Produto excluído com sucesso!");
                            $(".cardproduct"+idproduct).remove();
                        }else{
                            alertErro("Houve algum erro. Atualize a página e tente novamente.");
                        }
                    
                    },
                });
                // alertSucesso("Produto excluído com sucesso!");
                // $(".card-product"+idproduct).remove();
            }else{
                alertErro("Houve algum erro. Atualize a página e tente novamente.");
            }
        
        },
    });
    $("#exampleModal").modal("hide");

})



$('body').on('click', '#deleteproduct', function () {
    const idproduto = $(this).data("idproduct");
    const nomeproduto = $(this).data("name");

    // CONTEUDO DE TITULO
    $(".modal-title").html("Produto");

    // CONTEUDO DO CORPO
    const corpo = "<p> Você quer mesmo excluir o produto <b>"+nomeproduto+"</b>? </p>";
    $(".modal-body").html(corpo);

    // CONTEUDO DO FOOTER
    const btnfooter = '<button id="deleteconfirm" data-idproduct="'+idproduto+'" type="button" class="btn btn-primary">Sim</button> <button type="button" id="closemodal" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>';
    $(".modal-footer").html(btnfooter);



$("#exampleModal").modal("show");
$("#exampleModal").modal("toggle");

})


$('body').on('click', '#editstatus', function () {

    const idproduct = $(this).data("idproduct");
    const classe = ".status-product"+idproduct;

    $.ajax({
        method: "post",
        url: 'produtos/editstatus',
        data: {idproduct:idproduct},
        dataType: 'json',
        success: function (res) {
            if(res[0] == true){
                alertSucesso("Status do produto alterado com sucesso!");
                $(classe).html(res[1]);
            }else{
                alertErro("Houve algum erro. Atualize a página e tente novamente.");
            }
        
        },
    });




    $("#exampleModal").modal("hide");



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