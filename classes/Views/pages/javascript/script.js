const btnPainelPrincipal = document.querySelector('#btn-painel1')
const btnPainel2 = document.querySelector('#btn-painel2')
const menuPainel = document.querySelector('#menu-painel')
const burger = document.querySelector('.btn-painel__burger')
const iconSinalizadorPainel = document.querySelector('.iconSinalizadorPainel')
const tituloPainel = document.querySelector('.titulo-painel')
const menuUsuarioRight = document.querySelector('.menu-usuario-right')
const btnclientRight = document.querySelector('.client-imagem')
const btnCloseMenuUsuario = document.querySelector('.close-menu-usuario')
const versionApp = $(".version_application")
const textMenu = $(".titulo-categoria h1")
const moduloCenter = $(".titulo-dentro-do-painel")
let painelOpen = false, menuOpen = false

btnPainelPrincipal.addEventListener('click', () => {
    eventoMenuPainel()

})

btnPainel2.addEventListener('click', () => {
    eventoMenuPainel()
    
})




btnclientRight.addEventListener('click', () => {
    
    menuUsuarioRight.classList.add('open')
    menuOpen = true
    painelOpen = false
    closes()
})

btnCloseMenuUsuario.addEventListener('click', () => {
    menuUsuarioRight.classList.remove('open')
    menuOpen = false
})

/* troca de nome no painel */
const painel = document.querySelector('#painel')
const nomePainel = document.querySelector('.nome-painel')
const imobiliaria = document.querySelector('#imobiliaria')
const nomeImobiliaria = document.querySelector('.nome-imobiliaria')
const chaves = document.querySelector('#chaves')
const nomeChaves = document.querySelector('.nome-chaves')



function eventoMenuPainel() {

    if (!painelOpen) {
        opens()
        painelOpen = true
        menuUsuarioRight.classList.remove('open')
        menuOpen = false
        

    } else {
        closes()
        painelOpen = false
        
        

    }
}

function opens() {
     btnPainelPrincipal.classList.add('open')
    btnPainel2.classList.add('open')
    menuPainel.classList.add('open')
    menuPainel.classList.add('menu-open')
    // versionApp.removeClass('none')
    // textMenu.removeClass('none')
    // moduloCenter.removeClass('none')

}

function closes() {
    btnPainelPrincipal.classList.remove('open')
    btnPainel2.classList.remove('open')
    menuPainel.classList.remove('open')
    menuPainel.classList.remove('menu-open')
    // versionApp.addClass('none')
    // textMenu.addClass('none')
    // moduloCenter.addClass('none')

}

$('body').on('click', '#notify', function () {
    var Item = document.getElementById("box_notfy");
    Item.classList.toggle("block");
})

// FECHANDO MODAL DO BOOTSTRAP
$('body').on('click', '#closemodal', function () {
    $("#exampleModal").modal("hide");

// EXEMPLOS DE COMO USAR MODAL BOOTSTRAP NO JQUERY
// $(".modal-title").html();
// $(".modal-body").html();
// $(".modal-footer").html();
// $("#exampleModal").modal("show");
// $("#exampleModal").modal("toggle");
})


tinymce.init({
    selector: '#editortexto'
  });





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


function moneymask(){
    $('.moneyrs').maskMoney({
        prefix:'R$ ',
        allowNegative: true,
        thousands:'.', decimal:',',
        affixesStay: true
    });
}

function maskTelefone()
{
    $('.tel-input').mask('(00) 0000-00009');
$('.tel-input').blur(function(event) {
   if($(this).val().length == 15){ // Celular com 9 dígitos + 2 dígitos DDD e 4 da máscara
      $('.tel-input').mask('(00) 00000-0009');
   } else {
      $('.tel-input').mask('(00) 0000-00009');
   }
});
}