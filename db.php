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

function dbquery($sqlstr) {
	$result = mysql_query($sqlstr);
	if (!$result) {
		echo "<p>Invalid query</p>";
		return NULL;
	}
    return mysql_fetch_array($result);
}

?>