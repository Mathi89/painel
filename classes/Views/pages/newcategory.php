<section class="body-produtos">

<div class="buttons-actions-grid">
    <div class="space-btn-pages-produtos">
        <a href="<?= INCLUDE_PATH ?>categorias">Ver categorias</a>
    </div>

    <div class="space-btn-pages-produtos">
        <a href="<?= INCLUDE_PATH ?>produtos">Ver produtos</a>
    </div>

</div>

<h2 class="title-page">Crie uma categoria</h2>

<div class="body-new-product">


<form id="newproductform" class="formulario-new-categoria" method="post">
    <div class="body-form">

    <div class="base-form">
        
        <div class="dados-right-form">
            <div class="space-input">
                <label class="label-inputs" for="name">Nome da categoria <span class="obrigatorio-inputs">*</span></label>
                <input class="input-select-padrao" type="text" name="categoria" placeholder="Eletrônicos" require>
            </div>

        <div class="space-input">
            <label class="label-inputs" for="slug">Url da categoria</label>
            <input class="input-select-padrao" type="text" name="slug" placeholder="slug-da-categoria-na-url">
        </div>

        <div class="space-input">
        <label class="label-inputs" for="slug">Descrição da categoria</label>
            <textarea class="style-description input-select-padrao" type="text" name="description" placeholder="Descrição da categoria..."></textarea>
        </div>
          
        </div>

    </div>


   
        <input data-url="<?= URL_LOJA ?>" class="btn-criar-categoria" type="submit" name="action" value="Criar categoria">
    </div>
    
</form>



</div>
</section>


<!-- CADASTRAR Produtos
CADASTRAR categorias -->