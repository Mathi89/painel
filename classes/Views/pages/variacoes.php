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
        <a href="<?= INCLUDE_PATH ?>newcategory">Nova categoria</a>
    </div>

    <div class="space-btn-pages-produtos">
        <a href="<?= INCLUDE_PATH ?>produtos">Ver produtos</a>
    </div>

</div>

<h2 class="title-page">Variações de produtos</h2>

<div class="body-products-card">


<?php 
foreach ($arr[0] as $key => $category) { ?>

    <div class="card-product card-product<?= $category['id'] ?>">
    <h3 class="title-products"><?= $category['title'] ?></h3>
        <div class="dados-products">
            
            <div class="btn-options">
                <div class="status-categoria<?= $category['id'] ?>">  <span id="status-categoria" data-name="<?= $category['title'] ?>" data-idcategory="<?= $category['id'] ?>" class="status-product <?= getStatus($category['status'])['class'] ?>"><?= getStatus($category['status'])['name'] ?></span></div>
                <!-- <i id="edit-category" data-idcategory="<?= $category['id'] ?>" data-name="<?= $category['title'] ?>" class='btn-option-icon btn-edit bx bxs-pencil'></i> -->
                <i id="delete-category" data-idcategory="<?= $category['id'] ?>" data-name="<?= $category['title'] ?>" class='btn-option-icon btn-delete bx bxs-trash'></i>
                
            </div>
        
    </div>
    </div>
<?php } ?>






</div>

</section>


<!-- CADASTRAR Produtos
CADASTRAR categorias -->