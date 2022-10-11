<?php

namespace Controllers;

class RespostasController extends Controller
{

	public function executar()
	{

		\Router::rota('respostas', function () {

			/*DASHBOARD IMOBILIARIA*/


				$respostas = \Models\RespostasModel::getRespostasBot();
					$this->view = new \Views\MainView('respostas');
					$this->view->render(array($respostas));

				echo '
				<link rel="stylesheet" href="'.INCLUDE_CSS_T01.'respostas.css">
				<script src="'.INCLUDE_PATH_FULL.'javascript/respostas.js"></script>';	

				
			
		});
		

		\Router::rota('respostas/deletemsg', function () {
			$res = \Models\RespostasModel::deletemsg();
			echo json_encode($res);
		});

		\Router::rota('respostas/editstatusmsg', function () {
			$res = \Models\RespostasModel::editstatusmsg();
			// echo json_encode($res);
		});

	

		
	}
}
