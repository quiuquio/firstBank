
<?php
var_dump($_POST);
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
        echo '<h2>Login 2</h2>';
        echo '<form method="POST" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" id="" name="loginform">';
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
        echo '</form>';
        //showInternalPaymentInfo();
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



<table>

asdasd
    
</table>
<?php
    function showInternalPaymentInfo(){
?>
<table border="0" cellpadding="3" width="99%">
        <tbody><tr>
            <td class="DarkGrey" colspan="2"><font class="TITLE2">Transfer between my First Bank Accounts</font></td>
        </tr>
        <tr>
            <td class="LightGrey"><font class="CONTENT">From Account:</font></td>
            <td class="LightGrey"> 
            <p><?php echo "{$_POST['source']}"?></p>
            </td>
        </tr>

        <tr>
            <td class="LightGrey"><font class="CONTENT">To Account:</font></td>
            <td class="LightGrey"><font class="CONTENT"><?php echo "{$_POST['targetDes']}"?></font></td>
        </tr>
                   
        <tr>
            <td class="LightGrey"><font class="CONTENT">Amount:</font></td>
            <td class="LightGrey">
            HK$<?php echo "{$_POST['amount']}"?>
            </td>
        </tr>      
        <tr>
            <td class="LightGrey">
            <span href="#" id="later" title="Execute the transfer on a spacific date.">
            <font class="CONTENT">
            Transfer Date
            </font>
            </span>
            </td>
            <td class="LightGrey"><font class="SELECT"> 
            
            <?php
            if ($_POST['WhenToPay'] == 0){
                $d = $_POST['effDate'];
            }else{
                $d = date('d-m-Y');
                
            }
                echo "{$d}";
             ?>
            
            </font></td>
        </tr>
        <form>
        <input type="text" id="#selectedPage" name="source" value="<?php echo "{$_POST['source']}"?>" hidden>                  
        <input type="text" id="#selectedPage" name="targetDes" value="<?php echo "{$_POST['targetDes']}"?>" hidden>
        <input type="text" id="#selectedPage" name="amount" value="<?php echo "{$_POST['amount']}"?>" hidden>
        <input type="text" id="#selectedPage" name="effDate" value="<?php echo "{$d}"?>" hidden>
        <input type="text" id="#selectedPage" name="selectedPage" value="confirmPayment" hidden>
        </form>     
    </tbody></table>
<?php
}
?>