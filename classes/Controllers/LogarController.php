<?php 
namespace Controllers;
class LogarController extends Controller
{
	

	public function executar(){
		
		\Router::rota('logar', function(){
			
			$this->view = new \Views\MainView('logar','','');
			$this->view->render(array('titulo'=>'Login'));
			echo '<link rel="stylesheet" href="'.INCLUDE_CSS_T01.'styleLogin.css">
			<script src="'.INCLUDE_PATH_FULL.'javascript/loginRedefinir.js"></script>';
			
			if(isset($_POST['acaoLo'])){ \Models\LogarModel::login(); };
			if(isset($_POST['acaoRe'])){ \Models\LogarModel::RecuperarSenha();};
			if(isset($_POST['acaoEM'])){ \Models\LogarModel::AlterarEmail();};
			
		});
		
	}
}
?>