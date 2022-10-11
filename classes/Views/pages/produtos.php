<?php
if(!file_exists('classes/config.php')){

    $host = $_SERVER['HTTP_HOST'];
    header("Location: http://".$host."/");
    die();
    
}

?>
<section class="body-produtos">

<div class="buttons-actions-grid">
    <div class="space-btn-pages-produtos">
        <a href="<?= INCLUDE_PATH ?>newproduct">Novo produto</a>
    </div>

    <div class="space-btn-pages-produtos">
        <a href="<?= INCLUDE_PATH ?>categorias">Ver categorias</a>
    </div>

    <div class="space-btn-pages-produtos">
        <a href="<?= INCLUDE_PATH ?>variacoes">Ver variações</a>
    </div>

    <div class="space-btn-pages-produtos">
        <a href="<?= INCLUDE_PATH ?>codigos">Adicionar Códigos</a>
    </div>

    <div class="space-btn-pages-produtos">
        <a href="<?= INCLUDE_PATH ?>newcombo">Criar Combo</a>
    </div>

</div>

<h2 data-urlloja="<?= URL_LOJA ?>" class="title-page">Produtos</h2>

<div class="body-products-card">


<?php 
foreach ($arr[0] as $key => $produto) { 
    $fotoProduto = \Models\ProdutosModel::getOnePictureOfProduct($produto['id']);
    ?>
    
    
    <div class="card-product cardproduct<?= $produto['id'] ?>">
        <div class="space-img"><img class="img-product" src="<?= INCLUDE_PATH_VIEWS ?>imgsproducts/<?= (isset($fotoProduto['img_produto']))? $fotoProduto['img_produto'] : 'logo.png' ?>"></div>
            <div class="dados-products">
            <h3 class="title-products"><?= $produto['title'] ?></h3>
            
                <div class="btn-options">
                    <div class="space-type-product"><span class="type-product status-product status-blue"><?= ($produto['objeto'] == "combo")? "Combo" : "Produto" ?></span></div>
                    <div class="status-product<?= $produto['id'] ?>"> <span id="status-product" data-name="<?= $produto['title'] ?>" data-idproduct="<?= $produto['id'] ?>" class="status-product <?= getStatus($produto['status'])['class'] ?>"><?= getStatus($produto['status'])['name'] ?></span></div>
                    <a href="<?= INCLUDE_PATH    ?><?= ($produto['objeto'] == "combo")? "newcombo?produto=" : "newproduct?produto=" ?><?= $produto['id'] ?>"><i id="editproduct"  class='btn-option-icon btn-edit bx bxs-pencil'></i></a>
                    <i id="deleteproduct" data-name="<?= $produto['title'] ?>" data-idproduct="<?= $produto['id'] ?>" class='btn-option-icon btn-delete bx bxs-trash'></i>
                
            </div>
        </div>
    </div>

<?php } ?>



</div>

</section>


<!-- CADASTRAR Produtos
CADASTRAR categorias -->