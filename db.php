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
	$rows = array();
    while($row = mysql_fetch_array($result)) {
    	array_push($rows, $row);
    }
    return $rows;
}

function dbGetUid($username, $passwd) {
	$uid = -1;
	if (dbconnect($con)) {
		$sqlstr = "SELECT u_id FROM login WHERE user_name='".$username."' AND md5_pw1=MD5('".$passwd."')";
		$rows = dbquery($sqlstr);
		if (count($rows) > 0) {
			return $rows[0]["u_id"];
		}
	}
	return $uid;
}

function dbGetPrimeRates() {
	if (dbconnect($con)) {
		$sqlstr = "SELECT * FROM prime_rate ORDER BY e_date";
		$rows = dbquery($sqlstr);
		dbclose($con);
		return $rows;
	}
	return NULL;
}

?>