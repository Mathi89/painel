<?php

namespace Models;

use MySql;

class VariacoesModel
{
    public static function getListCategory()
    {
        
       $list = \Painel::selectAllQuery('tb_admin.store_category');
       return $list;
    }

    public static function editstatus()
    {
        
      if(isset($_POST['idcategoria'])){

        $idcategoria = $_POST['idcategoria'];

        $statusatual = \Painel::select('tb_admin.store_category','id = ?',array($idcategoria));

        if($statusatual['status'] == "on"){

            $novostatus = "off";

        }else{
            $novostatus = "on";

        }

        $arr = array(
            'nome_tabela'=>'tb_admin.store_category',
            'id'=>$idcategoria,
            'status'=>$novostatus
        );
        $updatestatus = \Painel::update($arr);

        if($updatestatus){

            $statusnovo = \Painel::select('tb_admin.store_category','id = ?',array($idcategoria));
            $res = true;
            $html = '<span id="status-categoria" data-name="'.$statusnovo['title'].'" data-idcategory="'.$statusnovo['id'].'" class="status-product '. getStatus($statusnovo['status'])["class"].' ">'.getStatus($statusnovo['status'])["name"] .'</span>';
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

    public static function deletecategoria()
    {
        if(isset($_POST['idcategoria'])){
            $idcategoria = $_POST['idcategoria'];

            $delete = \Painel::delete('tb_admin.store_category','WHERE id = ?',array($idcategoria));

            if($delete){
                $res = true;

            }else{
                $res = false;
            }


        }else{
            $res = false;
        }

        echo json_encode($res);

    }


}
