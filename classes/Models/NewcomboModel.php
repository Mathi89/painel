<?php

namespace Models;

use MySql;

class NewcomboModel
{

    public static function getImgaesProducts($id_produto)
    {
        $get = \Painel::selectAllQuery('tb_admin.imgproducts', 'WHERE id_produto = ?', array($id_produto));
        return $get;
    }
    public static function sessiondeletevaria()
    {

        if (isset($_POST['idvaria'])) {
            $idvaria = $_POST['idvaria'];

            if (!isset($_SESSION['variadel'])) {
                $_SESSION['variadel'] = array();
            }

            if (!isset($_SESSION['variadel']) == $idvaria) {
                $_SESSION['variadel'][] = $idvaria;
            } else {
                $_SESSION['variadel'][] = $idvaria;
            }
            $res = true;
        } else {
            $res = false;
        }

        return $res;
    }

    public static function sessiondeleteimg()
    {

        if (isset($_POST['idimg'])) {
            $idimg = $_POST['idimg'];

            if (!isset($_SESSION['fotodel'])) {
                $_SESSION['fotodel'] = array();
            }

            if (!isset($_SESSION['fotodel']) == $idimg) {
                $_SESSION['fotodel'][] = $idimg;
            } else {
                $_SESSION['fotodel'][] = $idimg;
            }
            $res = true;
        } else {
            $res = false;
        }

        return $res;
    }

    public static function getVariacaoProducts($id_produto)
    {
        $get = \Painel::selectAllQuery('tb_admin.combos_itens', 'WHERE id_produto = ?', array($id_produto));
        return $get;
    }


    public static function deleteimgconfirm()
    {

        if (isset($_POST['idimg'])) {
            $id_img = $_POST['idimg'];

            $sel = \Painel::select('tb_admin.imgproducts', 'id = ?', array($id_img));

            $del = \Painel::delete('tb_admin.imgproducts', 'WHERE id = ?', array($id_img));
            if ($del) {
                \Painel::deleteImgProduct($sel['img_produto']);
                $res = true;
                $html = \Models\NewproductModel::getHtmlImgs($sel['id_produto']);
            } else {
                $res = false;
                $html = "";
            }
        } else {
            $res = false;
            $html = "";
        }
        echo json_encode(array($res, $html));
    }

    public static function getHtmlImgs($id_produto)
    {

        $get = \Painel::selectAllQuery('tb_admin.imgproducts', 'WHERE id_produto = ?', array($id_produto));

        $html = "";
        $cont = 0;
        foreach ($get as $key => $img) {
            $cont++;

            $html .= '  <div class="base-img">
                <i id="del-ask-img" data-id="' . $img['id'] . '" class="del-ask-img bx bxs-x-circle"></i>
                <img id="foto-image-produto" class="image-produto-form" src="' . INCLUDE_PATH_VIEWS . 'imgsproducts/' . $img['img_produto'] . '">
            </div>
            ';
        }

        if ($cont < 6) {
            $html .= '<img id="foto-image-produto" class="image-produto-form" src="https://sintra.org.br/assets/images/no-image.svg">';
        }

        return $html;
    }

    public static function newcombo()
    {

        if (isset($_POST['name']) && isset($_POST['preco']) && isset($_POST['type']) & isset($_POST['categorias'])) {
            if(isset($_POST['statuspromotion'])){
                $statuspromotion = $_POST['statuspromotion'];
            }else{
                $statuspromotion = "off";
            }

            $nomeproduto = $_POST['name'];
            $preco = $_POST['preco'];
            $precopromotion = $_POST['precopromotion'];
            $description = $_POST['description'];
            $type = $_POST['type'];
            $categorias = $_POST['categorias'];
            $estoque = $_POST['estoque'];
            $slug = $_POST['slug'];
            $foto = $_FILES['foto'];
            $objeto = "combo";;

            if ($objeto == "combo") {


                if ($type == "recarga") {

                    if (isset($_POST['nomevariacao']) and isset($_POST['typevariacao']) and isset($_POST['qtdvariacao']) and isset($_POST['plataforma'])) {
                        $nomevariacao = $_POST['nomevariacao'];
                        $typevariacao = $_POST['typevariacao'];
                        $qtdvariacao = $_POST['qtdvariacao'];
                        $plataformarecarga = $_POST['plataforma'];
                        if ($nomevariacao != "" and $typevariacao != "" and $qtdvariacao != "" and $plataformarecarga != "") {
                            $verifynome = (false === array_search(false, $nomevariacao, false));
                            $verifytype = (false === array_search(false, $typevariacao, false));
                            $verifyqtd = (false === array_search(false, $qtdvariacao, false));
                            $verifyplataformarecarga = (false === array_search(false, $plataformarecarga, false));

                            if ($verifynome != false && $verifytype != false && $verifyqtd != false && $verifyplataformarecarga != false) {


                                $res = \Products::newproductcombo(
                                    $nomeproduto,
                                    $preco,
                                    $precopromotion,
                                    $description,
                                    $type,
                                    $categorias,
                                    $estoque,
                                    $slug,
                                    $foto,
                                    $nomevariacao,
                                    $typevariacao,
                                    $qtdvariacao,
                                    $plataformarecarga,
                                    $objeto,
                                    $statuspromotion
                                );
                            } else {
                                $res = 'preench';
                            }
                        } else {
                            $res = 'preench';
                        }
                    } else {
                        $res = 'preench';
                    }
                } else {

                    $res = \Products::newproduct(
                        $nomeproduto,
                        $preco,
                        $precopromotion,
                        $description,
                        $type,
                        $categorias,
                        $estoque,
                        $slug,
                        $foto,
                        $objeto,
                        $statuspromotion
                    );
                }
            } else {

                if ($type == "recarga") {
                    if (isset($_POST['nomevariacao']) and isset($_POST['typevariacao']) and isset($_POST['qtdvariacao']) and isset($_POST['precovariacao']) and isset($_POST['plataforma'])) {
                        $nomevariacao = $_POST['nomevariacao'];
                        $typevariacao = $_POST['typevariacao'];
                        $qtdvariacao = $_POST['qtdvariacao'];
                        $precovariacao = $_POST['precovariacao'];
                        $plataformarecarga = $_POST['plataforma'];
                        if ($nomevariacao != "" and $typevariacao != "" and $qtdvariacao != "" and $precovariacao != "" and $plataformarecarga != "") {
                            $verifynome = (false === array_search(false, $nomevariacao, false));
                            $verifytype = (false === array_search(false, $typevariacao, false));
                            $verifyqtd = (false === array_search(false, $qtdvariacao, false));
                            $verifypreco = (false === array_search(false, $precovariacao, false));
                            $verifyplataformarecarga = (false === array_search(false, $plataformarecarga, false));

                            if ($verifynome != false && $verifytype != false && $verifyqtd != false && $verifypreco != false && $verifyplataformarecarga != false) {


                                $res = \Products::newproductvariacao(
                                    $nomeproduto,
                                    $preco,
                                    $precopromotion,
                                    $description,
                                    $type,
                                    $categorias,
                                    $estoque,
                                    $slug,
                                    $foto,
                                    $nomevariacao,
                                    $typevariacao,
                                    $qtdvariacao,
                                    $precovariacao,
                                    $plataformarecarga,
                                    $objeto,
                                    $statuspromotion
                                );
                            } else {
                                $res = 'preench';
                            }
                        } else {
                            $res = 'preench';
                        }
                    } else {
                        $res = 'preench';
                    }
                } else {

                    $res = \Products::newproduct(
                        $nomeproduto,
                        $preco,
                        $precopromotion,
                        $description,
                        $type,
                        $categorias,
                        $estoque,
                        $slug,
                        $foto,
                        $objeto,
                        $statuspromotion
                    );
                }
            }
        } else {
            $res = false;
        }

        return $res;
        // echo json_encode($res);
    }

    public static function editproduct()
    {

        if (isset($_POST['idedit']) /* &&isset($_POST['name']) /* && isset($_POST['objeto']) *//*  && isset($_POST['preco']) && isset($_POST['type']) & isset($_POST['categorias'] */) {
            $idprodutoedit = $_POST['idedit'];

            $verify = \Painel::select('tb_admin.store_products', 'id = ?', array($idprodutoedit));

            if (isset($verify['id'])) {

                if(isset($_POST['statuspromotion'])){
                    $statuspromotion = $_POST['statuspromotion'];
                }else{
                    $statuspromotion = "off";
                }


                $nomeproduto = $_POST['name'];
                $preco = $_POST['preco'];
                $precopromotion = $_POST['precopromotion'];
                $description = $_POST['description'];
                $type = $_POST['type'];
                $categorias = $_POST['categorias'];
                $estoque = $_POST['estoque'];
                $slug = \Painel::editSlugOfEditProduct($_POST['slug'], $idprodutoedit);

                $foto = $_FILES['foto'];
                // $objeto = $_POST['objeto'];
                $objeto = "combo";

                // VERIFICANDO QUANTAS VARIÇÕES SERAO EXCLUIDAS E QUANTAS EXISTEM NO BD
                if (isset($_SESSION['variadel'])) {
                    $session_variadel = $_SESSION['variadel'];
                    $contsessionvaria = 0;
                    foreach ($session_variadel as $key => $value) {
                        $contsessionvaria++;
                    }
                } else {
                    $contsessionvaria = 0;
                }

                $variacaoqtd = \Painel::selectCount('tb_admin.combos_itens', 'id_produto = ?', array($idprodutoedit), 'id')['qtd'];

                $contagem_variacao_existente_total = $variacaoqtd - $contsessionvaria;


                // VERIFICANDO QUANTAS FOTOS TEM A SER EXCLUIDA NA SESISON
                if (isset($_SESSION['fotodel'])) {
                    $session_fotodel = $_SESSION['fotodel'];
                    $contsessionfotodel = 0;
                    foreach ($session_fotodel as $key => $value) {
                        $contsessionfotodel++;
                    }
                } else {
                    $contsessionfotodel = 0;
                }

                $fotobdqtd = \Painel::selectCount('tb_admin.imgproducts', 'id_produto = ?', array($idprodutoedit), 'id')['qtd'];

                $contagem_foto_existente_total = $fotobdqtd - $contsessionfotodel;


                if ($type == "recarga") {







                    // DE ACORDO COM A CONTAGEM DE VARIAÇÕES JA EXISTENTES É CRIADA UMA VARIAVEL "$continuar" SE ELA FOR TRUE
                    // O FLUXO CONTINUAR NORMAL, CASO ELA FOR FALSE É DADO UM ERRO PARA O USUARIO CRIAR PELO MENOS UMA
                    // VARIACAO DO PRODUTO
                    if ($contagem_variacao_existente_total < 1) {

                        if (isset($_POST['nomevariacao'])) {
                            $continuar = true;
                        } else {
                            $continuar = false;
                        }
                    } else {
                        $continuar = true;
                    }
                    // var_dump($_SESSION['variadel']);

                    if ($continuar == true) {





                        // VERIFICANDO DADOS DA VARIAÇÃO JÁ EXISTENTE
                        if (isset($_POST['atunomevariacao']) and isset($_POST['atutypevariacao']) and isset($_POST['atuqtdvariacao']) and isset($_POST['atuplataforma']) and isset($_POST['atuidvariacao'])) {
                            $atunomevariacao = $_POST['atunomevariacao'];
                            $atutypevariacao = $_POST['atutypevariacao'];
                            $atuqtdvariacao = $_POST['atuqtdvariacao'];
                            $atuplataformarecarga = $_POST['atuplataforma'];
                            $atuidvariacao = $_POST['atuidvariacao'];
                            if ($atuidvariacao != "" and $atunomevariacao != "" and $atutypevariacao != "" and $atuqtdvariacao != "" and $atuplataformarecarga != "") {
                                $atuverifyidvariacao = (false === array_search(false, $atuidvariacao, false));
                                $atuverifynome = (false === array_search(false, $atunomevariacao, false));
                                $atuverifytype = (false === array_search(false, $atutypevariacao, false));
                                $atuverifyqtd = (false === array_search(false, $atuqtdvariacao, false));
                                $atuverifyplataformarecarga = (false === array_search(false, $atuplataformarecarga, false));


                                if ($atuverifyidvariacao != false && $atuverifynome != false && $atuverifytype != false && $atuverifyqtd != false && $atuverifyplataformarecarga != false) {
                                    $resatu = "ok";
                                } else {
                                    $resatu = 'preench';
                                }
                            } else {
                                $resatu = 'preench';
                            }
                        } else {
                            $resatu = "naosetado";
                        }















                        // VERIFICANDO E CRIANDO UMA NOVA VARIACAO PARA ESTE COMBO
                        if (isset($_POST['nomevariacao']) and isset($_POST['typevariacao']) and isset($_POST['qtdvariacao']) and isset($_POST['plataforma'])) {
                            $nomevariacao = $_POST['nomevariacao'];
                            $typevariacao = $_POST['typevariacao'];
                            $qtdvariacao = $_POST['qtdvariacao'];
                            $plataformarecarga = $_POST['plataforma'];
                            if ($nomevariacao != "" and $typevariacao != "null" and $typevariacao != "" and $qtdvariacao != "" and $plataformarecarga != "null" and $plataformarecarga != "") {
                                $verifynome = (false === array_search(false, $nomevariacao, false));
                                $verifytype = (false === array_search(false, $typevariacao, false));
                                $verifyqtd = (false === array_search(false, $qtdvariacao, false));
                                $verifyplataformarecarga = (false === array_search(false, $plataformarecarga, false));

                                if ($verifynome != false && $verifytype != false && $verifyqtd != false && $verifyplataformarecarga != false) {
                                    $rescreat = "ok";
                                } else {
                                    $rescreat = 'preench';
                                }
                            } else {
                                $rescreat = 'preench';
                            }
                        } else {
                            $rescreat = "naosetado";
                        }


                        // echo $rescreat;
                        if (($resatu == "ok" or $resatu != "preench") and ($rescreat == "ok" or $rescreat != "preench")) {

                            // PRIMEIRO ATUALIZANDO PRODUTO SEM VARIACAO
                            $editandoproduto = \Products::editproduct(
                                $nomeproduto,
                                $preco,
                                $precopromotion,
                                $description,
                                $type,
                                $categorias,
                                $estoque,
                                $slug,
                                $objeto,
                                $idprodutoedit,
                                $statuspromotion
                            );

                            if($editandoproduto == true){

                                
                                if ($resatu == "ok") {
                                    $editandovariacao = \Products::editVariacaoComboExistente($atuidvariacao, $atunomevariacao, $atutypevariacao, $atuqtdvariacao, $atuplataformarecarga, $idprodutoedit);
                                }

                                if ($rescreat == "ok") {
                                    $addvariacaoonproduct = \Products::addvariacaocomboonproduct($nomevariacao, $typevariacao, $qtdvariacao, $plataformarecarga, $idprodutoedit);
                                }
                                // DELETANDO VARIACOES DO PRODUTO PELA SESSION
                                \Products::delVariaProductForSession($objeto);

                                // DELETANDO    FOTOS DO PRODUTO PELA SESSION
                                \Products::delFotoProductForSession();

                                // INSERINDO NOVAS IMAGENS AO PRODUTO
                                \Products::insertImgForEditProduct($idprodutoedit, $foto, $contagem_foto_existente_total);

                                $res = true;

                            }else{
                                $res = false;
                            }
                        } else {
                            $res = 'preench';
                        }
                    } else {
                        $res = 'createavariacao';
                    }
                } else {

                    // PRIMEIRO ATUALIZANDO PRODUTO SEM VARIACAO
                    $editandoonlyproduct = \Products::editproduct(
                        $nomeproduto,
                        $preco,
                        $precopromotion,
                        $description,
                        $type,
                        $categorias,
                        $estoque,
                        $slug,
                        $objeto,
                        $idprodutoedit,
                        $statuspromotion
                    );

                    if ($editandoonlyproduct == true) {
                        // DELETANDO    FOTOS DO PRODUTO PELA SESSION
                        \Products::delFotoProductForSession();

                        // INSERINDO NOVAS IMAGENS AO PRODUTO
                        \Products::insertImgForEditProduct($idprodutoedit, $foto, $contagem_foto_existente_total);
                        $res = true;
                    }else{
                        $res = false;
                    }
                }
            } else {
                $res = false;
            }
        } else {
            $res = false;
        }

        return $res;
        // echo json_encode($res);
    }

    public static function getCategorias()
    {
        $categorias = \Painel::selectAllQuery('tb_admin.store_category', 'WHERE status = ?', array('on'));
        return $categorias;
    }

    public static function getInfoProduct($id)
    {
        $produto = \Painel::select('tb_admin.store_products', 'id = ?', array($id));
        return $produto;
    }

    public static function getCategoriaFromProduct($id)
    {
        $categoria = \Painel::selectAllQuery('tb_admin.store_category', 'WHERE id = ?', array($id));
        return $categoria;
    }

    public static function generateSelectsVariation()
    {
        $resplataforma = \Models\HomeModel::getQtdPlataforma("on");
        $text = '
        <input type="text" name="nomevariacao[]" placeholder="Tv 3 meses">

        <select name="typevariacao[]">
            <option value="null" selected>Tipo do código</option>
            <option value="mensal">Mensal</option>
            <option value="anual">Anual</option>
        </select>

        <input type="tel" name="qtdvariacao[]" placeholder="Quantidade de itens">

        <select name="plataforma[]">
            <option value="null" selected>Qual plataforma</option>';
            foreach ($resplataforma as $key => $info) {
                
               $text .= ' <option value="'.$info['id'].'">'.$info['nome'].'</option>';
          }
        $text .= '</select>

        <input type="tel" class="moneyrs" name="precovariacao[]" placeholder="valor">           
        
        
        ';

        return $text;
    }
}
