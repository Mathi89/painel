$('body').on('click', '#deletemsg', function () {
    const idmsg = $(this).data("idmsg");
    const nomemsg = $(this).data("name");

    // CONTEUDO DE TITULO
    $(".modal-title").html("Robô");

    // CONTEUDO DO CORPO
    const corpo = '<p> Você quer mesmo excluir a mensagem <b>"'+nomemsg+'"</b>? </p>';
    $(".modal-body").html(corpo);

    // CONTEUDO DO FOOTER
    const btnfooter = '<button id="deletemsgconfirm" data-idmsg="'+idmsg+'" type="button" class="btn btn-primary">Sim</button> <button type="button" id="closemodal" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>';
    $(".modal-footer").html(btnfooter);



$("#exampleModal").modal("show");
$("#exampleModal").modal("toggle");

})


$('body').on('click', '#deletemsgconfirm', function () {

    const idmsg = $(this).data("idmsg");

    $.ajax({
        method: "post",
        url: 'respostas/deletemsg',
        data: {idmsg:idmsg},
        dataType: 'json',
        success: function (res) {
            if(res == true){

                alertSucesso("Mensagem excluída com sucesso!");
                $(".cardproduct"+idmsg).remove();

            }else{
                alertErro("Houve algum erro. Atualize a página e tente novamente.");
            }
        
        },
    });
    $("#exampleModal").modal("hide");

})


$('body').on('click', '#status-msg', function () {

    const idmsg = $(this).data("idmsg");
    const nomemsg = $(this).data("name");

    // CONTEUDO DE TITULO
    $(".modal-title").html("Robô");

    // CONTEUDO DO CORPO
    const corpo = '<p> Você deseja mesmo alterar o status da mensagem <b>"'+nomemsg+'"</b>? </p>';
    $(".modal-body").html(corpo);

    // CONTEUDO DO FOOTER
    const btnfooter = '<button id="editstatusmsg" data-idmsg="'+idmsg+'" type="button" class="btn btn-primary">Sim</button> <button type="button" id="closemodal" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>';
    $(".modal-footer").html(btnfooter);



$("#exampleModal").modal("show");
$("#exampleModal").modal("toggle");


})


$('body').on('click', '#editstatusmsg', function () {

    const idmsg = $(this).data("idmsg");
    const classe = ".status-idmsg"+idmsg;

    $.ajax({
        method: "post",
        url: 'respostas/editstatusmsg',
        data: {idmsg:idmsg},
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