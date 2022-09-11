<?php

class Application 
{
	
	public function executar()
	{
		// if(Painel::logado() == true && @explode('/',$_GET['url'])[0] != 'settings' || $_GET['url'] == 'logar' || $_GET['url'] == 'pass' || $_GET['url'] == 'recuperar' || $_GET['url'] == 'email'){
		// 	$url = isset($_GET['url']) ? explode('/',$_GET['url'])[0] : 'Home';
		// 	$url = ucfirst($url);
		// 	$url.="Controller";
		// 	if(file_exists('classes/Controllers/'.$url.'.php')){
		// 		$className = 'Controllers\\'.$url;
		// 		$controller = new $className;
		// 		$controller->executar();
				
		// 	}else {
					
		// 			die('Essa pagina não existe');
		// 		}; 
			
		// }else {
		// 			//echo '<script>document.location="'.INCLUDE_PATH_LOGIN.'"</script>';
		// 			Header('Location:'.INCLUDE_PATH_LOGIN,false);
		// 			die();
		// 		}; 

		if(Painel::logado() == true && @explode('/',$_GET['url'])[0] != 'settings' || $_GET['url'] == 'logar' ||  $_GET['url'] == 'reference_email' || $_GET['url'] == 'pass' || $_GET['url'] == 'recuperar' || $_GET['url'] == 'email' AND explode('/',$_GET['url'])[0] != 'viewimg'){
			$url = isset($_GET['url']) ? explode('/',$_GET['url'])[0] : 'Home';
			$url = ucfirst($url);
			$url.="Controller";
			if(file_exists('classes/Controllers/'.$url.'.php')){
				$className = 'Controllers\\'.$url;
				$controller = new $className;
				$controller->executar();
				
			}else {
					
				include(BASE_DIR_PAINEL.'erro404.php');
				}; 
			
		}else if(Painel::logado() == true AND explode('/',$_GET['url'])[0] == 'settings' AND explode('/',$_GET['url'])[0] != 'viewimg'){	
			if(!isset(explode('/',$_GET['url'])[1]) || explode('/',$_GET['url'])[1] == '' ){$geturl1 = 'settingshome' ;}else{ $geturl1 = explode('/',$_GET['url'])[1];}
			$url = $geturl1;
			$url = ucfirst($url);
			$url.="Controller";
			if(file_exists('classes/Controllers/'.$url.'.php')){
			$className = "Controllers\\".$url;
			$controller = new $className;
			$controller->executar();
			
		

				}else {
					
					include(BASE_DIR_PAINEL.'erro404.php');
				}; 
			}else if(explode('/',$_GET['url'])[0] == 'viewimg'){	

				if(!isset(explode('/',$_GET['url'])[1]) || explode('/',$_GET['url'])[1] == '' ){$geturl1 = 'viewimg' ;}else{ $geturl1 = 'viewimg'/* explode('/',$_GET['url'])[1] */;}
				$url = $geturl1;
				$url = ucfirst($url);
				$url.="Controller";
				if(file_exists('classes/Controllers/'.$url.'.php')){
				$className = "Controllers\\".$url;
				$controller = new $className;
				
				$controller->executar();
			
		

				}else {
					
					include(BASE_DIR_PAINEL.'erro404.php');
					die();
					
				}; 

			}

			
			else {
				//echo '<script>document.location="'.INCLUDE_PATH_LOGIN.'"</script>';
				Header('Location:'.INCLUDE_PATH_LOGIN,false);
				die();
			}; 


		
	}
}
?>