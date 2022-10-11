<?php

namespace Controllers;

class CodigosController extends Controller
{

	public function executar()
	{

		\Router::rota('codigos', function () {

			/*DASHBOARD IMOBILIARIA*/


				$qtddisponivel = \Models\CodigosModel::getTotalCodigos('disponivel');
				$qtdusados = \Models\CodigosModel::getTotalCodigos('usados');
				$listSelects = \Models\CodigosModel::listSelects();
				$this->view = new \Views\MainView('codigos');
				$this->view->render(array($qtddisponivel,$qtdusados,$listSelects));
				echo '
				<link rel="stylesheet" href="'.INCLUDE_CSS_T01.'codigos.css">
				<script src="'.INCLUDE_PATH_FULL.'javascript/codigos.js"></script>';	

				
			
		});
		

		\Router::rota('codigos/addcodigos', function () {
			
			$res = \Models\CodigosModel::addcodigos();

			echo json_encode($res);
		});

	

		
	}
}
