<?php

namespace Controllers;

class newproductController extends Controller
{

	public function executar()
	{

		\Router::rota('newproduct', function () {
			$categorias = \Models\NewproductModel::getCategorias();
			
			// verificando se existe o parametro de edição de produto existente (get produtos)
			if(!isset($_GET['produto'])){

				
				$this->view = new \Views\MainView('newproduct');
				$this->view->render(array($categorias));

			}else{
				// veficando quando existe o parametro produtos se o ID contido nele é valido com algum produto cadastrado
				$id_produto = (int)$_GET['produto'];
				unset($_SESSION['variadel']);
				unset($_SESSION['fotodel']);
				$produto = \Models\NewproductModel::getInfoProduct($id_produto);
				$categoriaInProdu = \Models\NewproductModel::getCategoriaFromProduct($produto['category']);
				$images = \Models\NewproductModel::getImgaesProducts($id_produto);
				$variacao = \Models\NewproductModel::getVariacaoProducts($id_produto);
				$listSelects = \Models\CodigosModel::listSelects();

				if(isset($produto['id'])){

					$this->view = new \Views\MainView('newproduct');
					$this->view->render(array($categorias,$produto,$categoriaInProdu,$images,$variacao,$listSelects));

				}else{
					\Painel::redirect(INCLUDE_PATH."produtos");
				}
			}

				
				echo '
				<link rel="stylesheet" href="'.INCLUDE_CSS_T01.'slick.css">
				<link rel="stylesheet" href="'.INCLUDE_CSS_T01.'newproduct.css">
				<script src="'.INCLUDE_PATH_FULL.'javascript/slick.js"></script>
				<script src="'.INCLUDE_PATH_FULL.'javascript/newproduct.js"></script>';	

			
		});


		\Router::rota('newproduct/selects', function () {
			$res = \Models\NewproductModel::generateSelectsVariation();
			$precos = \Models\NewproductModel::generateInputPrecos();
			echo json_encode(array($res,$precos));
		});

		\Router::rota('newproduct/newproduct', function ()
		{
			$res =\Models\NewproductModel::newproduct();
			echo json_encode($res);
		});

		\Router::rota('newproduct/editproduct', function ()
		{
			$res = \Models\NewproductModel::editproduct();
			echo json_encode($res);
		});

		\Router::rota('newproduct/deleteimgconfirm', function ()
		{
			$res = \Models\NewproductModel::deleteimgconfirm();
			echo json_encode($res);
		});

		\Router::rota('newproduct/sessiondeletevaria', function ()
		{
			$res = \Models\NewproductModel::sessiondeletevaria();
			echo json_encode($res);
		});

		\Router::rota('newproduct/sessiondeleteimg', function ()
		{
			$res = \Models\NewproductModel::sessiondeleteimg();
			echo json_encode($res);
		});

		

		
	}
}
