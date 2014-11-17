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

if($_SESSION["login"]==123){
    require('login.php');
}
else{
    if((isset($_POST['selectedPage']) && !empty($_POST['selectedPage']))){
        switch ($_POST['selectedPage']){
            case 'financialTracker':
                setTitle("");
                require('financialTracker.php');
                break;
            case 'selectAccount':
                setTitle("Select Account");
                require('selectAccount.php');
                break;
            case 'userSettings':
                setTitle("User Settings");
                require('userSettings.php');
                break;
            case 'makePayments':
                setTitle("Make Payments");
                require('makePayments.php');
                break;  
            case 'billPayments':
                setTitle("Billl Payments");
                require('billPayments.php');
                break;
            case 'recurringPayments':
                setTitle("");
                require('recurringPayments.php');
                break;
            case 'loanInformation':
                setTitle("Loans");
                require('loanInformation.php');
                break;
            case 'mortgage':
                setTitle("Mortgage");
                require('mortgage.php');
                break;
            default:
                setTitle("List of Transactions");
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

function setTitle($title){
    echo "<title>{$title} | First Bank Limited</title>";
}
?>