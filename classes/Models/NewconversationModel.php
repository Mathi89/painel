<?php

namespace Models;

use MySql;

class NewconversationModel
{
    public static function getRespostasBot()
    {
        $listProdutod = \Painel::selectAllQuery('tb_admin.respostas');
        return $listProdutod;
    }

    public static function addresposta()
    {
        if(isset($_POST['pergunta']) && isset($_POST['resposta'])){
            $pergunta = $_POST['pergunta'];
            $resposta = $_POST['resposta'];

            $arr = array(
                'nome_tabela'=>'tb_admin.respostas',
                'pergunta'=>$pergunta,
                'resposta'=>$resposta,
                'status'=>'on'
            );

            $insert = \Painel::insert($arr);
        //    $ex = \MySql::conectar()->prepare("INSERT INTO `tb_admin.respostas`( `pergunta`, `resposta`, `status`) VALUES ('[value-2]','😘💕💕⚡⚡','[value-4]')");


            if($insert){
                $res = true;
            }else{
                $res = false;
            }

        }else{
            $res = false;
        }

        echo json_encode($res);
    }

    public static function editresposta()
    {
        if(isset($_POST['pergunta']) && isset($_POST['resposta']) && isset($_POST['idmsg'])){
            $pergunta = $_POST['pergunta'];
            $resposta = $_POST['resposta'];
            $idmsg = $_POST['idmsg'];
            
            $infomsg = \Painel::select('tb_admin.respostas','id = ?',array($idmsg));
            if(isset($infomsg['pergunta'])){


                $arr = array(
                    'nome_tabela'=>'tb_admin.respostas',
                    'id'=>$idmsg,
                    'pergunta'=>$pergunta,
                    'resposta'=>$resposta

                );
    
                $update = \Painel::update($arr);
    
                if($update){
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
