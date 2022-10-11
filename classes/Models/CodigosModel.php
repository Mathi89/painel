<?php

namespace Models;

class CodigosModel
{

    public static function addcodigos()
    {
        
        if(isset($_POST['codigos']) && isset($_POST['type']) && isset($_POST['plataforma'])){

            if($_POST['codigos'] != "" && $_POST['type'] != "" && $_POST['plataforma'] != ""){

                $codigos = $_POST['codigos'];
                $type = $_POST['type'];
                $plataforma = $_POST['plataforma'];

                $codigosseparados = preg_split("/\r\n/",$codigos);
                

                foreach ($codigosseparados as $codigo) {

                    if($codigo != ""){
                        
                        $arr = array(
                        'nome_tabela'=>'tb_admin.estoque_recarga',
                        'plataforma'=>$plataforma,
                        'codigo'=>$codigo,
                        'type'=>$type,
                        'id_plataforma'=>$plataforma,
                        'status'=>'on'
                        );

                        $insert = \Painel::insert($arr);
                    }
                    

                    
                }

                if($insert){
                    return true;
                }else{
                    return false;
                }
            
            }else{
                return false;
            }

        }else{
            return false;
        }
    }

    public static function getTotalCodigos($type)
    {
        if($type == "disponivel"){
            $res = \Painel::selectCount('tb_admin.estoque_recarga','status = ?',array('on'),'id');
        }else{
            $res= \Painel::selectCount('tb_admin.estoque_recarga','status = ?',array('off'),'id');
        }
        
        

        return $res;

    }

    public static function listSelects()
    {
        $sel = \Painel::selectAllQuery('tb_admin.plataformas_recarga');
        return $sel;

    }
   
}
