<?php 
function to_hex($data)
{
    return strtoupper(bin2hex($data));
}
/*
function getpubkey () {
	$keypath = "/opt/lampp/keys/server.crt";
	$key_content = file_get_contents($keypath);
	$keydetails = openssl_pkey_get_details(openssl_get_publickey($key_content));
	return $keydetails;
}

function getpubkeyn ($keydetails) {
	echo to_hex($keydetails["rsa"]["n"]);
}

function getpubkeye ($keydetails) {
	echo to_hex($keydetails["rsa"]["e"]);
}

function decryptdata ($data) {
	$keypath = "/opt/lampp/keys/server.key";
	$key_content = file_get_contents($keypath);
	$pk = openssl_get_privatekey($key_content);
	//hexadecimal data
	$data = pack("H*", $data);
	if (openssl_private_decrypt($data, $r, $pk)) {
		return $r;
	}
	return "encrypt failed.";
}
*/
/**
* generates a new private and public key pair
*/
class RSA 
{
	protected $privKey;

	// public key
	public $rsa_n;
	public $rsa_e;
	
	public function __construct($alg = "sha512", $keyBits = 4096, $keyType = OPENSSL_KEYTYPE_RSA)
	{
		$config = array(
		    "digest_alg" => $alg,
		    "private_key_bits" => $keyBits,
		    "private_key_type" => $keyType,
		);

		// Create the private and public key
		$res = openssl_pkey_new($config);

		// Extract the private key from $res to $privKey
		openssl_pkey_export($res, $this->privKey);

		// get key details
		$pkeyDetails = openssl_pkey_get_details($res);

		// get public key n & e value
		$this->rsa_n=to_hex($pkeyDetails["rsa"]["n"]);
		$this->rsa_e=to_hex($pkeyDetails["rsa"]["e"]);
	}

	public function serialize() {
		return serialize([$this->privKey, $this->rsa_n, $this->rsa_e]);
	}

	public function unserialize($data) {
		$keydata = unserialize($data);
		$this->privKey = $keydata[0];
		$this->rsa_n = $keydata[1];
		$this->rsa_e = $keydata[2];
	}

	public function decrypt ($indata) {
		//hexadecimal data
		if (!ctype_xdigit($indata)) {
			return "";
		}
		$indata = pack("H*", $indata);

		// Decrypt the data using the private key and store the results in $decrypted
		if (openssl_private_decrypt($indata, $decrypted, $this->privKey)) {
			return $decrypted;
		}
		else {
			return "";
		}
	}
}

function gen2ndpwPos() {
	$pos = array(-1, -1, -1);
	if (rand(0,1)) {
		array_push($pos, -1);
	}
	for ($i=0; $i < count($pos); $i++) { 
		$next = rand(0, 7);
		while (in_array($next, $pos)) {
			$next = rand(0, 7);
		}
		$pos[$i] = $next;
	}
	sort($pos);
	$_SESSION["2ndpwPos"] = $pos;
	return implode("-", $pos);
}

function check2ndpw($inpw) {
	$pwarray = array('.', '.', '.', '.', '.', '.', '.', '.');
	$pos = $_SESSION["2ndpwPos"];
	var_dump($pos);
	$inpw = explode("-", $inpw);
	for ($i=0; $i < count($pos); $i++) { 
		$pwarray[$pos[$i]] = $inpw[$i];
	}
	$inpw = implode('', $pwarray);
	$inpw = '/'.$inpw.'/';
	echo "$inpw";
	return preg_match($inpw, $_SESSION["pw2"]);
}

?>

