moneymask();
// $.post( URL_PAINEL+"newproduct/selects", function( data ) {
//     var child = $( data );
//     alert(child)
//   });
//   $.ajax({
//     type: "POST",
//     url: URL_PAINEL+"newproduct/selects",
//     dataType: html
//   });

  

var cont = 1;
$('body').on('change', '#type-produto', function (e) {

    $.ajax({
        method: "post",
        url: "newproduct/selects",
        dataType: 'json',
        success: function (res) {
                //  select = res;
     

                    const typeselect = $("#type-produto").val();
                    const inputs = '<div id="body-variacao-space'+cont+'" class="corpo-das-variacoes"><div  class="body-variacao-space">'+res[0]+'</div><div class="space-delete"><i id="'+cont+'" class="delete-inputs bx bx-trash" ></i></div></div>';

                    if(typeselect == "recarga"){
                        $(".base-variacoes").append('<span id="btn-add-variacao" class="btn-add-variacao" >+</span>');
                        $(".content-variacoes").append(inputs)

                        $(".space-tri-remove").html("");
                    }else{
                        $(".space-tri-remove").html(res[1]);
                        $("#btn-add-variacao").remove();
                        $(".corpo-das-variacoes").remove();
                    }
                    moneymask();
    }
    });
})


$('body').on('click', '.delete-inputs', function (e) {
var button_id = $(this).attr("id");
$("#body-variacao-space"+button_id).remove();
})

$('body').on('click', '#btn-add-variacao', function (e) {
    cont++
    $.ajax({
        method: "post",
        url: URL_PAINEL+"newproduct/selects",
        dataType: 'html',
        success: function (res) {
            const inputs = '<div id="body-variacao-space'+cont+'" class="corpo-das-variacoes"><div  class="body-variacao-space">'+res+'</div><div class="space-delete"><i id="'+cont+'" class="delete-inputs bx bx-trash" ></i></div></div>';

            $(".content-variacoes").append(inputs)
            moneymask();
    }
    });
})


$('body').on('click', '.btn-criar-produto', function (e) {
    // $( ".formulario-new-produto" ).submit(function( e ) {
    e.preventDefault();

    const urlloja = $(this).data("url");

    tinymce.triggerSave()
    
    const form = $(".formulario-new-produto")[0];
    var formData = new FormData(form)
    $.ajax({
        method: "post",
        url: 'newproduct/newproduct',
        data: formData,
        dataType: 'json',
        contentType: false,
    processData: false,
        success: function (res) {

            if(res == true){
                alertSucesso("Novo produto criado!")
                $(".corpo-das-variacoes").remove();
                $("#btn-add-variacao").remove();
                $(".space-img-produto").html('<img id="foto-image-produto" class="image-produto-form" src="https://sintra.org.br/assets/images/no-image.svg">')
                $('#newproductform').each (function(){
                    this.reset();
                });
            }else if(res == "preench"){
                alertErro("Por favor preencha todos os campos de variações e tente novamente");

            }
            else{
                alertErro("Por favor, preencha todos os campos obrigatórios.")
            }
        },
    });


})



// REMOVENDO VARIAÇÃO POR SESSION A SER EXCLUIDA DO PRODUTO
$('body').on('click', '#atu-delete-varia', function (e) {
    // $( ".formulario-new-produto" ).submit(function( e ) {
    e.preventDefault();
    // tinymce.triggerSave()
    const idvaria = $(this).data("id");


    $.ajax({
        method: "post",
        url: 'newproduct/sessiondeletevaria',
        data: {idvaria:idvaria},
        dataType: 'json',

        success: function (res) {

            if(res == true){
                const classedel = ".corpo-das-variacoes-item"+idvaria;
                $(classedel).remove();
            }

        },
    });


})



$('body').on('click', '.btn-editar-produto', function (e) {
    // $( ".formulario-new-produto" ).submit(function( e ) {
    e.preventDefault();

    const urlloja = $(this).data("url");

    tinymce.triggerSave()
    
    const form = $(".formulario-new-produto")[0];
    var formData = new FormData(form)
    $.ajax({
        method: "post",
        url: 'newproduct/editproduct',
        data: formData,
        dataType: 'json',
        contentType: false,
    processData: false,
        success: function (res) {

            if(res == true){
                alertSucesso("Produto editado!")
                // $(".corpo-das-variacoes").remove();
                // $("#btn-add-variacao").remove();
                
                setTimeout(function() { 
                    location.reload();
                }, 1500);
                // $('#newproductform').each (function(){
                //     this.reset();
                // });
            }else if(res == "preench"){
                alertErro("Por favor preencha todos os campos de variações e tente novamente");

            }else if(res == "createavariacao"){
                alertErro("Por favor, crie uma variavel para este produto.")
            }
            else{
                alertErro("Por favor, preencha todos os campos obrigatórios.")
            }
        },
    });


})



$('body').on('click', '#del-ask-img', function (e) {
const idimg = $(this).data("id");


 // CONTEUDO DE TITULO
 $(".modal-title").html("Produto");

 // CONTEUDO DO CORPO
 const corpo = "<p> Você quer mesmo excluir essa foto do produto ? </p>";
 $(".modal-body").html(corpo);

 // CONTEUDO DO FOOTER
 const btnfooter = '<button id="deleteimgconfirm" data-id="'+idimg+'" type="button" class="btn btn-primary">Sim</button> <button type="button" id="closemodal" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>';
 $(".modal-footer").html(btnfooter);

 $("#exampleModal").modal("show");
$("#exampleModal").modal("toggle");
})



$('body').on('click', '#deleteimgconfirm', function (e) {
    const idimg = $(this).data("id");

    $.ajax({
        method: "post",
        url: 'newproduct/sessiondeleteimg',
        data: {idimg:idimg},
        dataType: 'json',
        success: function (res) {
            if(res == true){
                const classeimg = ".base-img-del"+idimg;
                $(classeimg).remove();
            }else{
                alertErro("Houve algum erro. Recarregue a página e tente novamente.");
            }
            $("#exampleModal").modal("hide");
        },
    });
})


$('body').on('click', '#foto-image-produto', function (e) {
      self.executar();
    });

  
  function executar(){
     $('#fotoinput').trigger('click');
  }

  $('body').on('change', '#fotoinput', function (e) {
   readURL(e)
   

  })


  function readURL(e) {

   
    const qtdFotos = document.getElementById('fotoinput').files.length;
   
    // var files = evt.lenght;
const contagem = $(".space-img-news-images").data("cont");
    $(".space-img-news-images").html("");
    
    const maximg = 6 - contagem;
    let i = 0;

    for (i; i < qtdFotos; i++) {

        if(i == maximg){
            break;
        }
        const inputTarget = e.target;
        const file = inputTarget.files[i];

        if(file){
        const reader = new FileReader();

        reader.addEventListener('load', function(e) {
            const readerTarget = e.target;

            const img = document.createElement("img");
            img.src = readerTarget.result;

            img.classList.add("image-produto-form");
            img.id="foto-image-produto";
            
            $(".space-img-news-images").append(img);
            
            /* FAZENDO SLIDE DOS PRODUTOS */


        })

        reader.readAsDataURL(file);
        
       
        }
        
    }

//   alert(i)
    if(i < maximg){
        $(".space-img-news-images").append('<img id="foto-image-produto" class="image-produto-form foto-image-produto-none" src="https://sintra.org.br/assets/images/no-image.svg">');
    }
    

   
  }
 
 

  
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