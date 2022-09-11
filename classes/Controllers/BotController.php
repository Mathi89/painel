<?php

namespace Controllers;

class BotController extends Controller
{

	public function executar()
	{

		\Router::rota('bot', function () {

			/*DASHBOARD IMOBILIARIA*/


				$this->view = new \Views\MainView('bot');
				$this->view->render(array());
				echo '
				<link rel="stylesheet" href="'.INCLUDE_CSS_T01.'bot.css">
				<script src="'.INCLUDE_PATH_FULL.'javascript/bot.js"></script>';	
			
		});
		// \Router::rota('home', function () {
		// 	$this->view = new \Views\MainView('home');
		// 	$this->view->render(array('titulo' => 'Home'));
			
		// });

	

		
	}
}
