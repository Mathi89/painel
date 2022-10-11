<?php


if(isset($_GET['loggout'])){
  Painel::loggout();
}



?>

<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="<?= INCLUDE_PATH?>classes/Views/imgsistem/icon.png" type="image/gif">

        <!--========== BOX ICONS ==========-->
       
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="<?= INCLUDE_PATH_FULL?>javascript/jquery.mask.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        

        <!--========== CSS ==========-->
        <link rel="stylesheet" href="<?= INCLUDE_CSS_T01?>stylePainel.css">

        <title>Painel - Digital Audience</title>
    </head>
    <body>

   <div class="boas_vindas">
       
   </div>
   <div class="load">
       <div class="group_load">
            <img class="load_image" src="<?= INCLUDE_PATH ?>classes/Views/imgsistem/load.gif">
       </div>
   </div>
    <p class="notfy sucessoJ">Sucesso em sua ação.</p>
    <p class="notfy erroJ">Erro ao executar esta ação</p>
    <p class="notfy atencaoJ"></p>

    <div class="modal_tela_padrao">
    <!-- <div class="modal_box_padrao">
        <p id="close_modal_padrao" class="style_close_modal_padrao"><i class='bx bx-x' ></i></p>
        <div class="modal_contend_padrao">
            <div class="group_modal_padrao">
                <h2 class="title_modal_padrao">TITULO AQUI</h2>
            <hr>
            </div>
            <div class="group_modal_padrao">
                <p class="des_modal_padrao">Descrição da modal se tiver</p>
                <hr>
            </div>
            <div class="group_modal_padrao">
            
                <button class="btn_modal_padrao btn_yellow">Sim</button>
            </div>

        </div>
    </div> -->

</div>


        <!--========== SECTION ==========-->
        <section id="" class="section-painel">
            <!--========== HEADER ==========-->
            <header class="header header-width-normal">
            <!-- <img  class="headerbanner" src="<?= INCLUDE_PATH?>classes/Views/imgsistem/background.png" alt=""> -->
                <nav id="" class="nav">

                    <div class="painel-left">
                        <div class="content-titulo-painel">
                        <a href="<?= INCLUDE_PATH?>" ><img src="<?= INCLUDE_PATH?>classes/Views/imgsistem/logo.png" alt=""></a>
                             <!-- <a href="<?= INCLUDE_PATH?>">Digital Audience</a> -->
                            <!-- <i class='iconSinalizadorPainel bx bx-home-smile'></i>
                            <h1 class="titulo-painel">
                                Painel
                            </h1> -->
                        </div>
                        <div id="btn-painel1" class="btn-painel">
                            <div class="btn-painel__burger"></div>
                        </div>
                    </div>
                    <div class="client_right_div">
                        <div class="client_notify">
                            <span class="notify_active"></span>
                            <i id="notify" class='bx bxs-bell'></i>
                            <div id="box_notfy" class="box_notify">
                                <div class="quadrado_box_notify"></div>
                                <div class="box_content_notify">

                                    <div class="title_notify">Nenhuma notificações</div>
                                    <div class="content_notify_text">

                                       

                                    </div>
                                    <div class="see_more_notify">Ver tudo</div>

                                </div>
                            </div>
                        </div>
                    <div class="client-right">
                        
                        <div id="btn-painel2" class="btn-painel btn-client-right">
                            <div class="btn-painel__burger mobile"></div>
                        </div>
                        <h1 class="client-nome">
                            <?= $dado['nome'] ?>
                        </h1>
                        <div class="client-imagem">
                        <?php
                            if($dado['imagem'] == ''){?>
                        <img src="<?= INCLUDE_PATH?>classes/Views/imguser/user_none.png" alt="Perfil">
                            <?php }else{
                          ?>
                      <img src="<?= INCLUDE_PATH?>classes/Views/imguser/<?= $dado['imagem']?>" alt="Perfil">
                      <?php } ?>
                        </div>
                    </div>
                </div>
                </nav>
            </header>

            <div class="float-background">
                <!-- <img src="<?= INCLUDE_PATH?>classes/Views/imgsistem/background.png" alt=""> -->
            </div>
            <div id="menu-painel" class="menu-painel">
                <div class="none titulo-dentro-do-painel">
                    <h1 class="">Módulos central</h1>
                </div>
                <div class="content-titulo-de-categorias">
                    <div class="nomes-principais">


                        <ul class="ul-menu-painel">
                            <li class="li_menu_painel"> <a href="<?= INCLUDE_PATH ?>" class="<?php selecionadoMenu('') ?> links-menu"><i class='icon-menu bx bxs-dashboard'></i> Dashboard</a> </li>
                            <li class="li_menu_painel">  <a <?php verificaPermissaoMenu(0)?> href="<?= INCLUDE_PATH?>clients" class="<?php selecionadoMenu('clients') ?> links-menu"><i class='icon-menu bx bx-user'></i> Clientes</a> <li>
                            <!-- <li class="li_menu_painel"> <a href="<?= INCLUDE_PATH?>financeiro" <?php verificaPermissaoMenu(1)?> class="<?php selecionadoMenu('financeiro') ?> links-menu"><i class='icon-menu bx bx-money-withdraw'></i> Financeiro</a> </li> -->
                            <li class="li_menu_painel"> <a href="<?= INCLUDE_PATH?>produtos" class="<?php selecionadoMenu('produtos') ?> links-menu"><i class='icon-menu bx bxs-shopping-bags'></i> Produtos</a> </li>
                            <li class="li_menu_painel"> <a href="<?= INCLUDE_PATH?>categorias" class="<?php selecionadoMenu('categorias') ?> links-menu"> <i class='icon-menu bx bxs-category-alt'></i> Categorias</a> </li>
                            <li class="li_menu_painel"> <a href="<?= INCLUDE_PATH?>bot" class="<?php selecionadoMenu('bot') ?> links-menu"><i class='icon-menu bx bxs-bot'></i> Conectar Bot</a> <li>
                            <li class="li_menu_painel"> <a href="<?= INCLUDE_PATH?>credentials" class="<?php selecionadoMenu('credentials') ?> links-menu"><i class='icon-menu bx bx-money-withdraw'></i> Pagamentos</a> <li>
                            <li class="li_menu_painel"> <a href="<?= INCLUDE_PATH?>respostas" class="<?php selecionadoMenu('credentials') ?> links-menu"><i class='icon-menu bx bxs-conversation'></i> Respostas</a> <li>
                            <li class="li_menu_painel"> <a href="<?= INCLUDE_PATH?>settingsbasic" class="<?php selecionadoMenu('credentials') ?> links-menu"><i class='icon-menu bx bxs-cog'></i> Configuração</a> <li>

                        </ul>

                        








                        
                       
                    </div>
                </div>

                <div class="version_box_menu">
                    <hr>
                    <div class="version_box_menu_content">
                        <p class="version_application"> ----Beta 2.3.0---- </p>
                    </div>
                </div>

            </div>

            

            <div class="menu-usuario-right">
                <div class="content-usuario">
                    <div class="titulo-usuario">
                        <h1>Perfil de usuário</h1>
                        <div class="close-menu-usuario">
                            <i class='icon-close bx bx-x'></i>
                        </div>
                    </div>
                    <div class="content-usuario-info">
                        <div class="img-usuario-painel">
                        <?php
                            if($dado['imagem'] == ''){?>
                        <img src="<?= INCLUDE_PATH?>classes/Views/imguser/user_none.png" alt="Perfil">
                            <?php }else{
                          ?>
                      <img src="<?= INCLUDE_PATH?>classes/Views/imguser/<?= $dado['imagem']?>" alt="Perfil">
                      <?php } ?>
                        </div>
                        <div class="content-usuario-info-nomes-links">
                            <div class="usuario-nome">
                                <h1><?= $dado['nome'].' '.$dado['sobre_nome'] ?></h1>
                            </div>
                            <div class="usuario-email">
                            <i class='icon-email bx bxs-wrench'></i>
                                <h1><?= Painel::$cargos[$dado['cargo']] ?></h1>
                            </div>
                            <div class="btns-usuario">
                                <a href="<?= INCLUDE_PATH?>?loggout" class="btn-sair-usuario">
                                   Sair
                                </a>
                                <a href="<?= INCLUDE_PATH_SETTING?>" class="btn-config-usuario">
                                    <i class='icon-menu bx bx-cog'></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
      