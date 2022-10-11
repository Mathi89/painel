<?php

namespace Models;

use MySql;

class RespostasModel
{
    public static function getRespostasBot()
    {
        $listProdutod = \Painel::selectAllQuery('tb_admin.respostas');
        return $listProdutod;
    }

    public static function deletemsg()
    {
        if(isset($_POST['idmsg'])){
            $idmsg = $_POST['idmsg'];


            $delete = \Painel::delete('tb_admin.respostas','WHERE id = ?',array($idmsg));

            if($delete){
                $res = true;
            }else{
                $res = false;
            }

        }else{
            $res = false;
        }

        return $res;
    }

    public static function editstatusmsg()
    {
          
      if(isset($_POST['idmsg'])){

        $table = 'tb_admin.respostas';

        $idmsg = $_POST['idmsg'];

        $statusatual = \Painel::select($table,'id = ?',array($idmsg));

        if($statusatual['status'] == "on"){

            $novostatus = "off";

        }else{
            $novostatus = "on";

        }

        $arr = array(
            'nome_tabela'=>$table,
            'id'=>$idmsg,
            'status'=>$novostatus
        );
        $updatestatus = \Painel::update($arr);

        if($updatestatus){

            $statusnovo = \Painel::select($table,'id = ?',array($idmsg));
            $res = true;
            $html = '<span id="status-msg" data-name="'.$statusnovo['pergunta'].'" data-idmsg="'.$statusnovo['id'].'" class="status-product '. getStatus($statusnovo['status'])["class"].' ">'.getStatus($statusnovo['status'])["name"] .'</span>';

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

        echo json_encode($res);


    }

}
