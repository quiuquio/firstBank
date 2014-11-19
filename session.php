<?php
require_once('pass.php');
require_once('db.php');

session_start();
logout();
if (!isset($_SESSION["active"])) {
	$_SESSION["active"] = time();
	$key = new RSA();
	$db = new DB();
	$_SESSION["skey"] = $key;
	$_SESSION["db"] = $db;
	$_SESSION["login"] = 0;
}
elseif ((time()-$_SESSION["active"]) < 900) {
	$_SESSION["active"] = time();
	$key = $_SESSION["skey"];
	$db = $_SESSION["db"];
}
else {
	session_destroy();
	$key = NULL;
	$db = NULL;
}

function logout(){
    if((isset($_POST['logout']) && !empty($_POST['logout']))){
        session_destroy();
        session_start();
    }
}

?>