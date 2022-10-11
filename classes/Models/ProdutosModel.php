<?php

namespace Models;

use MySql;

class ProdutosModel
{
    public static function getListProdutos()
    {
        $listProdutod = \Painel::selectAllQuery('tb_admin.store_products');
        return $listProdutod;
    }

    public static function getOnePictureOfProduct($id)
    {
        $listProdutod = \Painel::select('tb_admin.imgproducts','id_produto = ?',array($id));
        return $listProdutod;
    }

    public static function editstatus()
    {
          
      if(isset($_POST['idproduct'])){

        $table = 'tb_admin.store_products';

        $idproduct = $_POST['idproduct'];

        $statusatual = \Painel::select($table,'id = ?',array($idproduct));

        if($statusatual['status'] == "on"){

            $novostatus = "off";

        }else{
            $novostatus = "on";

        }

        $arr = array(
            'nome_tabela'=>$table,
            'id'=>$idproduct,
            'status'=>$novostatus
        );
        $updatestatus = \Painel::update($arr);

        if($updatestatus){

            $statusnovo = \Painel::select($table,'id = ?',array($idproduct));
            $res = true;
            $html = '<span id="status-product" data-name="'.$statusnovo['title'].'" data-idproduct="'.$statusnovo['id'].'" class="status-product '. getStatus($statusnovo['status'])["class"].' ">'.getStatus($statusnovo['status'])["name"] .'</span>';

        }else{
            $res = false;
            $html = "";
        }
        

      }else{
        $res = false;
        $html ="";
      }

      echo json_encode(array($res,$html));
    }

    public static function deleteproduto()
    {

        if(isset($_POST['idproduct'])){
            $idproduto = $_POST['idproduct'];
            $table = 'tb_admin.store_products';

            $delete = \Painel::delete($table,'WHERE id = ?',array($idproduto));

            if($delete){
                // $deleteimgBD = \Painel::delete('tb_admin.imgproducts','WHERE id_produto = ?',array($idproduto));
                $deletevariacao = \Painel::delete('tb_admin.variacoes_produtos','WHERE id_produto = ?',array($idproduto));
                if($deletevariacao){

                    $deletecombo = \Painel::delete('tb_admin.combos_itens','WHERE id_produto = ?',array($idproduto));
                    if($deletecombo){

                        $res = true;
                        
                    }else{
                        $res = false;
                    }
                    
                }else{
                    $res = false;
                }

               

            }else{
                $res = false;
            }


        }else{
            $res = false;
        }

        echo json_encode($res);


    }

}
