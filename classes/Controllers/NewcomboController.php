<?php

namespace Controllers;

class NewcomboController extends Controller
{

	public function executar()
	{

		\Router::rota('newcombo', function () {
			$categorias = \Models\NewproductModel::getCategorias();

			// verificando se existe o parametro de edição de produto existente (get produtos)
			if(!isset($_GET['produto'])){

				$this->view = new \Views\MainView('newcombo');
				$this->view->render(array($categorias));


			}else{
				$id_produto = (int)$_GET['produto'];
				unset($_SESSION['variadel']);
				unset($_SESSION['fotodel']);
				$produto = \Models\NewcomboModel::getInfoProduct($id_produto);
				$categoriaInProdu = \Models\NewcomboModel::getCategoriaFromProduct($produto['category']);
				$images = \Models\NewcomboModel::getImgaesProducts($id_produto);
				$variacao = \Models\NewcomboModel::getVariacaoProducts($id_produto);
				$listSelects = \Models\CodigosModel::listSelects();

				if(isset($produto['id'])){
				
				$this->view = new \Views\MainView('newcombo');
				$this->view->render(array($categorias,$produto,$categoriaInProdu,$images,$variacao,$listSelects));
					

				}else{
					\Painel::redirect(INCLUDE_PATH."produtos");
				}

				
			}

			echo '
				<link rel="stylesheet" href="'.INCLUDE_CSS_T01.'newcombo.css">
				<script src="'.INCLUDE_PATH_FULL.'javascript/newcombo.js"></script>';
			
		});

		\Router::rota('newcombo/newcombo', function () {
			$res = \Models\NewcomboModel::newcombo();
			echo json_encode($res);
		});

		\Router::rota('newcombo/sessiondeletevaria', function ()
		{
			$res = \Models\NewcomboModel::sessiondeletevaria();
			echo json_encode($res);
		});

		\Router::rota('newcombo/sessiondeleteimg', function ()
		{
			$res = \Models\NewcomboModel::sessiondeleteimg();
			echo json_encode($res);
		});

		\Router::rota('newcombo/editproduct', function ()
		{
			$res = \Models\NewcomboModel::editproduct();
			echo json_encode($res);
		});

		\Router::rota('newcombo/selects', function () {
			echo \Models\NewcomboModel::generateSelectsVariation();
		});


		
	}
}
