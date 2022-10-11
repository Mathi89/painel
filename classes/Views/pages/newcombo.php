<section class="body-produtos">

<div class="buttons-actions-grid">
    <div class="space-btn-pages-produtos">
        <a href="<?= INCLUDE_PATH ?>produtos">Ver produto</a>
    </div>

    <div class="space-btn-pages-produtos">
        <a href="<?= INCLUDE_PATH ?>categorias">Ver categorias</a>
    </div>

</div>

<h2 class="title-page"><?= (isset($arr[1]))? 'Editando "'.$arr[1]['title'].'"' : "Crie seu produto" ?></h2>

<div class="body-new-product">


<form id="newproductform" class="formulario-new-produto" method="post">
    <div class="body-form">

    <div class="space-all-images">
    <div class="space-img-produto">
            <div class="space-img-ja-existente">
             <?php 
             $cont = 0;
       if(isset($arr[1])){
        
        foreach ($arr[3] as $key => $img) { 
            $cont++;
            ?>
            
            <div class="base-img base-img-del<?= $img['id'] ?>">
                <i id="del-ask-img" data-id="<?= $img['id'] ?>" class='del-ask-img bx bxs-x-circle'></i>
                <img id="foto-image-produto" class="image-produto-form" src="<?= INCLUDE_PATH_VIEWS ?>imgsproducts/<?= $img['img_produto'] ?>">
            </div>
      <?php  } ?>
        </div>
        <div data-cont="<?= $cont ?>" class="space-img-news-images">
            <?php
                if($cont < 6){ ?>

                        <img id="foto-image-produto" class="image-produto-form foto-image-produto-none" src="https://sintra.org.br/assets/images/no-image.svg"> 
                
             <?php } ?>
        </div>
      
      
     <?php  }else{ ?>

        <div data-cont="<?= $cont ?>" class="space-img-news-images">
            <?php
                if($cont < 6){ ?>

                        <img id="foto-image-produto" class="image-produto-form foto-image-produto-none" src="https://sintra.org.br/assets/images/no-image.svg"> 
                
             <?php } ?>
        </div>

       <?php }
        
        
        ?>
            </div>
        
    </div>

    <?= (isset($arr[1]))? '<input type="hidden" name="idedit" value="'.$arr[1]['id'].'"> <input type="hidden" name="type" value="'.$arr[1]['type'].'">' : null ?>
    <div class="base-form">
        <!-- <div class="space-img-produto">
        <?= (isset($arr[1]))? null : '<img id="foto-image-produto" class="image-produto-form" src="https://sintra.org.br/assets/images/no-image.svg">' ?>
        </div> -->

        <div class="dados-right-form">
            <div class="space-input">
                <label class="label-inputs" for="name">Nome do produto <span class="obrigatorio-inputs">*</span></label>
                <input class="input-select-padrao" value="<?= (isset($arr[1]))? $arr[1]['title'] : "" ?>" type="text" name="name" placeholder="Moletom 100% Algodão" require>
            </div>
            <div class="space-input">
                <div class="grid-trio-coluna-check">
                <div class="uniao">
                    <label class="label-inputs" for="preco">Preço <span class="obrigatorio-inputs">*</span></label>
                    <input class="input-select-padrao moneyrs" value="<?= (isset($arr[1]))? \Painel::convertMoney($arr[1]['value'],$type = 'R$') : "" ?>" type="tel" name="preco" placeholder="R$ 149,90" require>
                </div>

                <div class="uniao">
                    <label class="label-inputs" for="precopromotion">Preço promocional</label>
                    <input class="input-select-padrao moneyrs" value="<?= (isset($arr[1]))? \Painel::convertMoney($arr[1]['value_promotion'],$type = 'R$') : "" ?>" type="tel" name="precopromotion" placeholder="R$ 129,85">
                </div>

                <div class="uniao">
                    <div class="body-check-input">
                    <label class="label-inputs" for="precopromotion">Promoção</label>
                        <div class="switch-input-check">

                            
                            <input id="switch-1"  name="statuspromotion" type="checkbox" <?= (isset($arr[1]) && $arr[1]['status_promotion'] == "on")? "checked" : null ?> class="switch-input" />
                            <label for="switch-1" class="switch-label">Switch</label>
                        </div>  
                    </div>
                       
                </div>
                </div>

            </div>
        </div>

    </div>


    <div class="middle-layout-form">
        <div class="space-input">
            <div class="grid-dupla-coluna">
                

                <?php 
                if(isset($arr[1])){ ?>
                    <span class="type-produtcts-edition"><?= ucfirst($arr[1]['type']) ?></span>
               <?php  }else{ ?>

                        <select id="type-produto" class="input-select-padrao" name="type" require>
                            <option value="" selected disabled>Tipo</option>
                            <option <?= (isset($arr[1]) && $arr[1]['type'] == "recarga")? "selected" : "" ?> value="recarga">Recarga</option>
                            <option <?= (isset($arr[1]) && $arr[1]['type'] == "fisico")? "selected" : "" ?>  value="fisico">Fisico</option>
                            <option <?= (isset($arr[1]) && $arr[1]['type'] == "digital")? "selected" : "" ?> value="digital">Digital</option>
                        </select>
             <?php  }
                ?>
                
                <div class="uniao">
                    <label class="label-inputs" for="estoque">Quantidade no estoque</label>
                    <input class="input-select-padrao" value="<?= (isset($arr[1]))? $arr[1]['qtdestoque'] : "" ?>" type="tel" name="estoque" placeholder="530">
                </div>
            </div>

        </div>

        <div class="space-input">
            <select class="select-categoria input-select-padrao" name="categorias" require>
                <option value="" selected disabled>Selecione a categoria</option>
                <?php 
                foreach ($arr[0] as $key => $categoria) { ?>
                    <option <?= (isset($arr[1]) && $arr[1]['category'] == $categoria['id'])? "selected" : "" ?> value="<?= $categoria['id'] ?>"><?= $categoria['title'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="base-variacoes">
            <div class="content-variacoes">
                <?php 
                if(isset($arr[1]) && $arr[1]['type'] == "recarga"){

                    foreach ($arr[4] as $key => $varia) { ?>

                        <div id="body-variacao-space1" class="corpo-das-variacoes corpo-das-variacoes-item<?= $varia['id'] ?> color-red-backgorund"><div class="body-variacao-space">
                                <input type="text" name="atunomevariacao[]" value="<?= $varia['nome'] ?>" placeholder="Tv 3 meses">
                                <select name="atutypevariacao[]">
                                    <option disabled selected>Tipo do código</option>
                                    <option <?= ($varia['type'] == "mensal")? "selected" : "" ?> value="mensal">Mensal</option>
                                    <option <?= ($varia['type'] == "anual")? "selected" : "" ?> value="anual">Anual</option>
                                </select>
                                <input type="tel" name="atuqtdvariacao[]" value="<?= $varia['qtd_itens'] ?>" placeholder="Quantidade de itens">
                                <select name="atuplataforma[]">
                                    <option disabled selected>Plataforma</option>

                                    <?php 
                                        if(isset($arr[5])){
                                            foreach ($arr[5] as $key => $info) {
                                                ?>
                                                <option <?= ($varia['plataforma'] == $info['id'])? "selected" : "" ?> value="<?= $info['id'] ?>"><?= $info['nome'] ?></option>
                                    <?php     }
                                        }
                                        ?>
                                    <!-- <option <?= ($varia['plataforma'] == "mfc")? "selected" : "" ?> value="mfc">My family cinema</option>
                                    <option <?= ($varia['plataforma'] == "tvpix")? "selected" : "" ?> value="tvpix">Tv Pix</option>
                                    <option <?= ($varia['plataforma'] == "bluetv")? "selected" : "" ?> value="bluetv">Blue tv</option>
                                    <option <?= ($varia['plataforma'] == "redplay")? "selected" : "" ?> value="redplay">Red play</option>
                                    <option <?= ($varia['plataforma'] == "tvexpress")? "selected" : "" ?> value="tvexpress">Tv express</option> -->
                                </select>

                                <input type="hidden" class="moneyrs" value="<?= $varia['id'] ?>" name="atuidvariacao[]" placeholder="ID da variação">           
                                
                                
                                </div><div class="space-delete"><i data-id="<?= $varia['id'] ?>" id="atu-delete-varia" class="atu-delete-inputs bx bx-trash"></i></div></div>    

                        
                <?php    }

           

                }
                
                ?>

            </div>

            <?php 
            if(isset($arr[1]) && $arr[1]['type'] == "recarga"){
                echo '<span id="btn-add-variacao" class="btn-add-variacao">+</span>';
            }
            
            ?>
            
        </div>
        
        <div class="space-input">
        <label class="label-inputs" for="slug">Url do produto</label>
            <input class="input-select-padrao" value="<?= (isset($arr[1]))? $arr[1]['slug'] : "" ?>" type="text" name="slug" placeholder="slug-do-produto-na-url">
        </div>

        <div class="space-input">
        <label class="label-inputs" for="slug">Descrição do produto</label>
            <textarea id="editortexto" class="style-description input-select-padrao" type="text" name="description" placeholder="Descrição do produto..."><?= (isset($arr[1]))? $arr[1]['description'] : "" ?></textarea>
        </div>

<input id="fotoinput" class="input-file-foto" type="file" name="foto[]"  multiple >

    </div>


    <?= (isset($arr[1]))? null : '<input type="hidden" name="objeto" value="produto">' ?>

    <?= (isset($arr[1]))? '<input data-url="'.URL_LOJA.'" class="btn_padrao btn-editar-combo" type="submit" name="action" value="Atualizar combo">' : '<input data-url="'.URL_LOJA.'" class="btn-criar-produto" type="submit" name="action" value="Criar combo">' ?>
        
    </div>
    
</form>



</div>
<div class="resultados"></div>
</section>


<!-- CADASTRAR Produtos
CADASTRAR categorias -->