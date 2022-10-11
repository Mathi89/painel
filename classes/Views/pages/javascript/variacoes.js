$('body').on('click', '#status-categoria', function () {

    const idcategoria = $(this).data("idcategory");
    const nomeCategoria = $(this).data("name");

    // CONTEUDO DE TITULO
    $(".modal-title").html("Categoria");

    // CONTEUDO DO CORPO
    const corpo = "<p> Você deseja mesmo alterar o status da categoria <b>"+nomeCategoria+"</b>? </p>";
    $(".modal-body").html(corpo);

    // CONTEUDO DO FOOTER
    const btnfooter = '<button id="editstatus" data-idcategory="'+idcategoria+'" type="button" class="btn btn-primary">Sim</button> <button type="button" id="closemodal" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>';
    $(".modal-footer").html(btnfooter);



$("#exampleModal").modal("show");
$("#exampleModal").modal("toggle");


})

$('body').on('click', '#deleteconfirm', function () {

    const idcategoria = $(this).data("idcategory");

    $.ajax({
        method: "post",
        url: 'categorias/deletecategoria',
        data: {idcategoria:idcategoria},
        dataType: 'json',
        success: function (res) {
            if(res == true){
                alertSucesso("Categoria excluída com sucesso!");
                $(".card-product"+idcategoria).remove();
            }else{
                alertErro("Houve algum erro. Atualize a página e tente novamente.");
            }
        
        },
    });
    $("#exampleModal").modal("hide");

})

$('body').on('click', '#delete-category', function () {
    const idcategoria = $(this).data("idcategory");
    const nomeCategoria = $(this).data("name");

    // CONTEUDO DE TITULO
    $(".modal-title").html("Categoria");

    // CONTEUDO DO CORPO
    const corpo = "<p> Você quer mesmo deletar a categoria <b>"+nomeCategoria+"</b>? </p>";
    $(".modal-body").html(corpo);

    // CONTEUDO DO FOOTER
    const btnfooter = '<button id="deleteconfirm" data-idcategory="'+idcategoria+'" type="button" class="btn btn-primary">Sim</button> <button type="button" id="closemodal" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>';
    $(".modal-footer").html(btnfooter);



$("#exampleModal").modal("show");
$("#exampleModal").modal("toggle");

})


$('body').on('click', '#editstatus', function () {

    const idcategoria = $(this).data("idcategory");
    const classe = ".status-categoria"+idcategoria;

    $.ajax({
        method: "post",
        url: 'categorias/editstatus',
        data: {idcategoria:idcategoria},
        dataType: 'json',
        success: function (res) {
            if(res[0] == true){
                alertSucesso("Categoria alterada com sucesso!");
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