<?php

namespace Controllers;

class newcategoryController extends Controller
{

	public function executar()
	{

		\Router::rota('newcategory', function () {

			/*DASHBOARD IMOBILIARIA*/

				$infos = \Models\HomeModel::pagesDestaques();
				$this->view = new \Views\MainView('newcategory');
				$this->view->render(array($infos));
				echo '
				<link rel="stylesheet" href="'.INCLUDE_CSS_T01.'newcategory.css">
				<script src="'.INCLUDE_PATH_FULL.'javascript/newcategory.js"></script>';	
			
		});

		\Router::rota('newcategory/newcategory', function () {
			\Models\NewcategoryModel::newcategory();
		});

		
	}
}
