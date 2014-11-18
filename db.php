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

function dbupdate($sqlstr) {
	$result = mysql_query($sqlstr);
	if (!$result) {
		echo "<p>DB error</p>";
		return FALSE;
	}
    return TRUE;
}

function dbGetUid($username, $passwd) {
	$uid = -1;
	if (dbconnect($con)) {
		$sqlstr = "SELECT u_id, pw2 FROM login WHERE user_name='".$username."' AND md5_pw1=MD5('".$passwd."')";
		$rows = dbquery($sqlstr);
		dbclose($con);
		if (count($rows) > 0) {
			$_SESSION["pw2"] = $rows[0]["pw2"];
			return $rows[0]["u_id"];
		}
	}
	return $uid;
}

function loginRecord($username, $uid, $method, $success) {
	if (dbconnect($con)) {
		$colstr = "login_method, success";
		$valstr = "'$method', '$success'";
		if ($username != NULL) {
			$colstr .= ", user_name";
			$valstr .= ", '$username'";
		}
		if ($uid != NULL) {
			$colstr .= ", u_id";
			$valstr .= ", '$uid'";
		}
		$sqlstr = "INSERT INTO login_records ($colstr) VALUES ($valstr)";
		$result = dbupdate($sqlstr);
		dbclose($con);
		//echo "<p>$sqlstr</p>";
		return $result;
	}
	return FALSE;
}

function getLastLogin($uid) {
	if (dbconnect($con)) {
		$sqlstr = "SELECT time FROM login_records WHERE u_id='$uid' AND success='1' ORDER BY time DESC";
		$rows = dbquery($sqlstr);
		$lastLogin = $rows[0]["time"];
		dbclose($con);
		return $lastLogin;
	}
	return NULL;
}

function dbGetPrimeRates(&$curPR) {
	if (dbconnect($con)) {
		$sqlstr = "SELECT * FROM Prime_Rate ORDER BY eff_date DESC";
		$rows = dbquery($sqlstr);
		$curPR = $rows[0]["rate"];
		dbclose($con);
		return $rows;
	}
	return NULL;
}

function getTransactions($acctNum) {
	if (dbconnect($con)) {
		$sqlstr = "SELECT * FROM transactions WHERE account_1_num='$acctNum'";
		$rows = dbquery($sqlstr);
		dbclose($con);
		return $rows;
	}
	return NULL;
}

function getBalance($acctNum) {
	$balance = -1;
	if (dbconnect($con)) {
		$sqlstr = "SELECT balance FROM user_acct WHERE acct_no='$acctNum'";
		$rows = dbquery($sqlstr);
		dbclose($con);
		if (count($rows) > 0) {
			$balance = $rows[0]["balance"];
		}
	}
	return $balance;
}

function updateBalance($acctNum, $amount) {
	if (dbconnect($con)) {
		$sqlstr = "UPDATE user_acct SET balance='$amount' WHERE acct_no='$acctNum'";
		$result = dbupdate($sqlstr);
		dbclose($con);
		return $result;
	}
	return FALSE;
}

function addTransaction($acct1, $acct2, $transType, $amount, $ttid, $status, $fees, $remarks, $balance, $interBank) {
	if (dbconnect($con)) {
		$colstr = "account_1_num, transaction_type, amount, t_status, current_balance, t_interbank";
		$valstr = "'$acct1', '$transType', '$amount', '$status', '$balance', '$interBank'";
		if ($acct2 != NULL) {
			$colstr .= ", account_2_num";
			$valstr .= ", '$acct2'";
		}
		if ($ttid != NULL) {
			$colstr .= ", tt_id";
			$valstr .= ", '$ttid'";
		}
		if ($fees != NULL) {
			$colstr .= ", t_fees";
			$valstr .= ", '$fees'";
		}
		if ($remarks != NULL) {
			$colstr .= ", remarks";
			$valstr .= ", '$remarks'";
		}
		$sqlstr = "INSERT INTO transactions ($colstr) VALUES ($valstr)";
		//echo "<p>$sqlstr</p>";
		$result = dbupdate($sqlstr);
		dbclose($con);
		return $result;
	}
	return FALSE;
}

function mTransfer($acct1, $acct2, $amount, $remarks, $ttid, $interBank) {
	$acctBalance = getBalance($acct1);
	if ($acctBalance < $amount) {
		return FALSE;
	}
	else {
		$newBalance = $acctBalance - $amount;
		updateBalance($acct1, $newBalance);
		if (!$interBank) {
			$acctBalance2 = getBalance($acct2);
			$newBalance2 = $acctBalance2 + $amount;
			$transType = "TTI";
			if ($ttid == NULL) {
				$transType = "TFI";
			}
			updateBalance($acct2, $newBalance2);
			addTransaction($acct2, $acct1, $transType, $amount, $ttid, "settled", "0", $remarks, $newBalance2, $interBank);
		}
		$transType = "TTO";
		if ($ttid == NULL) {
			$transType = "TFO";
		}
		addTransaction($acct1, $acct2, $transType, $amount, $ttid, "settled", "0", $remarks, $newBalance, $interBank);
	}
}

?>