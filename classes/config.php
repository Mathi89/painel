<?php

session_start();

date_default_timezone_set('America/Sao_Paulo');

$autoload = function ($class) {	
	$class = str_replace('\\','/',$class);
	
	if ($class == 'Email') {

		include('classes/phpmailer/PHPMailerAutoload.php');
	}

	$classMP = explode('/',$class);
	

	if ($classMP[0] != 'MercadoPago') {

		include('classes/'.$class.'.php');
	}
	
	


	
};

spl_autoload_register($autoload);

$script = $_SERVER['HTTP_HOST'];
define('DOMAIN', $script);
define('INCLUDE_PATH', 'http://localhost/painelplay/');
define('URL_LOJA', 'http://localhost/lojavirtualplay/');
define('INCLUDE_PATH_COLLECTION', INCLUDE_PATH.'collection/');
define('INCLUDE_PATH_LOGIN', INCLUDE_PATH . 'logar');
define('INCLUDE_PATH_SETTING', INCLUDE_PATH . 'settings/');
define('INCLUDE_PATH_FULL', INCLUDE_PATH . 'classes/Views/pages/');
define('INCLUDE_PATH_VIEWS', INCLUDE_PATH . 'classes/Views/');
define('BASE_DIR_PAINEL', __DIR__ . '/Views/pages/');
define('BASE_DIR_IMG', __DIR__ . '/Views');
define('BASE_DIR_INICIO', __DIR__ );
define('INCLUDE_CSS_T01', INCLUDE_PATH_FULL.'css/template01.css/');


//CREDENCIAIS DO MERCADO PAGO TESTE


//CREDENCIAIS DO MERCADO PAGO PRODUÇÃO
// define('PUBLIC_KEY', "APP_USR-c2913b6e-7023-480c-9696-6531a1b1d31a");
// define('ACESS_TOKEN', "APP_USR-1094940983729508-112222-d7d6071d4e07c536b962424fe53dd938-831948956");


// define('BASE_INCLUDE_CSS_T01', BASE_DIR_PAINEL.'css/template01.css/');

//DEFINIÇÕES DE EMAILS
define('EMAIL_GERAL', 'VEM DO BANCO DE DADOS');
define('PASS_GERAL', 'VEM DO BANCO DE DADOS');
define('NOME_GERAL', 'VEM DO BANCO DE DADOS');
define('HOME_GERAL', 'VEM DO BANCO DE DADOS');

// Conectar com banco de dados!
// define('HOST', 'localhost');
// define('USER', 'u281494465_adm_da_audienc');
// define('PASSWORD', 'bO&@Tn!CN$uowdqwb#786g8HGebQEJ4');
// define('DATABASE', 'u281494465_acesso_audienc');

define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DATABASE', 'lojaplay');

//Constantes para o painel de controle
define('NOME_EMPRESA', 'Play Variedades');

//Funções do painel
function pegaCargo($indice)
{
	return Painel::$cargos[$indice];
}
function selecionadoMenu(){}
function selectMenu($par)
{
	/*<i class="fa fa-angle-double-right" aria-hidden="true"></i>*/
	$url = explode('/', @$_GET['url'])[0];
	if($url != 'settings'){

		if ($url == $par) {
			echo 'active';
		}

	}else{

		$url = explode('/', @$_GET['url'])[1];
		if ($url == $par) {
			echo 'menu-active';
		}

	}
	
}
function WordMenu($par)
{
	
	$url = explode('/', @$_GET['url'])[0];
	if($url != 'settings'){

		if ($url == $par) {
			echo 'letra-active';
		}

	}else{

		$url = explode('/', @$_GET['url'])[1];
		if ($url == $par) {
			echo 'letra-active';
		}
		
	}
}

function verificaPermissaoMenu($permissao)
{
	if ($_SESSION['cargo'] <= $permissao) {
		return;
	} else {
		echo 'style="display:none;"';
	}
}

function verificaPermissaoPagina($permissao)
{
	if ($_SESSION['cargo'] <= $permissao) {
		return;
	} else {
		include('classes/Views/pages/error.php');
		die();
	}
}

function recoverPost($post)
{
	if (isset($_POST[$post])) {
		echo $_POST[$post];
	}
}
?>