<div id="page"> 
<form method="POST"  name="myForm" autocomplete="off">
<div id="middle">
    <div>
        <div> 
            <div>
                <table id="accSumTable" class="commonTable">
                <tbody>
                <tr class="MiddleGrey">
                    <th>Account Type</th>
                    <th class="accNo">Account No.</th>
                    <th class="currency">Currency/ Unit</th>
                    <th class="balance">Account Balance</th>
                </tr>
                   <?php
                   //var_dump($_SESSION);
                    foreach ($_SESSION['accts'] as $value) {
                        ?>
                            <tr class="LightGrey">
                                <td><b><?php echo "{$value['acct_type']}";?></b></td>
                                <td><?php echo "{$value['acct_no']}";?></td>
                                <td> HKD </td>
                                <td> <?php echo "HK&#36;{$value['balance']}";?></td>
                           </tr>
                        <?php
                    }
                   ?>
                    </tbody>
                    </table>
                        </div>
                </div>
        </div>
</div>
</form>
<div class="note">
        <h3>Note:</h3>
        <ol>
            <li>To view other accounts details, please <a href="#" id="accountDetails" title='Transaction lists with detailed information for every account.'>click here</a></li>
        </ol>
</div>
</div>

<script type="text/javascript">
    var buttonsArray = [$('#accountDetails')]
    $.each(buttonsArray, function(key, value){
        value = value[0];
        $('#'+value.id).click(function(evt){
            var form = $("#menuForm")[0]; // we need to use jquery to acces the next functions
            form.setAttribute("action", "index.php");
            form.setAttribute("method", "POST");
            var input = $("#selectedPage")[0];
            input.setAttribute('value', value.id);
            input.click();
        });
    });
</script>

<script type="text/javascript">  
    $('#accountDetails').click(function(evt){
        $('#accountDetails').fadeIn('slow');
    });
</script>