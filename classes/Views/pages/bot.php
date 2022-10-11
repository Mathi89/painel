<?php
if(!file_exists('classes/config.php')){

    $host = $_SERVER['HTTP_HOST'];
    header("Location: http://".$host."/");
    die();
    
}

?>
<iframe class="iframe-qrcode" src="<?= URL_BOT_PAINEL ?>" scrolling="no" ></iframe>
