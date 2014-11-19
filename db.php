<?php

/**
* database functions
*/
class DB 
{

	protected $dbhost;
	protected $dbuser;
	protected $dbpw ;
	protected $dbname;

	public function __construct() {
		$this->dbhost = "localhost";
		$this->dbuser = "root";
		$this->dbpw = "24680";
		$this->dbname = "Ebanking";
	}

	public function serialize() {
		return serialize([$this->dbhost, $this->dbuser, $this->dbpw, $this->dbname]);
	}

	public function unserialize($data) {
		$keydata = unserialize($data);
		$this->dbhost = $keydata[0];
		$this->dbuser = $keydata[1];
		$this->dbpw = $keydata[2];
		$this->dbname = $keydata[3];
	}

	private function dbconnect(&$con) {
		$con = mysql_connect($this->dbhost, $this->dbuser, $this->dbpw);
		if (!$con) {
			return FALSE;
		}
		else {
			mysql_select_db($this->dbname, $con);
			return TRUE;
		}
	}

	private function dbclose($con) {
		mysql_close($con);
	}

	private function dbquery($sqlstr) {
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

	private function dbupdate($sqlstr) {
		$result = mysql_query($sqlstr);
		if (!$result) {
			echo "<p>DB error</p>";
			return FALSE;
		}
	    return TRUE;
	}

	public function getUid($username, $passwd) {
		$uid = -1;
		if ($this->dbconnect($con)) {
			$sqlstr = "SELECT u_id, pw2 FROM login WHERE user_name='".$username."' AND md5_pw1=MD5('".$passwd."')";
			$rows = $this->dbquery($sqlstr);
			$this->dbclose($con);
			//echo "<p>$sqlstr</p>";
			if (count($rows) > 0) {
				$_SESSION["pw2"] = $rows[0]["pw2"];
				return $rows[0]["u_id"];
			}
		}
		return $uid;
	}

	public function loginRecord($username, $uid, $method, $success) {
		if ($this->dbconnect($con)) {
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
			$result = $this->dbupdate($sqlstr);
			$this->dbclose($con);
			//echo "<p>$sqlstr</p>";
			return $result;
		}
		return FALSE;
	}

	public function getLastLogin() {
		if (isset($_SESSION["uid"]) && $_SESSION["login"]==1) {
			$uid = $_SESSION["uid"];
			if ($this->dbconnect($con)) {
				$sqlstr = "SELECT time FROM login_records WHERE u_id='$uid' AND success='1' AND (login_method='2st_pw' OR login_method='facial') ORDER BY time DESC";
				//echo "<p>$sqlstr</p>";
				$rows = $this->dbquery($sqlstr);
				$lastLogin = $rows[0]["time"];
				$this->dbclose($con);
				return $lastLogin;
			}
			return NULL;
		}
		return NULL;
	}

	public function setUserSession() {
		if (isset($_SESSION["uid"]) && $_SESSION["login"]==1) {
			$uid = $_SESSION["uid"];
			if ($this->dbconnect($con)) {
				// get accounts
				$sqlstr = "SELECT acct_no, acct_type FROM user_acct WHERE u_id='$uid'";
				$rows = $this->dbquery($sqlstr);
				$accts = array();
				for ($i=0; $i < count($rows); $i++) { 
					$accts[$rows[$i]["acct_no"]] = $rows[$i]["acct_type"];
				}
				$_SESSION["accts"] = $accts;

				// get user contact
				$sqlstr = "SELECT address FROM addresses WHERE u_id='$uid' AND status='active'";
				$row = $this->dbquery($sqlstr);
				$_SESSION["addr"] = $row[0]["address"];
				$sqlstr = "SELECT contact, info_type FROM contact_info WHERE u_id='$uid' AND status='active'";
				$rows = $this->dbquery($sqlstr);
				$_SESSION["contacts"] = $rows;

				// get user details
				$colstr = "first_name, last_name, title, YEAR(NOW())-YEAR(dob) AS age";
				$sqlstr = "SELECT $colstr FROM customer WHERE u_id='$uid'";
				$row = $this->dbquery($sqlstr);
				$_SESSION["firstn"] = $row[0]["first_name"];
				$_SESSION["lastn"] = $row[0]["last_name"];
				$_SESSION["title"] = $row[0]["title"];
				$_SESSION["age"] = $row[0]["age"];

				// get total balance
				$sqlstr = "SELECT SUM(balance) AS tbalance FROM user_acct WHERE u_id='$uid'";
				$row = $this->dbquery($sqlstr);
				$_SESSION["tbalance"] = $row[0]["tbalance"];

				// get targeted ad
				$this->targetAd();

				$this->dbclose($con);
/*
				//get transactions for each account
				$acctTansactions = array();
				for ($i=0; $i < count($accts); $i++) { 
					$acctNum = $accts[$i]["acct_no"];
					$acctTansactions[$acctNum] = $this->getTransactions($acctNum);
				}
				$_SESSION["acctTansactions"] = $acctTansactions;
*/				
				
				return TRUE;
			}
			return FALSE;
		}
		return FALSE;
	}

	public function getPrimeRates(&$curPR) {
		if ($this->dbconnect($con)) {
			$sqlstr = "SELECT * FROM Prime_Rate ORDER BY eff_date DESC";
			$rows = $this->dbquery($sqlstr);
			$curPR = $rows[0]["HS_prime_rate"];
			$this->dbclose($con);
			return $rows;
		}
		return NULL;
	}

	private function getTransactions($acctNum) {
		if ($this->dbconnect($con)) {
			$sqlstr = "SELECT * FROM transactions WHERE account_1_num='$acctNum'";
			$rows = $this->dbquery($sqlstr);
			$this->dbclose($con);
			return $rows;
		}
		return NULL;
	}

	private function getBalance($acctNum) {
		$balance = -1;
		if ($this->dbconnect($con)) {
			$sqlstr = "SELECT balance FROM user_acct WHERE acct_no='$acctNum'";
			$rows = $this->dbquery($sqlstr);
			$this->dbclose($con);
			if (count($rows) > 0) {
				$balance = $rows[0]["balance"];
			}
		}
		return $balance;
	}

	private function updateBalance($acctNum, $amount) {
		if ($this->dbconnect($con)) {
			$sqlstr = "UPDATE user_acct SET balance='$amount' WHERE acct_no='$acctNum'";
			$result = $this->dbupdate($sqlstr);
			$this->dbclose($con);
			return $result;
		}
		return FALSE;
	}

	private function addTransaction($acct1, $acct2, $transType, $amount, $ttid, $status, $fees, $remarks, $balance, $interBank) {
		if ($this->dbconnect($con)) {
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
			echo "<p>$sqlstr</p>";
			$result = $this->dbupdate($sqlstr);
			$this->dbclose($con);
			return $result;
		}
		return FALSE;
	}

	public function mTransfer($acct1, $acct2, $amount, $remarks, $ttid, $interBank) {

		if (isset($_SESSION["uid"]) && $_SESSION["login"]==1 && 
			isset($_SESSION["accts"]) && array_key_exists($acct1, $_SESSION["accts"])) {
			$acctBalance = $this->getBalance($acct1);
			if ($acctBalance < $amount) {
				return FALSE;
			}
			else {
				$newBalance = $acctBalance - $amount;
				$this->updateBalance($acct1, $newBalance);
				if (!$interBank) {
					$acctBalance2 = $this->getBalance($acct2);
					$newBalance2 = $acctBalance2 + $amount;
					$transType = "TTI";
					if ($ttid == NULL) {
						$transType = "TFI";
					}
					$this->updateBalance($acct2, $newBalance2);
					$this->addTransaction($acct2, $acct1, $transType, $amount, $ttid, "settled", "0", $remarks, $newBalance2, $interBank);
				}
				$transType = "TTO";
				if ($ttid == NULL) {
					$transType = "TFO";
				}
				$this->addTransaction($acct1, $acct2, $transType, $amount, $ttid, "settled", "0", $remarks, $newBalance, $interBank);
				return TRUE;
			}
		}
		return FALSE;
	}

	private function targetAd() {
		$vip = "Join FirstBank VIP clud today!";
		$masterprogram = "HKBU Master 2015-2016 open for register now.";
		$elderlytrip = "One day trip to Zhuhai $288.";
		$apartment = "180 degree sea view apartment";
		$defaultAd = "FirstBank, your first choice";

		$age = $_SESSION["age"];
		$balance = $_SESSION["tbalance"];

		$tad = array($defaultAd);
		if ($balance > 100000) {
			array_push($tad, $vip);
		}
		if ($age > 20 && $age < 30) {
			array_push($tad, $masterprogram);
		}
		if ($age >= 30) {
			array_push($tad, $apartment);
		}
		if ($age >= 60) {
			array_push($tad, $elderlytrip);
		}
		$_SESSION["tad"] = $tad;
	}

	public function checkTansactions()
	{
		if ($this->dbconnect($con)) {
			$sqlstr = "SELECT check_time, actual_amount FROM transaction_check ORDER BY check_time DESC";
			$rows = $this->dbquery($sqlstr);
			$lastChkTime = $rows[0]["check_time"];
			$lastAmount = $rows[0]["actual_amount"];
			$this->dbclose($con);
			return TRUE;
		}
		return FALSE;
	}

}

?>