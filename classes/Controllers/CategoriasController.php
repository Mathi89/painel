<?php

namespace Controllers;

class CategoriasController extends Controller
{

	public function executar()
	{

		\Router::rota('categorias', function () {

			/*DASHBOARD IMOBILIARIA*/

				$infos = \Models\HomeModel::pagesDestaques();
				$this->view = new \Views\MainView('categorias');
				$this->view->render(array($infos));
				echo '
				<link rel="stylesheet" href="'.INCLUDE_CSS_T01.'categorias.css">
				<script src="'.INCLUDE_PATH_FULL.'javascript/categorias.js"></script>';	
			
		});

		// \Router::rota('produtos/boas_vindas', function () {
		// 	\Models\HomeModel::boas_vindas();
		// });

		
	}
}
