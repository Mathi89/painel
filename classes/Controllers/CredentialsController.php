<?php

namespace Controllers;

class CredentialsController extends Controller
{

	public function executar()
	{

		\Router::rota('credentials', function () {

				$credenciais = \Models\CredentialsModel::getCardPayment();
				$this->view = new \Views\MainView('credentials');
				$this->view->render(array($credenciais));
				echo '
				<link rel="stylesheet" href="'.INCLUDE_CSS_T01.'credentials.css">
				<script src="'.INCLUDE_PATH_FULL.'javascript/credentials.js"></script>';	
			
		});


		\Router::rota('credentials/atualizecredentials', function () {
			
			\Models\CredentialsModel::atualizecredentials();
		});

	

		
	}
}
