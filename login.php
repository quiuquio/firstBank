<?php
$p = new LoginPage();

if(isset($_POST['user_name']) && !empty($_POST['user_name'])){
    var_dump($_SESSION);
    var_dump($_POST);
    $p->showPageLoginForm2();
}
else if (!isset($_POST['user_name']) && empty($_POST['user_name'])){
    $p->showPageLoginForm();
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
        echo '<form method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" name="loginform" onsubmit="return encryptdata('."login_input_password".')">';
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

<script type="text/javascript">
        
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
        encryptdata = function(asd) { return asd;}
</script>   