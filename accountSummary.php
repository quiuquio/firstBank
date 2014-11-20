<div id="page"> 
<form method="POST"  name="myForm" autocomplete="off">
<div id="middle" style="z-index:9">
    <div class="content_w_portlet">
        <div class="contentBox"> 
            <div class="middle">
                <h2 class="top-header"><span>As at <?php echo '$query_time'?> (HKT)</span>Account Summary</h2>              
                <table id="accSumTable" class="dTable">
                <tbody><tr>
                    <th colspan="2">Account Type</th>
                    <th class="accNo">Account No.</th>
                    <th class="currency">Currency/ Unit</th>
                    <th class="balance right">Account Balance (DR=Debit)</th>
                </tr>
                   <?php
                   var_dump($_SESSION);
                    foreach ($_SESSION['accts'] as $value) {
                        ?>
                            <tr class="lvl2 title">
                                <td colspan="2"><b><?php echo "{$value['acct_type']}";?></b></td>
                                <td><?php echo "{$value['acct_no']}";?></td>
                                <td> HKD </td>
                                <td> <?php echo "{$value['balance']}";?></td>
                           </tr>
                        <?php
                    }
                   ?>
                                </tbody></table>
                        </div>
                        <div class="bottom"></div>
                </div>
        </div>
</div>
</form>
<div id="middle">
<div class="content_w_portlet">
<div class="note">
        <h3>Note:</h3>
        <ol>
            <li>To view other accounts details, please <a href="#" id="accountDetails">click here</a></li>
            <li>Please note that balance of Paper Gold Grain Account is in GGA (1 GGA = 0.1 ounce).</li>
        </ol>
</div>
</div>
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