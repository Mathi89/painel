<?php

namespace Models;

use MySql;

class NewproductModel
{
    public static function newproduct()
    {
        if(isset($_POST['name']) && isset($_POST['preco']) && isset($_POST['type']) & isset($_POST['categorias']))
        {
            $nomeproduto = $_POST['name'];
            $preco = $_POST['preco'];
            $precopromotion = $_POST['precopromotion'];
            $description = $_POST['description'];
            $type = $_POST['type'];
            $categorias = $_POST['categorias'];
            $estoque = $_POST['estoque'];
            $slug = $_POST['slug'];
            $foto  =$_FILES['foto'];


            $res = \Painel::newproduct(
                $nomeproduto,
                $preco,
                $precopromotion,
                $description,
                $type,
                $categorias,
                $estoque,
                $slug,
                $foto 
            );

        }else{
            $res = false;
        }

        echo json_encode($res);
    }


}
