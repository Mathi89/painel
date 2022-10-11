<?php
if(!file_exists('classes/config.php')){

    $host = $_SERVER['HTTP_HOST'];
    header("Location: http://".$host."/");
    die();
    
}

?>
<section class="section-codigos">
    <div class="body-codigos">

    <div class="mini-dash">
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
    </div>

        <div class="base-create">
            <form class="form-codigos" method="post">
                <!-- <select name="plataforma">
                    <option disabled selected>Forma de pagamento</option>
                    <option value="mercadopago">Mercado Pago</option>
                </select> -->
                <div class="space-for-selects-options">

                
                    <select name="plataforma" require>
                        <option disabled selected>Qual plataforma</option>

                        <?php 
                        if(isset($arr[2])){
                            foreach ($arr[2] as $key => $info) {
                                ?>
                                <option value="<?= $info['id'] ?>"><?= $info['nome'] ?></option>
                       <?php     }
                        }
                        ?>
                    </select>


                    <select name="type" require>
                        <option disabled selected>Tipo de código</option>
                        <option value="anual">Anual</option>
                        <option value="mensal">Mensal</option>
                    </select>



                </div>
                <textarea class="texto-codigos" name="codigos" require></textarea>
                <input id="submitcodigo" type="submit" name="action" value="Atualizar Credênciais">
            </form>
        </div>

       
    </div>
</section>
