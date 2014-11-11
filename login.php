<?php
$p = new LoginPage();

if(isset($_POST['user_name']) && !empty($_POST['user_name'])){
    $_SESSION['user_name'] = $_POST['user_name'];
}



if(isset($_SESSION['user_name']) && !empty($_SESSION['user_name'])){
    var_dump($_SESSION);
    var_dump($_POST);
    $p->showPageLoginForm2();
}
else{
    $p->showPageLoginForm();
}
class LoginPage{

     public function showPageLoginForm(){
        echo '<h2>Login 1</h2>';
        echo '<form method="post" action="' . $_SERVER['SCRIPT_NAME'] . '" name="loginform">';
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
        echo '<h2>Login 2</h2>';
        echo '<form method="post" action="' . $_SERVER['SCRIPT_NAME'] . '" name="loginform">';
        echo '<label for="login_input_password">Password</label> ';
        echo '<input id="login_input_password" type="password" name="user_password" required /> ';
        echo '<input type="submit"  name="login" value="Log in" />';
        echo '</form>';
    }

}
?>