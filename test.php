<?php
require_once('pass.php');

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



$encrypted = "";
$output = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$encrypted = $_POST["instr"];
	if ($key==NULL) {
		$output = "session timeout";
	}
	else {
		$output = $key->decrypt($encrypted);
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

<script>
var x = "Hello World!";              

document.getElementById("demo").innerHTML =
typeof x + " " + typeof y;
</script>

</body>
</html>
