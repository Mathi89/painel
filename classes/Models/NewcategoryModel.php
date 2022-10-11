<?php

namespace Models;

use MySql;

class NewcategoryModel
{
    public static function newcategory()
    {
        if(isset($_POST['categoria']))
        {
            $nomecategoria = $_POST['categoria'];
            $description = $_POST['description'];
            $slug = $_POST['slug'];
            


            $res = \Painel::newcategory( $nomecategoria,$description,$slug );

        }else{
            $res = false;
        }

        echo json_encode($res);
    }


}
