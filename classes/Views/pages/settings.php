<?php 
$table = 'rv_admin_business';
$query = 'user_login_id';
$arr = array($_SESSION['id_user']);
$id_user = $_SESSION['id_user'];

?>
<html lang="pt-br">
  <head>
  	<link rel="stylesheet" href="<?= INCLUDE_PATH_PAINEL ?>css/painelstyle.css">
  	<title>Configurações</title>
  </head>
  <body>
  		<section class="sectionSetting">
  			<div class="ConteudSettings">
  				<div class="divForm">
  					<form method="post">


  						<div class="titleForm">
  								<h2 class="titleSocial">Configurações</h2>
  							</div>

  							<?php
  								if(isset($_POST['acao'])){
  									$nomeEmp = $_POST['nomeEmp'];
  									$emailEmp = $_POST['emailEmp'];
  									$telEmp = $_POST['telEmp'];
  									$whatsEmp = $_POST['whatsEmp'];
  									$reotnoEmailEmp = $_POST['reotnoEmailEmp'];
  									$messagerEmp = $_POST['messagerEmp'];
  									$facebookEmp = $_POST['facebookEmp'];
  									$twitterEmp = $_POST['twitterEmp'];
  									$instagramEmp = $_POST['instagramEmp'];
  									$msgwhatsEmp = $_POST['msgwhatsEmp'];


  									$sql1 = MySql::conectar()->prepare("UPDATE `rv_admin_login` SET  nome_user = ?, email_user = ? WHERE id_user = ?");
  									$sql1->execute(array($nomeEmp, $emailEmp, $id_user));

  									$sql = MySql::conectar()->prepare("UPDATE `rv_admin_business` SET  nomeEmp = ?, emailEmp = ?, telEmp = ?, whatsnumberEmp = ?, msgEmailEmp = ?, messageEmp = ?, facebookEmp = ?, twitterEmp = ?, instagramEmp = ?, msgwhatEmp = ? WHERE user_login_id = ?");

  									if($sql->execute(array($nomeEmp, $emailEmp, $telEmp, $whatsEmp, $reotnoEmailEmp, $messagerEmp, $facebookEmp, $twitterEmp, $instagramEmp, $msgwhatsEmp, $id_user))){
  										Painel::redirect(INCLUDE_PATH_PAINEL.'settings');
  									}else { 
  										echo 'Algo deu errado';
  									}
  								}
  								$info = Painel::select($table,$query,$arr);
  							?>

  						<div class="gridemailNomeivForm">

  							<div class="divseparate divNomeForm">
  								<span class="spanform form-nomeEmpresa">Nome da Empresa</span>
  								<input class="inputform" type="text" value="<?= $info['nomeEmp'] ?>" name="nomeEmp" required="required">
  							</div>
  							<div class="divseparate divNomeForm">
  								<span class="spanform form-nomeEmpresa">E-mail da empresa</span>
  								<input class="inputform" type="email" value="<?= $info['emailEmp'] ?>" name="emailEmp" required="required" >
  							</div>

  						</div>
  						<div class="gridheredivForm">

  							<div class="divseparate divNumeroForm">
  								<span class="spanform form-teleEmpresa">Número de telefone</span>
  								<input class="inputform" type="tel" value="<?= $info['telEmp'] ?>" name="telEmp" required="required">
  							</div>
  							<div class="divseparate divNomeForm">
  								<span class="spanform form-whatsEmpresa">Número de Whatsapp</span>
  								<input class="inputform" type="tel" value="<?= $info['whatsnumberEmp'] ?>" name="whatsEmp" required="required" >
  							</div>

  						</div>

  						<div class="divseparate mensagembox divtextemailForm">
  								<span class="spanform form-emensagemretornoEmpresa">Mensagem de retorno email</span>
  								<textarea class="inputform textareaform"  name="reotnoEmailEmp" required="required" ><?= $info['msgEmailEmp'] ?></textarea>
  							</div>

  							<div class="titleForm">
  								<h2 class="titleSocial">Redes sociais</h2>
  							</div>


  							<div class="gridheredivForm">

  							<div class="divseparate divmessageForm">
  								<span class="spanform form-messageEmpresa">Link do messager</span>
  								<input class="inputform" type="url" value="<?= $info['messageEmp'] ?>" name="messagerEmp" required="required">
  							</div>
  							<div class="divseparate divfacebookForm">
  								<span class="spanform form-facebookEmpresa">Link do Facebook</span>
  								<input class="inputform" type="url" value="<?= $info['facebookEmp'] ?>" name="facebookEmp" required="required" >
  							</div>
  						</div>


  							<div class="gridheredivForm">

  							<div class="divseparate divtwitterForm">
  								<span class="spanform form-twitterEmpresa">Link do youtube</span>
  								<input class="inputform" type="url" value="<?= $info['twitterEmp'] ?>" name="twitterEmp" required="required">
  							</div>
  							<div class="divseparate divinstagramForm">
  								<span class="spanform form-instagramEmpresa">Link do instagram</span>
  								<input class="inputform" type="url" value="<?= $info['instagramEmp'] ?>" name="instagramEmp" required="required" >
  							</div>
  						</div>

  						<div class="divseparate mensagembox divmensagemwhatsForm">
  								<span class="spanform form-mensagemwhatsEmpresa">Mensagem do whatsapp</span>
  								<textarea class="inputform textareaform"  name="msgwhatsEmp" required="required" ><?= $info['msgwhatEmp'] ?></textarea>
  							</div>




  							<div class="centerall">
  							

  						<button class="buttonform" name="acao">Salvar</button>
							</div>
  					</form>
  				</div>
  			</div>
  		</section>
  </body>
  </html>