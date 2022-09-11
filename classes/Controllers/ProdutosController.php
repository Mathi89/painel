<?php

namespace Controllers;

class ProdutosController extends Controller
{

	public function executar()
	{

		\Router::rota('produtos', function () {

			/*DASHBOARD IMOBILIARIA*/

				$infos = \Models\HomeModel::pagesDestaques();
				$this->view = new \Views\MainView('produtos');
				$this->view->render(array($infos));
				echo '
				<link rel="stylesheet" href="'.INCLUDE_CSS_T01.'produtos.css">
				<script src="'.INCLUDE_PATH_FULL.'javascript/produtos.js"></script>';	
			
		});

		// \Router::rota('produtos/boas_vindas', function () {
		// 	\Models\HomeModel::boas_vindas();
		// });

		
	}
}
