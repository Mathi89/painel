<?php
if(!file_exists('classes/config.php')){

    $host = $_SERVER['HTTP_HOST'];
    header("Location: http://".$host."/");
    die();
    
}

?>
<section class="section-codigos">
    <div class="body-codigos">

 

    <!-- <div class="mini-dash">
        <div class="cards-space">

            <div class="card-dash">
                <span class="title-card">Códigos usados</span>
                <span class="number-card"><?= $arr[1]['qtd'] ?></span>
            </div>

            <div class="card-dash">
                <span class="title-card">Códigos disponíveis</span>
                <span class="number-card"><?= $arr[0]['qtd'] ?></span>
            </div>

        </div>
    </div> -->

        <div class="base-create">


        <div class="buttons-actions-grid">
            <div class="space-btn-pages-produtos">
                <a href="<?= INCLUDE_PATH ?>respostas">Ver conversas</a>
            </div>

        </div>

            <form class="form-respostas" method="post">
                <!-- <select name="plataforma">
                    <option disabled selected>Forma de pagamento</option>
                    <option value="mercadopago">Mercado Pago</option>
                </select> -->
                <div class="space-for-selects-options">

    
                   <input type="text" name="pergunta" value="<?= (isset($arr['infomsg']))? $arr['infomsg']['pergunta'] : "" ?>" placeholder="Digite uma pergunta">
                   <?= (isset($arr['infomsg']))? '<input type="hidden" name="idmsg" value="'.$arr['infomsg']['id'].'">' : null ?>


                </div>
                <textarea class="texto-codigos" name="resposta" require><?= (isset($arr['infomsg']))? $arr['infomsg']['resposta'] : "" ?></textarea>

                <?= (isset($arr['infomsg']))? '<input id="submiteditresp" data-idmsg="'.$arr["infomsg"]["id"].'" type="submit" name="action" value="Atualizar conversa">' : '<input id="submitresp" type="submit" name="action" value="Criar conversa">' ?>
                
            </form>
        </div>

       
    </div>
</section>
