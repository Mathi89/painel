


$('body').on('click', '.btn-criar-categoria', function (e) {
    // $( ".formulario-new-produto" ).submit(function( e ) {
    e.preventDefault();

    
    const form = $(".formulario-new-categoria")[0];
    var formData = new FormData(form)
    $.ajax({
        method: "post",
        url: 'newcategory/newcategory',
        data: formData,
        dataType: 'json',
        contentType: false,
    processData: false,
        success: function (res) {
            if(res == true){
                alertSucesso("Nova categoria criada!")
                $('#newproductform').each (function(){
                    this.reset();
                });
            }else if(res == "slugexiste"){
                alertAtencao("Essa categoria já existe! Tente novamente.");

            }else if(res ==  false){
                alertErro("Por favor, preencha todos os campos obrigatórios.");

            }else{
                alertErro("Houve algum erro! Por favor tente novamente mais tarde.");

            }
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

    // $(".space-img-produto").html("");
// for (let i = 0; i < qtdFotos; i++) {

    const inputTarget = e.target;
    const file = inputTarget.files[0];

    if(file){
        const reader = new FileReader();

        reader.addEventListener('load', function(e) {
            const readerTarget = e.target;

            const img = document.createElement("img");
            img.src = readerTarget.result;

            img.classList.add("image-produto-form");
            img.id="foto-image-produto";
            
            $(".space-img-produto").html(img);
            /* FAZENDO SLIDE DOS PRODUTOS */


        })

        reader.readAsDataURL(file);
        }
        
 
    // }

   
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