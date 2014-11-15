
<script type="text/javascript">
        // encrypt password before sending
        function encryptdata(id) {
            var keyn = "<?php echo ($key==NULL)? 0:$key->rsa_n; ?>";
            var keye = "<?php echo ($key==NULL)? 0:$key->rsa_e; ?>";

            if (keyn == "0") {
                document.getElementById(id).value = "";
            }
            else {
                var rsa = new RSAKey();
                rsa.setPublic(keyn, keye);
                var data = document.getElementById(id).value;
                var edata = rsa.encrypt(data);
                document.getElementById(id).value = edata;
            }
        }
</script>   

<?php
require_once('db.php');

$p = new LoginPage();

if(isset($_POST['user_name']) && !empty($_POST['user_name'])){
    //var_dump($_SESSION);
    //var_dump($_POST);
    $username = getpost("user_name");
    $passwd = getpost("user_password");
    if ($key == NULL) {
        echo "<p>Session timeout. Please <a href=\"", htmlspecialchars($_SERVER["PHP_SELF"]), "\">login</a> again.</p>";
    }
    else {
        $passwd = $key->decrypt($passwd);
        if ($passwd == "") {
            echo "<p>Password encryption fail. Please try angin.</p>";
            $p->showPageLoginForm();
        }
        else {
            if (dbconnect($con)) {
                $sqlstr = "SELECT u_id FROM login WHERE user_name='".$username."' AND md5_pw1=MD5('".$passwd."')";
                $row = dbquery($sqlstr);
                //var_dump($row);
                if ($row == NULL) {
                    echo "<p>Login failed. Please try again.</p>";
                    $p->showPageLoginForm();
                }
                else {
                    $_SESSION["uid"] = $row["u_id"];
                    $p->showPageLoginForm2();
                }
            }
            else {
                echo "<p>DB error. Please <a href=\"", htmlspecialchars($_SERVER["PHP_SELF"]), "\">login</a> again.</p>";
            }
        }
    }
}
else if (!isset($_POST['user_name']) && empty($_POST['user_name'])){
    $p->showPageLoginForm();
}

function getpost($iname) {
    $data = "";
    if (array_key_exists($iname, $_POST)) {
        $data = $_POST[$iname];
    }
    return $data;
}

class LoginPage{

     public function showPageLoginForm(){
        echo    '
                <script type="text/javascript" src="js/jsbn.js"></script>
                <script type="text/javascript" src="js/prng4.js"></script>
                <script type="text/javascript" src="js/rng.js"></script>
                <script type="text/javascript" src="js/rsa.js"></script>
                ';
        echo '<h2>Login 1</h2>';
        echo '<form method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" name="loginform" onsubmit="return encryptdata('."'login_input_password'".')">';
        echo '<label for="login_input_username">Username</label> ';
        echo '<input id="login_input_username" type="text" name="user_name" required /> ';
        echo '<label for="login_input_password">Password</label> ';
        echo '<input id="login_input_password" type="password" name="user_password" required /> ';
        echo '<input type="submit" name="login" value="Proceed" />';
        echo '</form>';
    }

    /*

    */
    public function showPageLoginForm2(){
        echo    '
                <script type="text/javascript" src="js/jsbn.js"></script>
                <script type="text/javascript" src="js/prng4.js"></script>
                <script type="text/javascript" src="js/rng.js"></script>
                <script type="text/javascript" src="js/rsa.js"></script>
                ';
        echo '<h2>Login 2</h2>';
        echo '<form method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" name="loginform">';
        echo '<label for="login_input_password">Password</label> ';
        echo '<input id="login_input_password" type="password" name="user_password" required /> ';
        echo '<input type="submit"  name="login" value="Log in" />';
        echo '</form>';
        echo '<h2>Or try the facial recognition Login</h2>';
        require('facialLogin.php');
    }

}
?>
