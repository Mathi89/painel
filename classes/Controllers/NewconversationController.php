<?php

namespace Controllers;

class NewconversationController extends Controller
{

	public function executar()
	{

		\Router::rota('newconversation', function () {

				$qtddisponivel = \Models\CodigosModel::getTotalCodigos('disponivel');
				$qtdusados = \Models\CodigosModel::getTotalCodigos('usados');

				if(!isset($_GET['msg'])){

					$this->view = new \Views\MainView('newconversation');
					$this->view->render(array($qtddisponivel,$qtdusados));

				}else{
					$id_mensagem = (int)$_GET['msg'];
					$msg = \Painel::select('tb_admin.respostas','id = ?',array($id_mensagem));

					if(isset($msg['pergunta'])){
						$this->view = new \Views\MainView('newconversation');
						$this->view->render(array($qtddisponivel,$qtdusados,'infomsg'=>$msg));
					}else{
						\Painel::redirect(INCLUDE_PATH."respostas");
					}
				}
				echo '
				<link rel="stylesheet" href="'.INCLUDE_CSS_T01.'newconversation.css">
				<script src="'.INCLUDE_PATH_FULL.'javascript/newconversation.js"></script>';	

				
			
		});
		

		\Router::rota('newconversation/addresposta', function () {
			
			$res = \Models\NewconversationModel::addresposta();

		});

		\Router::rota('newconversation/editresposta', function () {
			
			$res = \Models\NewconversationModel::editresposta();

		});

	

		
	}
}
