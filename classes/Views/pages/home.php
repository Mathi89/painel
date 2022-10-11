<?php
if(!file_exists('classes/config.php')){

    $host = $_SERVER['HTTP_HOST'];
    header("Location: http://".$host."/");
    die();
    
}

?>


<section class="section-home-body">
    <div class="body-home-dash">

        <div class="body-kpi-values"><!-- body-kpi-values -->
            <div class="space-body-kpi-values-grid">

                <div class="card-values-kpi">
                    <span class="title-card-value-kpi">Vendas hoje</span>
                    <span class="number-card-value-kpi"><?= $arr[0][1] ?></span>
                </div>

                <div class="card-values-kpi">
                    <span class="title-card-value-kpi">QTD Vendas hoje</span>
                    <span class="number-card-value-kpi"><?= $arr[0][0] ?></span>
                </div>

                <div class="card-values-kpi">
                    <span class="title-card-value-kpi">Vendas mês</span>
                    <span class="number-card-value-kpi"><?= $arr[1][1] ?></span>
                </div>

                <div class="card-values-kpi">
                    <span class="title-card-value-kpi">QTD Vendas mês</span>
                    <span class="number-card-value-kpi"><?= $arr[1][0] ?></span>
                </div>

            </div>
        </div>  <!-- body-kpi-values -->


         <!-- NOVA FOLHA DE DADO -->
        <div class="body-dados-gerais">
            <div class="body-dados-gerais-content-grid">
                <div class="card-dados-gerais grafico-vendas folha-dados-dash">
                <h4 class="title-space">Estoque de recargas</h4>
                    <div class="space-dados-grafico">
                        <canvas id="vendaslastdays"></canvas>
                    </div>
                </div>


                 <!-- NOVA FOLHA DE DADO -->
                <div class="card-dados-gerais estoque-vendas-recarga folha-dados-dash">
                    <h4 class="title-space">Estoque de recargas</h4>
                    <div class="body-estoque-recarga">

                    <?php 
                    
                    if(isset($arr[2])){ 

                        foreach ($arr[2] as $key => $info) {
                        
                        $qtd = \Models\HomeModel::getQtdEstoque($info['id'], "on");
                        
                    ?>

                        <div class="recarga-qtd-card">
                            <span class="title-estoque-qtd"><?= $info['nome'] ?></span>
                            <span class="qtd-estoque-qtd"><?= $qtd ?> Uni</span>
                            <span class="status-estoque-qtd <?= getStatus($info['status'])['class'] ?>"><?= getStatus($info['status'])['name'] ?></span>
                        </div>

                   <?php }
                    }
                    ?>
                       
                    </div>
                    <div class="space-btn-folha">
                        <a href="<?= INCLUDE_PATH ?>codigos" class="btn-link-add-codigos">Adicionar estoque</a>
                    </div>
                </div>


                <!-- NOVA FOLHA DE DADO -->
                <div class="card-dados-gerais grafico-pagto folha-dados-dash">
                    <h4 class="title-space">Pagamentos mais usados</h4>
                    <div class="space-dados-pagto">
                            <canvas id="tipopagtos"></canvas>
                    </div>
                </div>


                <!-- NOVA FOLHA DE DADO -->
            <div class="base2-dados-space folha-dados-dash">
            <h4 class="title-space">Ultimas vendas</h4>
            <div class="body-list-ultimas-vendas">
                <div class="content-list-ultimas-vendas">

                <?php 
                foreach ($arr[3] as $key => $dado) {

                    ?>

                    <div class="card-ultimas-vendas">
                        <span class="title-card-ultimas-vendas"><?= $dado['phone'] ?></span>
                        <span class="valor-card-ultimas-vendas"><?= \Painel::convertMoney($dado['total_compra']) ?></span>
                        <span class="item-card-ultimas-vendas"><?= $dado['data_hora'] ?></span>
                    </div>
                    
              <?php  }
                
                ?>
                    

                </div>
            </div>

            </div>

            


    </div>
</section>