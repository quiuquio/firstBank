<?php
/*
if session user is not set we show the login page
*/
echo "<main>";
if(1){
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