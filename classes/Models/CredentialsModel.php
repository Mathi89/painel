<?php

namespace Models;

use MySql;

class CredentialsModel
{
    public static function getCardPayment()
    {
        $res = \Painel::select('tb_admin.credentials','id = ?',array('1'));
        return $res;
    }

    public static function atualizecredentials()
    {
        

        if(isset($_POST['publickey']) AND isset($_POST['accesstoken'])){

            $publickey = $_POST['publickey'];
            $accesstoken = $_POST['accesstoken'];

        $arr = array(
            'nome_tabela'=>'tb_admin.credentials',
            'id'=>'1',
            'public_key'=>$publickey,
            'access_token'=>$accesstoken
        );

        $update = \Painel::update($arr);

        if($update){
            $dados = \Painel::select('tb_admin.credentials','id = ?',array('1'));

            if($dados['public_key'] == ""){
                $publickey = "Sem public key";

            }else{
                $publickey = "************************".substr($dados['public_key'], -4);
            }


            if($dados['access_token'] == ""){
                $accesstoken = "Sem access token";
                
            }else{
                $accesstoken = "************************".substr($dados['access_token'], -4);
                
            }

            $textaccess = $accesstoken;
            $textpublic = $publickey;
            $res = true;
        }else{
            $textaccess = "";
            $textpublic = "";
            $res = false;
        }

    }else{
        $textaccess = "";
        $textpublic = "";
        $res = false;
    }

        echo json_encode(array($res,$textaccess,$textpublic));
    }


}
