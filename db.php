<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpw = "24680";
$dbname = "Ebanking";

function dbconnect(&$con) {
	global $dbhost, $dbuser, $dbpw, $dbname;
	
	$con = mysql_connect($dbhost, $dbuser, $dbpw);
	if (!$con) {
		return FALSE;
	}
	else {
		mysql_select_db($dbname, $con);
		return TRUE;
	}
}

function dbclose($con) {
	mysql_close($con);
}

?>