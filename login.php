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
        encryptdata = function(asd) { return asd;}
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
            $uid = dbGetUid($username, $passwd);
            if ($uid > 0) {
                $_SESSION["uid"] = $uid;
                $p->showPageLoginForm2();
            }
            else {
                echo "<p>Login failed. Please try again.</p>";
                $p->showPageLoginForm();
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
        echo $this->printSecurityInfo();
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

    private function printSecurityInfo(){
    $retVal = 
            "
            <div class='stdBox' id='noteOnLogin'>
                <h2>Important Notes</h2>
            <ul>
                <li><p>
                New Registration: Please be kindly informed that you should go to the branch with sufficient identification documents for new set up
                </li> 
                <li><p>
                    Protect your password: Do not disclose your password to others;
                    Do not expose your password in the public area;
                    None of our staff will ask for your password
                </li>
                <li><p>
                    Fraud Awareness:  Only our official website page is legal to log in;
                    Please do not click the hyperlink in the unknown and suspicious email; 
                    If you have got any suspicious transaction or email, please contact us via (852) 1234-5678
                </p></li> 
            </ul>
            <p class='right'>For more information please read trough our <a id='secUseEB' href=# title='Click here for more information on how to safelly use your e-banking service.'>Secure Use of e-Banking</a> 
            section.
            </p>
            </div>
            ";
    $retVal .= 
        "
        <div id='secUseBox' class='stdBox' hidden>
            <h2>To Further enforce security of our e-Banking , please note the followings:</h2>
                <h3>Update your computer</h3>
                Ensure you download and apply security updates and patches to your PC/browser when they are made available. They are designed to provide you with protection from known possible security problems.
        
                <h3>Install anti-virus software</h3>
                    Install virus detection software on your computer to protect from known viruses such as Trojan Horses. The software should be updated regularly to ensure that you have the latest protection
        
                <h3>Use a personal firewall</h3>
                     Install a personal firewall on your computer to help prevent unauthorized access and update the firewall regularly to ensure you are covered with the latest protection. Please refer to your PC or software vendor to identify a firewall that best suits your PC environment.
        
                <h3>Use an anti-spyware program</h3>
                     Not install pirated software or software from unknown sources. Such software may include spyware that run on your computer which monitor and record the way you browser the Internet and the sites you visit. Use an anti-spyware program to protect your computer from the threats.
        
                <h3>Be alert to potential fraud</h3>
                     Be aware that there are fake websites designed to trick you and collect your personal information. Avoid access to e-Banking Services through hyperlinks embedded in emails or other untrustworthy sources such as pop-up windows and the search result of the Internet search engines.
                    You should not solely rely on the look and feel of the website when using the e-Banking Services.
                    To prevent viruses or other unwanted problems, DO NOT click on attachments or embedded URL from unknown or untrustworthy sources, including suspicious emails. First Bank will not display your personal information in emails or ask you to provide any personal information including username, password and Security Code by replying emails.
        
                <h3>Keep your passwords secure</h3>
                    Do not disclose your passwords to anyone. (Not even to the Bank's employee, no Bank staff will ever ask for your password).
                    Do not write down or record the passwords without disguising it.
                    Do not use your birthday, name, Hong Kong Identity Card number, telephone number or similar numbers as your passwords.
                    Change your passwords on a regular basis, at least every 30 or 60 days.
                    Do not use passwords from other Internet sites.
                    We maintain strict security standards and procedures to prevent unauthorized access to information about you. Outside of the normal Internet Banking log-in process, Hang Seng Bank will never contact you and ask that you validate password. If you receive such a request, please notify us immediately at 2822-0228.
        
                <h3>Be careful when you go online</h3>
                    Avoid conducting banking transactions or check account balances from public terminals which are shared with other users (e.g internet cafes), as it is difficult to ensure such PCs are free of hacker programs (someone might be able to access your personal or account information).
                    Ensure all other Internet sessions are closed before you log on to Internet banking. While you have an Internet banking session open, we recommend that you do not open other Internet browser sessions and access other sites. This can help ensure your financial information is protected and blocked from unauthorized access via another website.
                    Always disconnect from the Internet when you have finished to avoid leaving your computer online when you are not using the service.
                    Be alert to your surrounding when you use e-Banking Services via mobile devices.
                    
                <h3>Always log off</h3>
                    Always remember to log off properly and close the browser after you have finished using e-Banking Services.
                <h3>Disable the auto-complete function within your browser</h3>
                    The auto-complete feature saves previous entries you have made for Web addresses, forms, and passwords. For security protection, the auto-complete function of your browser should be disabled to avoid sensitive information is saved and displayed for the automatic completion. Please refer to your browser’s own 'Help' function on how to disable the function.
        
                <h3>Take care offline</h3>
                    Never write down your Internet banking details in a format that can be recognised by others. If you store any personal information in an electronic device, please ensure that there will be reasonable care and protection so that you are the only authorised person who can access the stored information.
                    Review your account regularly and always keep good records of your personal finances.
        
                <h3>Configure your e-Banking Services</h3>
                    You can reduce your daily transfer limits and delete your accounts in the transfer list online.
            </div>
        ";
        return $retVal;
    }
}
?>


<script type="text/javascript">  
    $('#secUseEB').click(function(evt){
        $('#secUseBox').fadeIn('slow');
    });
</script>
