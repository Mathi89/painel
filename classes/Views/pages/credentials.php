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
            <form class="form-credentials" method="post">
                <!-- <select name="plataforma">
                    <option disabled selected>Forma de pagamento</option>
                    <option value="mercadopago">Mercado Pago</option>
                </select> -->
                <input type="text" name="publickey" placeholder="Public Key">
                <input type="text" name="accesstoken" placeholder="Access Token">
                <input id="submitcreden" type="submit" name="action" value="Atualizar Credênciais">
            </form>
        </div>

        <div class="body-card-pagamentos">


        <div class="card-pagamento">
            <div class="content-card">
                <h4 class="title-pagamento"><?= $arr[0]['nome'] ?></h4>
                <p class="credenciais"><b>Public key: </b> <p class="number-credenciais number-credenciais-public" ><?= ($arr[0]['public_key'] == "")?  "Sem public key"  : "************************".substr($arr[0]['public_key'], -4) ?></p> </p>
                <p class="credenciais"><b>Acess token: </b> <p class="number-credenciais number-credenciais-access" ><?= ($arr[0]['access_token'] == "")?  "Sem access token"  : "************************".substr($arr[0]['access_token'], -4) ?></p> </p>
                <div class="status">

                <span class="status-pagamento <?= getStatus($arr[0]['status'])['class'] ?>"><?= getStatus($arr[0]['status'])['name'] ?></span>

                </div>
                
            </div>
        </div>

        </div>
    </div>
</section>
