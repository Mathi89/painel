maskTelefone()


$('body').on('click', '#submitempresa', function (e) {
    e.preventDefault();

    const form = $(".form-settings")[0];
    var formData = new FormData(form)
    $.ajax({
        method: "post",
        url: 'settingsbasic/edit',
        data: formData,
        dataType: 'json',
        contentType: false,
    processData: false,
        success: function (res) {
            if(res == true){
                location.reload();

            }else{
                alertErro("Houve um erro. Atualize a página e tente novamente.")
            }

        }
    })
  });

$('body').on('click', '.imglogo-btn', function () {
    $('#logoinput').trigger('click');

  });


function executar(){
   $('#logoinput').trigger('click');
}



$('body').on('change', '#logoinput', function (e) {
    readURL(e)
 
   })
 
 
   function readURL(e) {
 
     
     const qtdFotos = document.getElementById('logoinput').files.length;
    
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
 
             img.classList.add("img-logo");
             img.classList.add("imglogo-btn");
             img.id="imglogo";
             
             $(".space-logo").html(img);
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