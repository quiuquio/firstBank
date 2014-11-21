<form id="intraPayment"method="POST" action="" name="" autocomplete="off">              
    <table border="0" cellpadding="3" width="99%">
        <tbody><tr>
            <td class="DarkGrey" colspan="2"><font class="TITLE2">Transfer between my First Bank Accounts</font></td>
        </tr>
        <tr>
            <td class="LightGrey"><font class="CONTENT">From Account:</font></td>
            <td class="LightGrey"><font class="SELECT"> 
            <select id="source" name="source">
                <option selected="selected">----------- Please select account -----------</option>
                <?php
                    foreach ($_SESSION['accts'] as $value) {
                        ?>
                        <option value=<?php echo "'{$value['acct_no']}'"?>><?php echo "{$value['acct_no']}"?></option>
                        <?php
                    }
               ?>
            </select>
            </font>
            </td>
        </tr>

        <tr>
            <td class="LightGrey" colspan="2" height="25"><font class="CONTENT">To Account:</font></td>
        </tr>
         
        <tr>
            <td class="LightGrey">
            <table border="0" cellspacing="0" cellpadding="0">
                <tbody><tr>
                    <td>
                    <input type="radio" name="desOpt" value="0" checked="checked">
                    <font class="CONTENT">Registered Account</font></td>
                </tr>
            </tbody></table>
            </td>
            <td class="LightGrey">
            <font class="SELECT"> 
            <select name="targetDes">
                <option value="" selected="selected">----------- Please select account -----------</option>
                <?php
                    foreach ($_SESSION['accts'] as $value) {
                        ?>
                        <option value=<?php echo "'{$value['acct_no']}'"?>><?php echo "{$value['acct_no']}"?></option>
                        <?php
                    }
               ?>
            </select>
            </font>
            </td>
        </tr>           
        <tr>
            <td class="LightGrey"><font class="CONTENT">Amount:</font></td>
            <td class="LightGrey">
            HK$<input type="text" name="amount"  autocomplete="off" size="14" maxlength="14" value="">
            </td>
        </tr>      
        <tr>
            <td class="LightGrey">
            <span id="now" title="Execute the transfer now or on the first available time slot, based on office hours">
            <input type="radio" name="WhenToPay" value="1" checked="checked">
            <font class="CONTENT">Transfer Now</font>
            </span>
            </td>
            <td class="LightGrey"><font class="CONTENT">&nbsp;</font></td>
        </tr>
        <tr>
            <td class="LightGrey">
            <span href="#" id="later" title="Execute the transfer on a spacific date.">
            <input type="radio" name="WhenToPay" value="0">
            <font class="CONTENT">
            Transfer Date
            </font>
            </span>
            </td>
            <td class="LightGrey"><font class="SELECT"> 
            <select name="effDate" onfocus="">
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
            </select>
            </font></td>
        </tr>  
        <input type="text" id="#selectedPage" name="selectedPage" value="makePayments" hidden>
        <input type="text" id="#confirmed" name="confirmed" value="yes" hidden>                
    </tbody></table>
    <button id="button" class="bigButton" type="submit">Submit</button>
    <?php 
        if(isset($_POST['confirmed'])){
            if ($_POST['WhenToPay'] == 0){
                echo $db->addTimedTransfer($_POST['source'], $_POST['targetDes'], "", $_POST['amount'], $_POST['effDate'], "fixed", "", 0, 1);
            }else{
                echo $db->mTransfer($_POST['source'], $_POST['targetDes'], $_POST['amount'], "", FALSE) ? "Transaction successful." : "Transcation failed.";
            }
        }else{
            echo "";
        }

    ?>
</form>

<script type="text/javascript">
    $("#submit").click(function(){
        var form = $("#intraPayment")[0]; // we need to use jquery to access the next functions
        form.setAttribute("action", "index.php");
        form.setAttribute("method", "POST");
        var input = $("#selectedPage")[0];
        input.click();
    });
</script>


<?php
var_dump($_POST);
function confirmationPass(){
        $posString = gen2ndPwPos();
        $selectedIpunt = explode("-", $posString);
        $vals = [];
        $disables = [];
        for($i=0; $i<8; $i++){
            if(in_array($i, $selectedIpunt)){
                array_push($vals, "");
                array_push($disables, "");
            }
            else{
                array_push($vals, "value='.'");
                array_push($disables, "disabled='disabled'");
            }
        }
        echo    '
                <script type="text/javascript" src="js/jsbn.js"></script>
                <script type="text/javascript" src="js/prng4.js"></script>
                <script type="text/javascript" src="js/rng.js"></script>
                <script type="text/javascript" src="js/rsa.js"></script>
                ';
        echo '<h2>Input Password Number Two</h2>';
        //echo '<form method="POST" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" id="" name="loginform">';
        echo '<label for="pw2Block">Password</label> ';
        echo '<!--<input id="login_input_password" type="password" name="user_password" required />-->';
        echo "
                <div id='pw2Block'>
                <input type='password' maxlength='1' name='pw2_0' {$vals[0]} {$disables[0]}/>
                <input type='password' maxlength='1' name='pw2_1' {$vals[1]} {$disables[1]}/>
                <input type='password' maxlength='1' name='pw2_2' {$vals[2]} {$disables[2]}/>
                <input type='password' maxlength='1' name='pw2_3' {$vals[3]} {$disables[3]}/>
                <input type='password' maxlength='1' name='pw2_4' {$vals[4]} {$disables[4]}/>
                <input type='password' maxlength='1' name='pw2_5' {$vals[5]} {$disables[5]}/>
                <input type='password' maxlength='1' name='pw2_6' {$vals[6]} {$disables[6]}/>
                <input type='password' maxlength='1' name='pw2_7' {$vals[7]} {$disables[7]}/>
                </div>
            ";
        echo '<button id="login2Button">Log in</button>';    
        echo '<input id="login2poss" name="posString" hidden/>';
        echo '<input type="password" id="login2pw" name="login2pw" value="" hidden/>';
        echo '<input type="submit" id="login2Submit" value="Log in" hidden/>';
        //echo '</form>';
        //showInternalPaymentInfo();
    }
?>

<script type="text/javascript">
    $('#login2Button').click(function(evt){
            var login = $("#pw2Block input"); // select all buttons in menu, but only the buttons.
            var pw = "";
            $.each(login, function(key, value){
                pw += value.value=='.' ? '' : value.value+"-";
            });
            pw = pw.substring(0, pw.length - 1);
            var input = $("#login2pw")[0];
            input.setAttribute('value', pw);
            var submit = $("#confirmP")[0];
            submit.click();
        });
</script>