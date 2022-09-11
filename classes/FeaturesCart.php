<?php
class FeaturesCart
{
    public static function getTotalItenCart()
    {
       if(isset($_SESSION['carrinho'])){

        $amountQTD = 0;
        foreach ($_SESSION['carrinho'] as $key => $value) {
            $amountQTD+=$value;
        }
        return $amountQTD;

       }else{
        return 0;
       }
    }

    public static function editItenCart($post, $itemid, $itemqtd,$type)
    {

        if($post == false){
            $res = false;

        }else if($post == true){
           
            if($type == 'plus'){

                $idProduto = (int)$itemid;
                if(isset($_SESSION['carrinho']) == false){
                    $_SESSION['carrinho'] == array();
                }
     
    
                if(isset($_SESSION['carrinho'][$idProduto]) == false){
                    $_SESSION['carrinho'][$idProduto] = 1;
                }else{
                    $_SESSION['carrinho'][$idProduto]+=1;
                }
                $totalItemCart = \FeaturesCart::getTotalItenCart();
                $totalAmount = \Painel::convertMoney(\FeaturesCart::getTotalAmount());
                $totalAmountPromotion = \Painel::convertMoney(\FeaturesCart::getTotalAmountPromotion());
                $totalPrecoItem = \Painel::convertMoney(\FeaturesCart::getTotalAmountItemOnCart($idProduto));

                $res = array(true, $totalItemCart, $totalAmount, $totalAmountPromotion,$totalPrecoItem);

            }else{
                $idProduto = (int)$itemid;
                if(isset($_SESSION['carrinho']) == false){
                    $_SESSION['carrinho'] == array();
                }
     
    
                if(isset($_SESSION['carrinho'][$idProduto]) == false){
                    
                }else{
                    if($_SESSION['carrinho'][$idProduto] == 1){
                        $_SESSION['carrinho'][$idProduto] = 1;

                    }else{
                        $_SESSION['carrinho'][$idProduto]-=1;
                    }
                    
                }
                $totalItemCart = \FeaturesCart::getTotalItenCart();
                $totalAmount = \Painel::convertMoney(\FeaturesCart::getTotalAmount());
                $totalAmountPromotion = \Painel::convertMoney(\FeaturesCart::getTotalAmountPromotion());
                $totalPrecoItem = \Painel::convertMoney(\FeaturesCart::getTotalAmountItemOnCart($idProduto));

                $res = array(true, $totalItemCart, $totalAmount, $totalAmountPromotion,$totalPrecoItem);
            }
           

        }else{
            $res = false;
        }
        return $res;

    }

    public static function addItemToCart($post = false, $itemid = false, $itemqtd = false)
    {
        if($post == false){
            if(isset($_GET['addCart'])){
                $idProduto = (int)$_GET['addCart'];
                if(isset($_SESSION['carrinho']) == false){
                    $_SESSION['carrinho'] = array();
                }

                if(isset($_SESSION['carrinho'][$idProduto]) == false){
                    $_SESSION['carrinho'][$idProduto] = 1;
                }else{
                    $_SESSION['carrinho'][$idProduto]++;
                }
                $res = true;

                
            }else{
                $res = true;
            }
            return $res;
        }else if($post == true){
           
                $idProduto = (int)$itemid;
                if(isset($_SESSION['carrinho']) == false){
                    $_SESSION['carrinho'] = array();
                }
     

                if(isset($_SESSION['carrinho'][$idProduto]) == false){
                    $_SESSION['carrinho'][$idProduto] = $itemqtd;
                }else{
                    $_SESSION['carrinho'][$idProduto]+=$itemqtd;
                }
                $totalItemCart = \FeaturesCart::getTotalItenCart();
                $res = array(true, $totalItemCart);

        }else{
            $res = false;
        }
        return $res;

    }

    public static function getTotalAmount()
    {
        if(isset($_SESSION['carrinho'])){
            $itensCarrinho = $_SESSION['carrinho'];
            $totalCompra = 0;
            $descontoCompra = 0;
            foreach ($itensCarrinho as $key => $value) { 
                $idProduto = $key;
                $produto = \Painel::select('tb_admin.store_products','id = ?',array($idProduto));
                $valor = $value * \Painel::getAmountReal($produto['status_promotion'],$produto['value_promotion'],$produto['value']);
                
                $valorDesconto = $value * \Painel::getCalculateDesconto($produto['status_promotion'],$produto['value_promotion'],$produto['value'])[1];
                
                $descontoCompra+=$valorDesconto;
                $totalCompra+=$valor;
            }
            return $totalCompra;

        }else{
            return $totalCompra = 0;
        }
    }

    public static function getTotalAmountPromotion()
    {
        if(isset($_SESSION['carrinho'])){
            $itensCarrinho = $_SESSION['carrinho'];
            $totalCompra = 0;
            $descontoCompra = 0;
            foreach ($itensCarrinho as $key => $value) { 
                $idProduto = $key;
                $produto = \Painel::select('tb_admin.store_products','id = ?',array($idProduto));
                $valor = $value * \Painel::getAmountReal($produto['status_promotion'],$produto['value_promotion'],$produto['value']);
                
                $valorDesconto = $value * \Painel::getCalculateDesconto($produto['status_promotion'],$produto['value_promotion'],$produto['value'])[1];
                
                $descontoCompra+=$valorDesconto;
                $totalCompra+=$valor;
            }
            return $descontoCompra;

        }else{
            return $descontoCompra = 0;
        }
    }

    public static function getTotalAmountItemOnCart($itemid)
    {
        if(isset($_SESSION['carrinho'])){
            $itensCarrinho = $_SESSION['carrinho'];
            if(isset($itensCarrinho[$itemid]) != false){
                $qtdOfItem = (int)$itensCarrinho[$itemid];
                $item = \Painel::select('tb_admin.store_products','id = ?',array($itemid));
                $precoItem = \Painel::getAmountReal($item['status_promotion'],$item['value_promotion'],$item['value']);
                $totalIten = $precoItem*$qtdOfItem;
            }

            
  
            return $totalIten;


        }else{
            return  0;
        }
    }

    public static function removeItemCart($itemid)
    {
        if(isset($_SESSION['carrinho'])){
            unset($_SESSION['carrinho'][$itemid]);
            $totalItenCart = \FeaturesCart::getTotalItenCart();
            $totalAmount = \Painel::convertMoney(\FeaturesCart::getTotalAmount());
            $totalAmountPromotion = \Painel::convertMoney(\FeaturesCart::getTotalAmountPromotion());

            $res = array(true,$totalItenCart,$totalAmount,$totalAmountPromotion);
        }else{
            $tes = array(false,"","","");
        }

        return $res;
        
    }

}

?>