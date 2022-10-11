<?php

namespace Controllers;

class SettingsbasicController extends Controller
{

	public function executar()
	{

		\Router::rota('settingsbasic', function () {

				$infos = \Models\SettingsbasicModel::getInfos();
				$this->view = new \Views\MainView('settingsbasic');
				$this->view->render(array($infos));
				echo '
				<link rel="stylesheet" href="'.INCLUDE_CSS_T01.'settingsbasic.css">
				<script src="'.INCLUDE_PATH_FULL.'javascript/settingsbasic.js"></script>';	
			
		});


		\Router::rota('settingsbasic/edit', function () {
			
			\Models\SettingsbasicModel::edit();
		});

	

		
	}
}
