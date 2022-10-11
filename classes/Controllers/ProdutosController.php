<?php

namespace Controllers;

class ProdutosController extends Controller
{

	public function executar()
	{

		\Router::rota('produtos', function () {

			/*DASHBOARD IMOBILIARIA*/

				$listprodutos = \Models\ProdutosModel::getListProdutos();
				$this->view = new \Views\MainView('produtos');
				$this->view->render(array($listprodutos));
				echo '
				<link rel="stylesheet" href="'.INCLUDE_CSS_T01.'produtos.css">
				<script src="'.INCLUDE_PATH_FULL.'javascript/produtos.js"></script>';	
			
		});

		\Router::rota('produtos/editstatus', function () {
			\Models\ProdutosModel::editstatus();
		});

		\Router::rota('produtos/deleteproduto', function () {
			\Models\ProdutosModel::deleteproduto();
		});

		\Router::rota('produtos/deleteimgproduct', function()
		{
			if(isset($_POST['idproduct'])){
				$idproduct = $_POST['idproduct'];

				

				if(isset($_POST['idimg'])){
					$idimg = $_POST['idimg'];

				}else{
					$idimg = false;
				}

				if(isset($_POST['img'])){
					$img = $_POST['img'];

				}else{
					$img = false;
				}


				$res = \Products::deleteimgproduct($idproduct,$img,$idimg);

			}else{
				$res = false;
			}
			
			echo json_encode($res);

		});

		
	}
}
