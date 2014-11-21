<?php
/*
if session user is not set we show the login page
*/
echo "<main>";

function checkLogin() {
    global $db;
    //var_dump($_SESSION);
    //var_dump($_POST);
    if(isset($_SESSION["uid"]) && (!empty($_SESSION["uid"]))) {
        if (isset($_POST['selectedPage']) && $_POST['selectedPage'] == "facialsuccess") {
            $_SESSION["login"] = 1;
            $db->loginRecord(NULL, $_SESSION["uid"], "facial", 1);
        } elseif (isset($_POST['login2pw'])) {
            if (check2ndpw($_POST['login2pw'])) {
                $_SESSION["login"] = 1;
                $db->loginRecord(NULL, $_SESSION["uid"], "2nd_pw", 1);
            }
            else {
                $db->loginRecord(NULL, $_SESSION["uid"], "2nd_pw", 0);
            }
            
        }
    }
}
checkLogin();

if($_SESSION["login"]==0){
    require('login.php');
}
else{
    // setup user session
    $db->setUserSession();

    if((isset($_POST['selectedPage']) && !empty($_POST['selectedPage']))){
        switch ($_POST['selectedPage']){
            case 'financialTracker':
                setTitle("Financial Traker");
                require('financialTracker.php');
                break;
            case 'selectAccount':
                setTitle("Select Account");
                require('selectAccount.php');
                break;
            case 'accountSummary':
                setTitle("Account Summary");
                require('accountSummary.php');
                break;
            case 'accountDetails':
                setTitle("Account Details");
                require('accountDetails.php');
                break;
            case 'userSettings':
                setTitle("User Settings");
                require('userSettings.php');
                break;
            case 'makePayments':
                setTitle("Make Payments");
                require('makePayments.php');
                break;  
            case 'confirmPayment':
                setTitle("Confirm Transfer");
                require('confirmTransfer.php');
                break; 
            case 'billPayment':
                setTitle("Bill Payments");
                require('billPayment.php');
                break;
            case '3rdPartyTransfer':
                setTitle("Third Party Transfer");
                require('thirdPartyTransfer.php');
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
                setTitle("Account Summary");
                require('accountSummary.php');
                break;
        }
        /*
        selectAccount
        listTransactions
        savingAccounts
        currentPrices
        */
    }else{
        setTitle("Account Summary");
        require('accountSummary.php');  
    }
}
echo "</main>";

function setTitle($title){
    echo "<title>{$title} | First Bank Limited</title>";
}
?>