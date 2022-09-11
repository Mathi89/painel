<?php 
namespace Controllers;
class ViewimgController extends Controller
{
	
	public function executar()
	{


	// 	\Router::rota('param'or 'param/', function () {

		
	// 		$this->view = new \Views\MainView('param');
	// 		$this->view->render(array());
	// 		echo '
	// 		<link rel="stylesheet" href="'.INCLUDE_CSS_T01.'param.css">
	// 		<script src="'.INCLUDE_PATH_FULL.'javascript/param.js"></script>';	
		
	// });

		\Router::rota('viewimg', function(){
				
				
				if(isset($_GET['img'])){

					$img = $_GET['img'];
					$link = INCLUDE_PATH_VIEWS.'imgsproducts/'.$img;
					$this->view = new \Views\MainView('viewimg','','');
					$this->view->render(array($link));
				}else{
					return false;
				}
				

			
		});

	
	}
}
?>