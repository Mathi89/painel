<?php
class Products
{
	public static function newproductcombo($nomeproduto, $preco, $precopromotion, $description, $type, $categorias, $estoque, $slug, $foto, $nomevariacao, $typevariacao, $qtdvariacao, $plataformarecarga, $objeto)
	{
		// VERIFICANDO SE O STATUS DA PROMOÇÃO SERÁ ATIVADA OU NÃO 
		// COM BASE SE O VALOR PROMOTION É 0 OU NÃO
		if ($precopromotion == "0" or $precopromotion == "") {
			$statuspromotion = 'off';
			$precopromotion = 0;
		} else {
			$statuspromotion = 'on';
			$precopromotion = $precopromotion;
		}

		// VERIFICANDO SE O ESTOQUE SERÁ ATIVADO OU DESATIVADO COM BASE EM 
		// SE A QUANTIDADE DE ESTOQUE FOI DEFINIDA 
		if ($estoque == "0" or $estoque == "") {
			$statusestoque = "off";
			$estoque = 0;
		} else {
			$statusestoque = "on";
			$estoque = $estoque;
		}

		// VERIFICANDO SE EXISTE ALGUN SLUG, SE FOR VAZIO O SISTEMA GERA UM SLUG
		if ($slug == "") {
			$slug = $nomeproduto;
		} else {
			$slug = $slug;
		}

		// GERANDO UM SLUG NO FORMATO CORRETO
		$newslug = \Painel::removeCaracterEspecial($slug);


		// VALIDANDO PREÇOS NO FORMATO AMARICANO
		$preco = \Painel::convertMoney($preco, "$");
		$precopromotion = \Painel::convertMoney($precopromotion, "$");


		$statusproduct = "on";


		$newslug = \Painel::newSlugOfNewProduct($newslug);



		// $idProduct = \Painel::select('tb_admin.store_products','slug = ?',array($newslug))['id'];

		// VALIDANDO QUANTIDADE DE IMG VALIDA
		// $qtdimg = 0;
		// $imgValida = 0;
		// $imgRecusada = 0;
		// foreach ($foto as $key => $img) {
		// 	$qtdimg++;

		// 	$validandoimg = \Painel::imagemValida($img);
		// 	if($validandoimg){

		// 		$imgValida++;
		// 	}else{

		// 		$imgRecusada++;
		// 	}

		// }

		// if($imgValida < 1){
		// 	//SE NAO HOUVER NENHUMA IMAGEM VALIDA O PRODUTO NAO CADASTRA

		// }else{

		// INSERINDO PRODUTO NO BANCO DE DADOS
		$arr = array(
			"nome_tabela" => "tb_admin.store_products",
			"title" => $nomeproduto,
			"description" => $description,
			"value" => $preco,
			"value_promotion" => $precopromotion,
			"status_promotion" => $statuspromotion,
			"category" => $categorias,
			"views_total" => null,
			"slug" => $newslug,
			"frame" => null,
			"type" => $type,
			"status_estoque" => $statusestoque,
			"qtdestoque" => $estoque,
			"status" => $statusproduct,
			"objeto" => $objeto


		);
		$inserir  = \Painel::insert($arr);

		if ($inserir) {

			$idProduct = \Painel::select('tb_admin.store_products', 'slug = ?', array($newslug))['id'];


			// DEIXANDO O ARRAY DE FOTOS EM UMA ESTRUTURA CORRETA
			$fotos = [];
			foreach ($foto as $attrName => $valuesArray) {
				foreach ($valuesArray as $key => $value) {
					$fotos[$key][$attrName] = $value;
				}
			}


			foreach ($fotos as $key => $img) {
				//  echo ($value['name']);

				$validandoimg = \Painel::imagemValida($img);
				if ($validandoimg) {

					$nameImg = \Painel::uploadImgProduct($img);
					$arr = array(
						"nome_tabela" => "tb_admin.imgproducts",
						"id_produto" => $idProduct,
						"img_produto" => $nameImg

					);
					$inserir  = \Painel::insert($arr);
				}
			}

			$idProduct = \Painel::select('tb_admin.store_products', 'slug = ?', array($newslug))['id'];
			$i = 0;
			foreach ($nomevariacao as $nomevariacaotext) {

				$typevariacaoo = $typevariacao[$i];
				$qtdvariacaoo = $qtdvariacao[$i];
				$plataformarecargah = $plataformarecarga[$i];


				$arrr = array(
					'nome_tabela' => 'tb_admin.combos_itens',
					'nome' => $nomevariacaotext,
					'qtd_itens' => $qtdvariacaoo,
					'plataforma' => $plataformarecargah,
					'type' => $typevariacaoo,
					'id_produto' => $idProduct,
					'status' => 'on'

				);


				$insertvariacao = \Painel::insert($arrr);
				// if($insertvariacao){
				// 	return true;
				// }else{
				// 	return false;
				// }

				$i++;
			}
		}

		// }




		return true;
	}

	public static function newproductvariacao($nomeproduto, $preco, $precopromotion, $description, $type, $categorias, $estoque, $slug, $foto, $nomevariacao, $typevariacao, $qtdvariacao, $precovariacao, $plataformarecarga, $objeto, $statuspromotion)
	{
		// VERIFICANDO SE O STATUS DA PROMOÇÃO SERÁ ATIVADA OU NÃO 
		

		// VERIFICANDO SE O ESTOQUE SERÁ ATIVADO OU DESATIVADO COM BASE EM 
		// SE A QUANTIDADE DE ESTOQUE FOI DEFINIDA 
		if ($estoque == "0" or $estoque == "") {
			$statusestoque = "off";
			$estoque = 0;
		} else {
			$statusestoque = "on";
			$estoque = $estoque;
		}

		// VERIFICANDO SE EXISTE ALGUN SLUG, SE FOR VAZIO O SISTEMA GERA UM SLUG
		if ($slug == "") {
			$slug = $nomeproduto;
		} else {
			$slug = $slug;
		}

		// GERANDO UM SLUG NO FORMATO CORRETO
		$newslug = \Painel::removeCaracterEspecial($slug);


		// VALIDANDO PREÇOS NO FORMATO AMARICANO
		$preco = \Painel::convertMoney($preco, "$");
		if($precopromotion  == ""){
			$precopromotion = "0.00";
		}
		$precopromotion = \Painel::convertMoney($precopromotion, "$");


		$statusproduct = "on";


		$newslug = \Painel::newSlugOfNewProduct($newslug);



		// $idProduct = \Painel::select('tb_admin.store_products','slug = ?',array($newslug))['id'];

		// VALIDANDO QUANTIDADE DE IMG VALIDA
		// $qtdimg = 0;
		// $imgValida = 0;
		// $imgRecusada = 0;
		// foreach ($foto as $key => $img) {
		// 	$qtdimg++;

		// 	$validandoimg = \Painel::imagemValida($img);
		// 	if($validandoimg){

		// 		$imgValida++;
		// 	}else{

		// 		$imgRecusada++;
		// 	}

		// }

		// if($imgValida < 1){
		// 	//SE NAO HOUVER NENHUMA IMAGEM VALIDA O PRODUTO NAO CADASTRA

		// }else{

		// INSERINDO PRODUTO NO BANCO DE DADOS
		$arr = array(
			"nome_tabela" => "tb_admin.store_products",
			"title" => $nomeproduto,
			"description" => $description,
			"value" => $preco,
			"value_promotion" => $precopromotion,
			"status_promotion" => $statuspromotion,
			"category" => $categorias,
			"views_total" => null,
			"slug" => $newslug,
			"frame" => null,
			"type" => $type,
			"status_estoque" => $statusestoque,
			"qtdestoque" => $estoque,
			"status" => $statusproduct,
			"objeto" => $objeto

		);
		$inserir  = \Painel::insert($arr);

		if ($inserir) {

			$idProduct = \Painel::select('tb_admin.store_products', 'slug = ?', array($newslug))['id'];


			// DEIXANDO O ARRAY DE FOTOS EM UMA ESTRUTURA CORRETA
			$fotos = [];
			foreach ($foto as $attrName => $valuesArray) {
				foreach ($valuesArray as $key => $value) {
					$fotos[$key][$attrName] = $value;
				}
			}


			foreach ($fotos as $key => $img) {
				//  echo ($value['name']);

				$validandoimg = \Painel::imagemValida($img);
				if ($validandoimg) {

					$nameImg = \Painel::uploadImgProduct($img);
					$arr = array(
						"nome_tabela" => "tb_admin.imgproducts",
						"id_produto" => $idProduct,
						"img_produto" => $nameImg

					);
					$inserir  = \Painel::insert($arr);
				}
			}

			$idProduct = \Painel::select('tb_admin.store_products', 'slug = ?', array($newslug))['id'];
			$i = 0;
			foreach ($nomevariacao as $nomevariacaotext) {

				$typevariacaoo = $typevariacao[$i];
				$qtdvariacaoo = $qtdvariacao[$i];
				$precovariacaoo = \Painel::convertMoney($precovariacao[$i], "$");
				$plataformarecargah = $plataformarecarga[$i];


				$arrr = array(
					'nome_tabela' => 'tb_admin.variacoes_produtos',
					'nome' => $nomevariacaotext,
					'qtd_itens' => $qtdvariacaoo,
					'plataforma' => $plataformarecargah,
					'type' => $typevariacaoo,
					'preco' => $precovariacaoo,
					'status_promotion'=>$statuspromotion,
					'value_promotion'=>$precopromotion,
					'id_produto' => $idProduct,
					'status' => 'on'

				);


				$insertvariacao = \Painel::insert($arrr);
				// if($insertvariacao){
				// 	return true;
				// }else{
				// 	return false;
				// }

				$i++;
			}
			
		}

		// }




		return true;
	}

	public static function editproduct($nomeproduto, $preco, $precopromotion, $description, $type, $categorias, $estoque, $slug,/* $foto, */ $objeto, $idproduto,$statuspromotion)
	{

		

		if ($objeto == "combo") {
			$objeto = $objeto;
		} else {
			$objeto = "produto";
		}


		// VALIDANDO PREÇOS NO FORMATO AMARICANO
		$preco = \Painel::convertMoney($preco, "$");
		$precopromotion = \Painel::convertMoney($precopromotion, "$");



		// VERIFICANDO SE O STATUS DA PROMOÇÃO SERÁ ATIVADA OU NÃO 
		

		// VERIFICANDO SE O ESTOQUE SERÁ ATIVADO OU DESATIVADO COM BASE EM 
		// SE A QUANTIDADE DE ESTOQUE FOI DEFINIDA 
		if ($estoque == "0" or $estoque == "") {
			$statusestoque = "off";
			$estoque = "0";
		} else {
			$statusestoque = "on";
			$estoque = $estoque;
		}

		// VERIFICANDO SE EXISTE ALGUN SLUG, SE FOR VAZIO O SISTEMA GERA UM SLUG
		if ($slug == "") {
			$slug = $nomeproduto;
		} else {
			$slug = $slug;
		}

		// GERANDO UM SLUG NO FORMATO CORRETO
		$newslug = \Painel::removeCaracterEspecial($slug);


		


		// $statusproduct = "on";


		$newslug = \Painel::editSlugOfEditProduct($newslug, $idproduto);

		if(!empty($nomeproduto) && !empty($preco) && !empty($categorias) && !empty($newslug) && !empty($objeto) && !empty($idproduto))
		{

		
		// INSERINDO PRODUTO NO BANCO DE DADOS
		$arr = array(
			"nome_tabela" => "tb_admin.store_products",
			"id" => $idproduto,
			"title" => $nomeproduto,
			"description" => $description,
			"value" => $preco,
			"value_promotion" => $precopromotion,
			"status_promotion" => $statuspromotion,
			"category" => $categorias,
			"slug" => $newslug,
			"status_estoque" => $estoque
			// "qtdestoque" => $estoque,
			// "status" => $statusproduct,
			// "objeto"=>$objeto

		);
		$update  = \Painel::update($arr);

		// INICIO PARA EDITAR AS FOTOS

		if ($update) {
			$res = true;
		} else {
			$res = false;
		}
	}else{
		$res = false;
	}



		return $res;
	}

	public static function editVariacaoExistente($idvariacao, $nome, $type, $qtd, $preco, $plataformarecarga, $idprodutoedit)
	{

		// var_dump($nome);


		$i = 0;
		$error = 0;
		foreach ($nome as $nomevariacaotext) {
			$idvariacaoo = $idvariacao[$i];
			$verifyexists = \Painel::select('tb_admin.variacoes_produtos', 'id = ? AND id_produto = ?', array($idvariacaoo, $idprodutoedit));
			if (isset($verifyexists['id'])) {

				$typevariacaoo = $type[$i];
				$qtdvariacaoo = $qtd[$i];

				// VALIDANDO PREÇOS NO FORMATO AMARICANO

				$precovariacaoo = \Painel::convertMoney($preco[$i], "$");
				$plataformarecargah = $plataformarecarga[$i];

				$arrr = array(
					'nome_tabela' => 'tb_admin.variacoes_produtos',
					'id' => $idvariacaoo,
					'nome' => $nomevariacaotext,
					'qtd_itens' => $qtdvariacaoo,
					'plataforma' => $plataformarecargah,
					'type' => $typevariacaoo,
					'preco' => $precovariacaoo,

				);


				$insertvariacao = \Painel::update($arrr);
				// if($insertvariacao){
				// 	return true;
				// }else{
				// 	return false;
				// }

				$i++;
			} else {
				$error++;
				break;
				$res = false;
			}
		}
		if ($error > 0) {
			$res = false;
		} else {
			$res = true;
		}

		return $res;
	}

	public static function editVariacaoComboExistente($idvariacao, $nome, $type, $qtd, $plataformarecarga, $idprodutoedit)
	{

		// var_dump($nome);


		$i = 0;
		$error = 0;
		foreach ($nome as $nomevariacaotext) {
			$idvariacaoo = $idvariacao[$i];
			$verifyexists = \Painel::select('tb_admin.combos_itens', 'id = ? AND id_produto = ?', array($idvariacaoo, $idprodutoedit));
			if (isset($verifyexists['id'])) {

				$typevariacaoo = $type[$i];
				$qtdvariacaoo = $qtd[$i];

				$plataformarecargah = $plataformarecarga[$i];

				$arrr = array(
					'nome_tabela' => 'tb_admin.combos_itens',
					'id' => $idvariacaoo,
					'nome' => $nomevariacaotext,
					'qtd_itens' => $qtdvariacaoo,
					'plataforma' => $plataformarecargah,
					'type' => $typevariacaoo,

				);


				$insertvariacao = \Painel::update($arrr);
				// if($insertvariacao){
				// 	return true;
				// }else{
				// 	return false;
				// }

				$i++;
			} else {
				$error++;
				break;
				$res = false;
			}
		}
		if ($error > 0) {
			$res = false;
		} else {
			$res = true;
		}

		return $res;
	}

	public static function addvariacaoonproduct($nome, $type, $qtd, $preco, $plataformarecarga, $idproduto)
	{

		$i = 0;
		foreach ($nome as $nomevariacaotext) {


			$typevariacaoo = $type[$i];
			$qtdvariacaoo = $qtd[$i];

			// VALIDANDO PREÇOS NO FORMATO AMARICANO
			$precovariacaoo = \Painel::convertMoney($preco[$i], "$");
			$plataformarecargah = $plataformarecarga[$i];


			$arrr = array(
				'nome_tabela' => 'tb_admin.variacoes_produtos',
				'nome' => $nomevariacaotext,
				'qtd_itens' => $qtdvariacaoo,
				'plataforma' => $plataformarecargah,
				'type' => $typevariacaoo,
				'preco' => $precovariacaoo,
				'id_produto' => $idproduto,
				'status' => 'on'

			);


			$insertvariacao = \Painel::insert($arrr);


			// if($insertvariacao){
			// 	return true;
			// }else{
			// 	return false;
			// }

			$i++;
		}


		return true;
	}

	public static function addvariacaocomboonproduct($nome, $type, $qtd, $plataformarecarga, $idproduto)
	{

		$i = 0;
		foreach ($nome as $nomevariacaotext) {


			$typevariacaoo = $type[$i];
			$qtdvariacaoo = $qtd[$i];

			$plataformarecargah = $plataformarecarga[$i];


			$arrr = array(
				'nome_tabela' => 'tb_admin.combos_itens',
				'nome' => $nomevariacaotext,
				'qtd_itens' => $qtdvariacaoo,
				'plataforma' => $plataformarecargah,
				'type' => $typevariacaoo,
				'id_produto' => $idproduto,
				'status' => 'on'

			);


			$insertvariacao = \Painel::insert($arrr);


			// if($insertvariacao){
			// 	return true;
			// }else{
			// 	return false;
			// }

			$i++;
		}


		return true;
	}

	public static function insertImgForEditProduct($idproduto,$foto,$jaexistefotoqtd)
	{
		if(!empty($foto)){

			$max_fotos = 6-$jaexistefotoqtd;
		$fotos = [];
		
		foreach ($foto as $attrName => $valuesArray) {
			foreach ($valuesArray as $key => $value) {
				$fotos[$key][$attrName] = $value;
			}
		}

		$contfotocadastrada = 0;
		foreach ($fotos as $key => $img) {
			$contfotocadastrada++;
			//  echo ($value['name']);

			$validandoimg = \Painel::imagemValida($img);
			if ($validandoimg) {

				$nameImg = \Painel::uploadImgProduct($img);
				$arr = array(
					"nome_tabela" => "tb_admin.imgproducts",
					"id_produto" => $idproduto,
					"img_produto" => $nameImg

				);
				$inserir  = \Painel::insert($arr);
			}

			if($contfotocadastrada >= $max_fotos){
				break;
			}
		}

		}
		return true;
	}

	public static function delVariaProductForSession($objeto = "produto")
	{
		if($objeto == "produto"){
			$table = "tb_admin.variacoes_produtos";
		}else{
			$table = "tb_admin.combos_itens";
		}
		if (isset($_SESSION['variadel'])) {
			$session_variadel = $_SESSION['variadel'];

			foreach ($session_variadel as $key => $id) {
				$delvaria = \Painel::delete($table, 'WHERE id = ?', array($id));
			}
			unset($session_variadel);
		}
		return true;
	}

	public static function delFotoProductForSession()
	{
		if (isset($_SESSION['fotodel'])) {
			$session_foto = $_SESSION['fotodel'];

			foreach ($session_foto as $key => $id) {
				$selname = Painel::select('tb_admin.imgproducts', 'id = ?', array($id));
				$delvaria = \Painel::delete('tb_admin.imgproducts', 'WHERE id = ?', array($id));
				\Painel::deleteImgProduct($selname['img_produto']);
			}
			unset($session_foto);
		}
		return true;
	}

	public static function newproduct($nomeproduto, $preco, $precopromotion, $description, $type, $categorias, $estoque, $slug, $foto, $objeto, $statuspromotion)
	{

		if ($objeto == "combo") {
			$objeto = $objeto;
		} else {
			$objeto = "produto";
		}
		// VERIFICANDO SE O STATUS DA PROMOÇÃO SERÁ ATIVADA OU NÃO 

		// VERIFICANDO SE O ESTOQUE SERÁ ATIVADO OU DESATIVADO COM BASE EM 
		// SE A QUANTIDADE DE ESTOQUE FOI DEFINIDA 
		if ($estoque == "0" or $estoque == "") {
			$statusestoque = "off";
			$estoque = 0;
		} else {
			$statusestoque = "on";
			$estoque = $estoque;
		}

		// VERIFICANDO SE EXISTE ALGUN SLUG, SE FOR VAZIO O SISTEMA GERA UM SLUG
		if ($slug == "") {
			$slug = $nomeproduto;
		} else {
			$slug = $slug;
		}

		// GERANDO UM SLUG NO FORMATO CORRETO
		$newslug = \Painel::removeCaracterEspecial($slug);


		// VALIDANDO PREÇOS NO FORMATO AMARICANO
		$preco = \Painel::convertMoney($preco, "$");
		$precopromotion = \Painel::convertMoney($precopromotion, "$");


		$statusproduct = "on";


		$newslug = \Painel::newSlugOfNewProduct($newslug);


		// INSERINDO PRODUTO NO BANCO DE DADOS
		$arr = array(
			"nome_tabela" => "tb_admin.store_products",
			"title" => $nomeproduto,
			"description" => $description,
			"value" => $preco,
			"value_promotion" => $precopromotion,
			"status_promotion" => $statuspromotion,
			"category" => $categorias,
			"views_total" => null,
			"slug" => $newslug,
			"frame" => null,
			"type" => $type,
			"status_estoque" => $statusestoque,
			"qtdestoque" => $estoque,
			"status" => $statusproduct,
			"objeto" => $objeto

		);
		$inserir  = \Painel::insert($arr);

		if ($inserir) {

			$idProduct = \Painel::select('tb_admin.store_products', 'slug = ?', array($newslug))['id'];


			// DEIXANDO O ARRAY DE FOTOS EM UMA ESTRUTURA CORRETA
			$fotos = [];
			foreach ($foto as $attrName => $valuesArray) {
				foreach ($valuesArray as $key => $value) {
					$fotos[$key][$attrName] = $value;
				}
			}


			foreach ($fotos as $key => $img) {
				//  echo ($value['name']);

				$validandoimg = \Painel::imagemValida($img);
				if ($validandoimg) {

					$nameImg = \Painel::uploadImgProduct($img);
					$arr = array(
						"nome_tabela" => "tb_admin.imgproducts",
						"id_produto" => $idProduct,
						"img_produto" => $nameImg

					);
					$inserir  = \Painel::insert($arr);
				}
			}
		}

		// }




		return true;
	}

	public static function deleteimgproduct($idproduct, $img = false, $idimg = false)
	{
		if ($img != false and $idimg != false) {

			$listimg = \Painel::select('tb_admin.imgproducts', 'id_produto = ? AND id = ?', array($idproduct, $idimg));

			\Painel::deleteimgproduct($listimg['img_produto']);

			$deleteimgBD = \Painel::delete('tb_admin.imgproducts', 'WHERE id_produto = ?', array($idimg));
			if ($deleteimgBD) {
				return true;
			} else {
				return false;
			}
		} else {

			$listimg = \Painel::selectAllQuery('tb_admin.imgproducts', 'WHERE id_produto = ?', array($idproduct));
			foreach ($listimg as $key => $value) {
				\Painel::deleteimgproduct($value['img_produto']);
			}

			$deleteimgBD = \Painel::delete('tb_admin.imgproducts', 'WHERE id_produto = ?', array($idproduct));

			if ($deleteimgBD) {
				return true;
			} else {
				return false;
			}
		}
	}
}
