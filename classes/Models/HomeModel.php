<?php

namespace Models;

use MySql;

class HomeModel
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

    public static function boas_vindas()
    {
        if(isset($_SESSION['primeiro_login'])){
            $hr = date('H:i:s');
                    if($hr >= 12 && $hr<18) {
                    $resp = "Boa tarde ";}
                    else if ($hr >= 0 && $hr <12 ){
                    $resp = "Bom dia ";}
                    else {
                    $resp = "Boa noite ";}
                   
                    $res = '<div class="boas_vindas_balao_traco"></div>
                    <div class="conteudo_letras">Oopa! '.$resp.' '.$_SESSION['nome'].'!</div>';
        }else{
            $res = 0;
        }

        echo $res;
        if(isset($_SESSION['primeiro_login'])){
            unset( $_SESSION['primeiro_login'] ); 
        }
         
    }

    public static function pagesDestaques()
    {
       
            $dados=\Painel::selectAllQuery('tb_admin.frames','WHERE status = ?',array('on'));

            return $dados;
    }

    public static function getInfoToday()
    {

        $table = 'tb_admin.pedidos';
        $hoje = date("Y/m/d");
  
        $conttoday = MySql::conectar()->prepare("SELECT COUNT(x.reference_id) qtd FROM (SELECT reference_id FROM `$table` WHERE DATE_FORMAT(data_hora,'%Y/%m/%d') = ? GROUP BY reference_id) x");
        $conttoday->execute(array($hoje));
        $rescont = $conttoday->fetch();
        if(!empty($rescont['qtd'])){
            $rescont = $rescont['qtd'];
        }else{
            $rescont = 0;
        }


        $sumtoday = MySql::conectar()->prepare("SELECT SUM(y.total_compra) total FROM (SELECT total_compra FROM `$table` WHERE DATE_FORMAT(data_hora,'%Y/%m/%d') = ? GROUP BY reference_id) y");
        $sumtoday->execute(array($hoje));
        $ressum = $sumtoday->fetch();

        if(!empty($ressum['total'])){
            $ressum = $ressum['total'];
        }else{
            $ressum = 0;
        }
        $ressum = floatval($ressum);
        $ressum = \Painel::convertMoney($ressum);

        return array($rescont,$ressum);

        
    }

    public static function getInfoMes()
    {

        $table = 'tb_admin.pedidos';
        $hoje = date("m");
  
        $conttoday = MySql::conectar()->prepare("SELECT COUNT(x.reference_id) qtd FROM (SELECT reference_id FROM `$table` WHERE DATE_FORMAT(data_hora,'%m') = ? GROUP BY reference_id) x");
        $conttoday->execute(array($hoje));
        $rescont = $conttoday->fetch();
        if(!empty($rescont['qtd'])){
            $rescont = $rescont['qtd'];
        }else{
            $rescont = 0;
        }


        $sumtoday = MySql::conectar()->prepare("SELECT SUM(x.total_compra) total FROM (SELECT total_compra FROM `$table` WHERE DATE_FORMAT(data_hora,'%m') = ? GROUP BY reference_id) x");
        $sumtoday->execute(array($hoje));
        $ressum = $sumtoday->fetch();

        if(!empty($ressum['total'])){
            $ressum = $ressum['total'];
        }else{
            $ressum = 0;
        }
        $ressum = floatval($ressum);
        $ressum = \Painel::convertMoney($ressum);

        return array($rescont,$ressum);

        
    }

    public static function getQtdPlataforma($status = "on")
    {

        if($status == "all"){
            $sel = \Painel::selectAllQuery('tb_admin.plataformas_recarga');
        }else{
            $sel = \Painel::selectAllQuery('tb_admin.plataformas_recarga','WHERE status = ?', array($status));
        }
        
        return $sel;
    }

    public static function getQtdEstoque($id_plataforma,$status = "all")
    {
     
        if($status == "all"){

            $sel = \Painel::selectCount('tb_admin.estoque_recarga','id_plataforma = ?',array($id_plataforma),'id');
            if(!empty($sel['qtd'])){
                $sel = $sel['qtd'];
            }else{
                $sel = 0;
            }

        }else{

            $sel = \Painel::selectCount('tb_admin.estoque_recarga','id_plataforma = ? AND status = ?',array($id_plataforma,$status),'id');
            if(!empty($sel['qtd'])){
                $sel = $sel['qtd'];
            }else{
                $sel = 0;
            }
        }
        
        return $sel;
    }

    public static function getLastPayments()
    {
        $get = \Painel::selectAllQuery('tb_admin.pedidos','WHERE status = ? GROUP BY reference_id ORDER BY id DESC LIMIT 25 ',array("approved"));
        return $get;
    }

}
