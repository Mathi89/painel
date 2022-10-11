<?php
if(!file_exists('classes/config.php')){

    $host = $_SERVER['HTTP_HOST'];
    header("Location: http://".$host."/");
    die();
    
}

?>
<section class="section-credentials">
    <div class="body-credentials">

        <div class="base-create">
            <form class="form-settings" method="post">

<div class="base-form-interno">
            <div class="doouble-space">

                <div class="space-inputs-settings">
                    <input class="nome_empresa" type="text" name="nome" value="<?= ($arr[0]['nome_empresa'] != "")? $arr[0]['nome_empresa'] : '' ?>" placeholder="Nome da empresa">
                </div>

                <div class="space-inputs-settings">
                    <input class="tel-input" type="tel" name="whatsapp" value="<?= ($arr[0]['celular'] != "")? $arr[0]['celular'] : '' ?>" placeholder="Número do whatsapp">
                </div> 
            </div>


            <div class="doouble-space">
                <div class="space-inputs-settings">
                    <div   class="space-logo ">
                        <img id="imglogo"  src="<?= ($arr[0]['logo'] == "")? "https://sintra.org.br/assets/images/no-image.svg" : INCLUDE_PATH_VIEWS.'imgsistem/'.$arr[0]['logo'] ?>" class="img-logo imglogo-btn">
                        
                    </div>
                </div> 

                <div class="space-inputs-settings">
                    <input class="email-input" type="email" name="email" value="<?= ($arr[0]['email'] != "")? $arr[0]['email'] : '' ?>" placeholder="Seu email">
                </div> 
            </div>

            </div>

            <input id="logoinput"   class="input-file-logo" type="file" name="logoinput">

                <input id="submitempresa" type="submit" name="action" value="Atualizar Credênciais">
            </form>
        </div>
    </div>
</section>
