<?php
/*
if session user is not set we show the login page
*/
if(0){
    echo "<main>";
    require('login.php');
    echo "</main>";
}
else{
    echo "<main>";
    require('logd.php');
    echo "</main>";
}
?>