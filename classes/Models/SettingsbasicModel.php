<?php

namespace Models;

use MySql;

class SettingsbasicModel
{
    public static function getInfos()
    {
        $infos = \Painel::select('tb_admin.business','id = ?',array('1'));
        return $infos;
    }

    public static function edit()
    {
        

        if(isset($_POST['nome']) AND isset($_POST['whatsapp']) /* AND isset($_FILES['logoinput']['name']) */ AND isset($_POST['email'])){

            $nome = $_POST['nome'];
            $whatsapp = $_POST['whatsapp'];
            $whatsapp = \Painel::getCellPhoneNumber($whatsapp);
            $logo = $_FILES['logoinput'];
            $email = $_POST['email'];

            if($logo['name'] != ""){
                $validandoimg = \Painel::imagemValida($logo);
            }else{
                $validandoimg = true;
            }
            
            if($validandoimg){


                if($logo['name'] != ""){
                    $imglogo = \Painel::uploadImgSystem($logo);
                    $imgOld = \Painel::select('tb_admin.business','id = ?',array('1'));
                    \Painel::deleteImgSystem($imgOld['logo']);
                    
                    $arr = array(
                        'nome_tabela'=>'tb_admin.business',
                        'id'=>'1',
                        'nome_empresa'=>$nome,
                        'celular'=>$whatsapp,
                        'logo'=>$imglogo,
                        'email'=>$email
                    );
                }else{
                    $arr = array(
                        'nome_tabela'=>'tb_admin.business',
                        'id'=>'1',
                        'nome_empresa'=>$nome,
                        'celular'=>$whatsapp,
                        'email'=>$email
                    );
                }
                

                $update = \Painel::update($arr);

                
                if($update){
                    $res = true;

                }else{
                    $res = 'cccc';
                }
            }else{

                $res = 'bbbb';

            }
            

        }else{

            $res = 'ffrfrf';
        }

        
            echo json_encode($res);
        
        
    }


}
