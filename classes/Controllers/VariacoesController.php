<?php

namespace Controllers;

class VariacoesController extends Controller
{

	public function executar()
	{

		\Router::rota('variacoes', function () {

			/*DASHBOARD IMOBILIARIA*/

				$list = \Models\VariacoesModel::getListCategory();
				$this->view = new \Views\MainView('variacoes');
				$this->view->render(array($list));
				echo '
				<link rel="stylesheet" href="'.INCLUDE_CSS_T01.'variacoes.css">
				<script src="'.INCLUDE_PATH_FULL.'javascript/variacoes.js"></script>';	
			
		});

		\Router::rota('variacoes/editstatus', function () {
			\Models\VariacoesModel::editstatus();
		});
		\Router::rota('variacoes/deletecategoria', function () {
			\Models\VariacoesModel::deletecategoria();
		});

		
	}
}
