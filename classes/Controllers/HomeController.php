<?php

namespace Controllers;

class HomeController extends Controller
{

	public function executar()
	{

		\Router::rota('', function () {


				$infostoday = \Models\HomeModel::getInfoToday();
				$infosmes = \Models\HomeModel::getInfoMes();
				$resplataforma = \Models\HomeModel::getQtdPlataforma();
				$getLastPayments = \Models\HomeModel::getLastPayments();
				$this->view = new \Views\MainView('home');
				$this->view->render(array($infostoday,$infosmes,$resplataforma,$getLastPayments));
				echo '
				<link rel="stylesheet" href="'.INCLUDE_CSS_T01.'home.css">
				<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
				<script src="'.INCLUDE_PATH_FULL.'javascript/home.js"></script>';	
			
		});
		// \Router::rota('home', function () {
		// 	$this->view = new \Views\MainView('home');
		// 	$this->view->render(array('titulo' => 'Home'));
			
		// });

		\Router::rota('home/trocar_primeira_senha', function () {
			\Models\HomeModel::trocar_primeira_senha();
		});
		\Router::rota('home/boas_vindas', function () {
			\Models\HomeModel::boas_vindas();
		});

		
	}
}
