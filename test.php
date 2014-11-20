<?php
/*require_once('pass.php');

session_start();
if (!isset($_SESSION["active"])) {
	$_SESSION["active"] = time();
	$key = new RSA();
	$_SESSION["skey"] = $key;
}
elseif ((time()-$_SESSION["active"]) < 20) {
	$_SESSION["active"] = time();
	$key = $_SESSION["skey"];
}
else {
	session_destroy();
	$key = NULL;
}
*/
require_once('session.php');


$encrypted = "";
$output = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$encrypted = $_POST["instr"];
	if ($key==NULL) {
		$output = "session timeout";
	}
	else {
		$output = $key->decrypt($encrypted);
		if ($output == "") {
			$output = "decrypt failed";
		}
	}
}


?>
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="js/jsbn.js"></script>
	<script type="text/javascript" src="js/prng4.js"></script>
	<script type="text/javascript" src="js/rng.js"></script>
	<script type="text/javascript" src="js/rsa.js"></script>
	<script type="text/javascript">
		
		function encryptdata() {
			var keyn = "<?php echo ($key==NULL)? 0:$key->rsa_n; ?>";
			var keye = "<?php echo ($key==NULL)? 0:$key->rsa_e; ?>";

			if (keyn == "0") {
				document.getElementById("instr").value = "";
			}
			else {
				var rsa = new RSAKey();
				rsa.setPublic(keyn, keye);
				var data = document.getElementById("instr").value;
				var edata = rsa.encrypt(data);
				document.getElementById("instr").value = edata;
			}
		}
	</script>
</head>
<body>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return encryptdata()"> 
	<input type="text" name="instr" id="instr" value="Hello World">
	<p>
		<input type="submit" name="submit" value="Submit">
	</p>
</form>


<p><?php echo $encrypted;?></p>
<p><?php echo $output;?></p>

<?php
require_once('db.php');
$prs = $db->getPrimeRates($cprs);
var_dump($prs);
var_dump($cprs);

$_SESSION["login"] = 1;
$_SESSION["uid"] = 1;

$db->setUserSession();

//echo getBalance("234567890000");
$db->mTransfer("234567890000", "23456789002", 100, "testing", FALSE);

$db->loginRecord(NULL, 1, "2st_pw", 1);

echo gen2ndpwPos();
$str = "a-b-c";
$str = explode('-', $str);
var_dump($str);

$pwarray = array('.', '.', '.', '.', '.', '.', '.', '.');
echo implode('', $pwarray);

$_SESSION["2ndpwPos"] = array(1, 3, 7);
$_SESSION["pw2"] = "qwertyui";
if (check2ndpw("w-r-i")) {

	echo "<p>ok</p>";
}
//echo $db->getLastLogin(1);

echo "<p></p>";

//$db->checkTransactions();
//$db->addTimedTransfer("234567890000", "23456789002", "", 100, "2014-11-20", "fixed", "", 0, 1);
var_dump($db->getTimedTransfer());



echo "<p></p>";
var_dump($_SESSION);


?>

</body>
</html>
