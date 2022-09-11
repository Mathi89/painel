<section class="body-produtos">

<div class="buttons-actions-grid">
    <div class="space-btn-pages-produtos">
        <a href="<?= INCLUDE_PATH ?>produtos">Ver produto</a>
    </div>

    <div class="space-btn-pages-produtos">
        <a href="<?= INCLUDE_PATH ?>categorias">Ver categorias</a>
    </div>

</div>

<h2 class="title-page">Crie seu produto</h2>

<div class="body-new-product">


<form id="newproductform" class="formulario-new-produto" method="post">
    <div class="body-form">

    <div class="base-form">
        <div class="space-img-produto">
            <img id="foto-image-produto" class="image-produto-form" src="https://sintra.org.br/assets/images/no-image.svg">
        </div>

        <div class="dados-right-form">
            <div class="space-input">
                <label class="label-inputs" for="name">Nome do produto <span class="obrigatorio-inputs">*</span></label>
                <input class="input-select-padrao" type="text" name="name" placeholder="Moletom 100% Algodão" require>
            </div>
            <div class="space-input">
                <div class="grid-dupla-coluna">
                <div class="uniao">
                    <label class="label-inputs" for="preco">Preço <span class="obrigatorio-inputs">*</span></label>
                    <input class="input-select-padrao" type="tel" name="preco" placeholder="R$ 149,90" require>
                </div>

                <div class="uniao">
                    <label class="label-inputs" for="precopromotion">Preço promocional</label>
                    <input class="input-select-padrao" type="tel" name="precopromotion" placeholder="R$ 129,85">
                </div>
                </div>

            </div>
        </div>

    </div>


    <div class="middle-layout-form">
        <div class="space-input">
            <div class="grid-dupla-coluna">
                <select class="input-select-padrao" name="type" require>
                    <option value="" selected disabled>Tipo</option>
                    <option value="fisico">Fisico</option>
                    <option value="digital">Digital</option>
                </select>
                
                <div class="uniao">
                    <label class="label-inputs" for="estoque">Quantidade no estoque</label>
                    <input class="input-select-padrao" type="tel" name="estoque" placeholder="530">
                </div>
            </div>

        </div>

        <div class="space-input">
            <select class="select-categoria input-select-padrao" name="categorias" require>
                <option value="" selected disabled>Selecione a categoria</option>
                <option value="fisico">blusas</option>
                <option value="digital">calças</option>
            </select>
        </div>
        
        <div class="space-input">
        <label class="label-inputs" for="slug">Url do produto</label>
            <input class="input-select-padrao" type="text" name="slug" placeholder="slug-do-produto-na-url">
        </div>

        <div class="space-input">
        <label class="label-inputs" for="slug">Descrição do produto</label>
            <textarea id="editortexto" class="style-description input-select-padrao" type="text" name="description" placeholder="Descrição do produto..."></textarea>
        </div>

<input id="fotoinput" class="input-file-foto" type="file" name="foto[]" multiple >

    </div>



        <input data-url="<?= URL_LOJA ?>" class="btn-criar-produto" type="submit" name="action" value="Criar produto">
    </div>
    
</form>



</div>
<div class="resultados"></div>
</section>


<!-- CADASTRAR Produtos
CADASTRAR categorias -->