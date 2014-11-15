<?php
require_once('pass.php');

session_start();
logout();
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

function logout(){
    if((isset($_POST['logout']) && !empty($_POST['logout']))){
        session_destroy();
    }
}

?>