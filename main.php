<?php
/*
if session user is not set we show the login page
*/
echo "<main>";


function checkLogin() {
    //var_dump($_SESSION);
    //var_dump($_POST);
    if((isset($_SESSION["uid"])) && (!empty($_SESSION["uid"])) && (isset($_POST['selectedPage']) && $_POST['selectedPage'] == "facialsuccess")) {
        $_SESSION["login"] = 1;
    }
}
checkLogin();

if($_SESSION["login"]==0){
    require('login.php');
}
else{
    if((isset($_POST['selectedPage']) && !empty($_POST['selectedPage']))){
        switch ($_POST['selectedPage']){
            case 'financialTracker':
                require('financialTracker.php');
                break;
            case 'userSettings':
                require('userSettings.php');
                break;
            case 'makePayments':
                require('makePayments.php');
                break;  
            case 'recurringPayments':
                require('recurringPayments.php');
                break;
            case 'recurringPayments':
                require('recurringPayments.php');
                break;
            case 'loanInformation':
                require('loanInformation.php');
                break; 
            default:
                require('listTransactions.php');
                break;
        }
        /*
        selectAccount
        listTransactions
        savingAccounts
        currentPrices
        */
    }
}
echo "</main>";
?>