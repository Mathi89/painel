<?php

namespace Controllers;

class CategoriasController extends Controller
{

	public function executar()
	{

		\Router::rota('categorias', function () {

			/*DASHBOARD IMOBILIARIA*/

				$list = \Models\CategoriasModel::getListCategory();
				$this->view = new \Views\MainView('categorias');
				$this->view->render(array($list));
				echo '
				<link rel="stylesheet" href="'.INCLUDE_CSS_T01.'categorias.css">
				<script src="'.INCLUDE_PATH_FULL.'javascript/categorias.js"></script>';	
			
		});

		\Router::rota('categorias/editstatus', function () {
			\Models\CategoriasModel::editstatus();
		});
		\Router::rota('categorias/deletecategoria', function () {
			\Models\CategoriasModel::deletecategoria();
		});

		
	}
}
