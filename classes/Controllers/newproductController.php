<?php

namespace Controllers;

class newproductController extends Controller
{

	public function executar()
	{

		\Router::rota('newproduct', function () {

			/*DASHBOARD IMOBILIARIA*/

				$infos = \Models\HomeModel::pagesDestaques();
				$this->view = new \Views\MainView('newproduct');
				$this->view->render(array($infos));
				echo '
				<link rel="stylesheet" href="'.INCLUDE_CSS_T01.'slick.css">
				<link rel="stylesheet" href="'.INCLUDE_CSS_T01.'newproduct.css">
				<script src="'.INCLUDE_PATH_FULL.'javascript/slick.js"></script>
				<script src="'.INCLUDE_PATH_FULL.'javascript/newproduct.js"></script>';	
			
		});

		\Router::rota('newproduct/newproduct', function () {
			\Models\NewproductModel::newproduct();
		});

		
	}
}
