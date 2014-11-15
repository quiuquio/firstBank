<?php
require_once('pass.php');

session_start();
destroySessionIfRequired();
if (!isset($_SESSION["active"])) {
	$_SESSION["active"] = time();
	$key = new RSA();
	$_SESSION["skey"] = $key;
}
elseif ((time()-$_SESSION["active"]) < 900) {
	$_SESSION["active"] = time();
	$key = $_SESSION["skey"];
}
else {
	session_destroy();
	$key = NULL;
}

function destroySessionIfRequired(){
    if((isset($_POST['destroySection']) && !empty($_POST['destroySection']))){
            session_destroy();
    }
}

?>