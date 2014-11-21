<table>
<tbody><tr><td width="100%" valign="top">
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" align="left">
    <tbody><tr height="100%">
            <td dir="ltr" width="100%" valign="top">

<form method="POST" autocomplete="off">
    <table border="0" cellpadding="3" width="99%">
        <tbody>
        <tr>
            <td class="DarkGrey" colspan="2"><font class="TITLE2">Transfer to Third-Party Accounts</font></td>
        </tr>
        <tr class="LightGrey">
            <td class="LightGrey"><font class="CONTENT">From Account:</font></td>
            <td class="LightGrey"><font class="SELECT">
            <select name="userFromAccount">
                <option value="0"><?php echo '$user_account[0].number'?></option>
                <option value="1"><?php echo '$user_account[1].number'?></option>
                <option value="..."><?php echo '$user_account[...].number'?></option>
            </select></font></td>
        </tr>
        <tr>
            <td class="LightGrey" colspan="2" height="25"><font class="CONTENT">To Account:</font></td>
        </tr>
        <tr>
                <td class="LightGrey">
                <table border="0" cellspacing="0" cellpadding="0">
                        <tbody><tr>
                                <td><font class="CONTENT">
                                <input type="radio" name="toAccount" value="1">
                                <font class="CONTENT">Non-registered Account </font></font></td>
                        </tr>
                </tbody></table>
                </td>
                <td class="LightGrey"><font class="CONTENT">
                <input type="text" name="creditAcctInput" autocomplete="off" size="16" maxlength="16" value=""><br>
                (Please input number only and omit '-' and spaces)</font></td>
        </tr>


        <tr>
            <td class="LightGrey"><font class="CONTENT">Amount:</font></td>
            <td class="LightGrey"><font class="SELECT"><select name="transferCurrency">
                <option value="HKD">HKD</option>
                <option value="AUD">AUD</option>
                <option value="CAD">CAD</option>
                <option value="CHF">CHF</option>
                <option value="CNY">CNY</option>
                <option value="EUR">EUR</option>
                <option value="GBP">GBP</option>
                <option value="IDR">IDR</option>
                <option value="JPY">JPY</option>
                <option value="NZD">NZD</option>
                <option value="THB">THB</option>
                <option value="USD">USD</option>
                <option value="ZAR">ZAR</option>
                </select></font> <input type="text" name="debitAmountInput" autocomplete="off" size="14" maxlength="14" value=""></td>
        </tr>

        <tr>
            <td class="LightGrey">
            <table border="0" cellspacing="0" cellpadding="0">
                    <tbody><tr>
                            <td>
                            <input type="radio" name="transferDateOpt" value="1" checked="checked">
                            <font class="CONTENT">Transfer Now</font></td>
                    </tr>
            </tbody></table>
            </td>
            <td class="LightGrey"><font class="CONTENT"></font></td>
        </tr>
        <tr>
            <td class="LightGrey">
            <table border="0" cellspacing="0" cellpadding="0">
                <tbody><tr>
                            <td>
                            <input type="radio" name="transferDateOpt" value="0">
                            <font class="CONTENT">Transfer Date</font></td>
                    </tr>
                </tbody>
            </table>
            </td>
            <td class="LightGrey"><font class="SELECT">
                <select name="transferDateList">
                    <option value="17-11-2014">17-11-2014</option>
                    <option value="18-11-2014">18-11-2014</option>
                    <option value="19-11-2014">19-11-2014</option>
                    <option value="20-11-2014">20-11-2014</option>
                    <option value="21-11-2014">21-11-2014</option>
                    <option value="22-11-2014">22-11-2014</option>
                    <option value="24-11-2014">24-11-2014</option>
                    <option value="25-11-2014">25-11-2014</option>
                    <option value="26-11-2014">26-11-2014</option>
                    <option value="27-11-2014">27-11-2014</option>
                    <option value="28-11-2014">28-11-2014</option>
                    <option value="29-11-2014">29-11-2014</option>
                    <option value="01-12-2014">01-12-2014</option>
                    <option value="02-12-2014">02-12-2014</option>
                    <option value="03-12-2014">03-12-2014</option>
                    <option value="04-12-2014">04-12-2014</option>
                    <option value="05-12-2014">05-12-2014</option>
                    <option value="06-12-2014">06-12-2014</option>
                    <option value="08-12-2014">08-12-2014</option>
                    <option value="09-12-2014">09-12-2014</option>
                    <option value="10-12-2014">10-12-2014</option>
                    <option value="11-12-2014">11-12-2014</option>
                    <option value="12-12-2014">12-12-2014</option>
                    <option value="13-12-2014">13-12-2014</option>
                    <option value="15-12-2014">15-12-2014</option>
                    <option value="16-12-2014">16-12-2014</option>
                    <option value="17-12-2014">17-12-2014</option>
                    <option value="18-12-2014">18-12-2014</option>
                    <option value="19-12-2014">19-12-2014</option>
                    <option value="20-12-2014">20-12-2014</option>
                    <option value="22-12-2014">22-12-2014</option>
                    <option value="23-12-2014">23-12-2014</option>
                    <option value="24-12-2014">24-12-2014</option>
                    <option value="27-12-2014">27-12-2014</option>
                    <option value="29-12-2014">29-12-2014</option>
                    <option value="30-12-2014">30-12-2014</option>
                    <option value="31-12-2014">31-12-2014</option>
                </select></font></td>
        </tr>
        <tr>
            <td class="LightGrey" valign="top"><font class="CONTENT">Remarks:</font></td>
            <td class="LightGrey"><input type="text" name="remark" autocomplete="off" size="40" maxlength="60" value="">
                    <br><font class="CONTENT">
                        (For pending transfer and template, maximum of 60 characters allowed.)
                    </font></td>
        </tr>     
        </tbody></table>
</form>
</td>
</tr>
<tr><td width="100%" valign="top">
        
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" align="left" class="wpsPortletBody">
    <tbody><tr height="100%">
        <td dir="ltr" width="100%" valign="top">
<br>

<div id="middle" style="z-index:-1">
<div id="contents">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
     <tbody><tr>
        <td valign="top" class="smallfont">Notice: To meet the Hong Kong Monetary Authority guidelines on internet banking security, the Bank must send you a mandatory SMS notification for fund transfer to non-registered 3rd-party accounts. Such SMS message will not be forwarded even if you have subscribed to an 'SMS Forwarding' service provided by telecommunications service providers in Hong Kong. Please
        register or update your mobile number in order to conduct this type of transaction.</td>
    </tr>
    </tbody>
 </table>
</div>
</div>
</td>
</tr>
</tbody></table>
</td></tr>
</tbody></table>
</td></tr>
</tbody></table>