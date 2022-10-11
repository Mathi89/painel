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
        <a href="<?= INCLUDE_PATH ?>newconversation">Criar nova conversa</a>
    </div>

    <!-- <div class="space-btn-pages-produtos">
        <a href="<?= INCLUDE_PATH ?>categorias">Ver categorias</a>
    </div>

    <div class="space-btn-pages-produtos">
        <a href="<?= INCLUDE_PATH ?>variacoes">Ver variações</a>
    </div>

    <div class="space-btn-pages-produtos">
        <a href="<?= INCLUDE_PATH ?>codigos">Adicionar Códigos</a>
    </div> -->

</div>

<h2 data-urlloja="<?= URL_LOJA ?>" class="title-page">Respostas do Bot</h2>

<div class="body-products-card">


<?php 
foreach ($arr[0] as $key => $resposta) { 
    ?>
    
    
    <div class="card-product cardproduct<?= $resposta['id'] ?>">
         <div class="dados-products">
            <h3 class="title-products"><?= $resposta['pergunta'] ?></h3>
                <div class="btn-options">
                    <div class="status-idmsg<?= $resposta['id'] ?>"> <span id="status-msg" data-name="<?= $resposta['pergunta'] ?>" data-idmsg="<?= $resposta['id'] ?>" class="status-product <?= getStatus($resposta['status'])['class'] ?>"><?= getStatus($resposta['status'])['name'] ?></span></div>
                    <a href="<?= INCLUDE_PATH ?>newconversation?msg=<?= $resposta['id'] ?>"><i id="editproduct"  class='btn-option-icon btn-edit bx bxs-pencil'></i></a>
                    <i id="deletemsg" data-name="<?= $resposta['pergunta'] ?>" data-idmsg="<?= $resposta['id'] ?>" class='btn-option-icon btn-delete bx bxs-trash'></i>
                
            </div>
        </div>
    </div>

<?php } ?>



</div>

</section>


<!-- CADASTRAR Produtos
CADASTRAR categorias -->