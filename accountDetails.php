<div id="page"> 
<div id="middle_title">
<div id="contents3">

<a name="7_0G3UNU10SD0MHTI7RP41000000"></a>
<h2 class="heading">Account Overview </h2>

</div>
</div>
<form method="POST" name="myForm" autocomplete="off">
        <div id="middle" class="z-index1">
                <div class="content_full">
        <div class="banner"></div>
            <div class="contentBox noBottomMargin">
                <div class="top"></div>
            <div class="middle">
                <h2 class="top-header"><span>As at <?php echo '$query_time'?></span>Account Details</h2>
                 <div class="errorMessage">
                </div>
                <div class="separator-shadow"></div>
                <table class="commonTable">
                <tbody>
                <td class="label selectLabel">View Account:</td>
                  <td colspan="4">
                    <select id="acnts">
                <?php
                    //foreach ($_SESSION['accts'] as $value) {
                    foreach ([1,2,3,4,5,6,7] as $value) {
                        ?>
                        <!-- <option value=<?php echo "'{$value['acct_no']}'"?>><?php echo "{$value['acct_no']}"?> <?php echo "{$value['acct_type']}"?></option>-->
                        <option value=<?php $v = rand(); echo "{$v}"?>><?php echo "123"?> <?php echo "savings account hkd"?></option>
                        <?php
                    }
                   ?>
                   </select>
                  </td>
                </tr>
                <script type="text/javascript">
                    $("#acnts").change(function(evt){ console.log(evt);});
                </script>

                <!--<tr>
                  <td class="label selectLabel">View Account:</td>
                  <td colspan="4">
                    <select>
                      <option value="0"><?php echo '$user_account[0].number'?> <?php echo '$user_account[0].type'?></option>
                      <option value="1"><?php echo '$user_account[1].number'?> <?php echo '$user_account[1].type'?></option>
                      <option value="2"><?php echo '$user_account[2].number'?> <?php echo '$user_account[2].type'?></option>
                    </select>
                  </td>
                </tr>-->
                <tr>
                  <td class="label">Account Type:</td>
                  <td class="contentFix"> <?php echo '$selected_account.type'?></td>
                  <td class="label labelLeftBorder">Overdraft Limit:</td>
                  <td><?php echo '$selected_account.overdraftLimit'?></td>
                </tr>
                <tr>
                  <td class="label">Account No.:</td>
                  <td class="contentFix"> <?php echo '$selected_account.number'?></td>
                  <td class="label labelLeftBorder">Account Balance:</td>
                  <td class="contentFix"><?php echo '$selected_account.balance'?></td>
                </tr>
                <tr class="noVertBorder">
                  <td class="label">Total Relationship Balance*:</td>
                  <td>View details</td>
                  <td class="label labelLeftBorder">&nbsp;</td>
                  <td>&nbsp;</td>
                                </tr>
              </tbody></table>

                          <div class="separator-solidGrey"></div>
                                </div>
                        </div>
                </div>
        </div>
</form>
<div id="middle">
<div id="contents3">

<div class="note">
        <h3>Note:</h3>
        <ol>
            <li>All transactions made outside service hour (Monday to Friday after 9pm, Saturday after 5:55pm, Sunday and public holidays whole day) will be shown on the transaction summary by next business day.</li>
        </ol>
</div>
</div>
</div>
</div>