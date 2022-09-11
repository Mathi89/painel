<?php

namespace Models;

use MySql;

class ProdutosModel
{
    public static function trocar_primeira_senha()
    {
        if($_POST['senha'] == $_POST['confsenha']){

            $novaS1 = sha1($_POST['senha']);
            $novaS2 = $_POST['confsenha'];
            $confirm = 'on';
            $status = 1;
            $updateNovaSenha = MySql::conectar()->prepare("UPDATE tb_admin_users SET pass = ?, confirmado = ?, status = ? WHERE id = ?");
            if($updateNovaSenha->execute(array($novaS1,$confirm,$status,$_SESSION['id_user']))){
                session_destroy();
                $res = ['1'];
            }

        }else{
            $res = ['0'];  
        }
       echo json_encode($res);
    }

}
