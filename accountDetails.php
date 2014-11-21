<div id="page"> 
<h2 class="heading">Account Overview </h2>

<form method="POST" name="myForm" autocomplete="off">
        <div id="middle" class="z-index1">
                <div class="content_full">
            <div class="contentBox noBottomMargin">
            <div class="middle">
                <table class="commonTable">
                <tbody>
                <tr class="MiddleGrey">
                <th class="label selectLabel">View Account:</th>
                  <th colspan="4">
                    <select id="acnts">
                    <option value="">------------SELECT ACCOUNT NAME------------</option>
                <?php
                    foreach ($_SESSION['accts'] as $value) {
                        ?>
                        <option value=<?php echo "'{$value['acct_no']}'"?>><?php echo "{$value['acct_no']}"?> - <?php echo "{$value['acct_type']}"?></option>
                        <?php
                    }
                   ?>
                   </select>
                  </th>
                </tr>
                <script type="text/javascript">
                    $("#acnts").change(function(evt){ 
                      q = $('#contents3')[0];
                      $.each(q.children, function(c,v){
                        v.hidden = true;
                        asd = v;
                          $("#sup"+v.id)[0].hidden = true;
                      });
                      console.log(evt.target.value);
                      $("#"+evt.target.value)[0].hidden = false;
                      $("#sup"+evt.target.value)[0].hidden = false;
                    });
                </script>
                <?php
                foreach ($_SESSION['accts'] as $value) {
                  ?>
                  <table class="commonTable" id=<?php echo "'sup{$value['acct_no']}'"?> >
                  <tr class="LightGrey">
                    <td class="label">Account Type:</td>
                    <td class="contentFix"> <?php echo "{$value['acct_type']}"?></td>
                    <td class="label labelLeftBorder">Overdraft Limit:</td>
                    <td><?php echo 'N/A'?></td>
                  </tr>
                  <tr class="LightGrey">
                    <td class="label">Account No.:</td>
                    <td class="contentFix"> <?php echo "{$value['acct_no']}"?></td>
                    <td class="label labelLeftBorder">Account Balance:</td>
                    <td class="contentFix"><?php echo "{$value['balance']}"?></td>
                  </tr>
                  </table>
                  <!--<tr class="noVertBorder">
                    <td class="label">Balance*:</td>
                    <td>View details</td>
                    <td class="label labelLeftBorder">&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>-->
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
<div id="middle">
<div id="contents3">

<?php
foreach ($_SESSION['accts'] as $value) {
//print_r($db->getTransactions($value['acct_no']));
?>
<div id=<?php echo "'{$value['acct_no']}'"?>>
<table  class="commonTable">
<h1>List of Transactions for<?php echo " {$value['acct_type']} {$value['acct_no']}"?>:</h1>
    <tr class="MiddleGrey">
        <th>Description</th>
        <th>Date</th>
        <th>In</th>
        <th>Out</th>
    </tr>
    <?php
    $transactions = $db->getTransactions($value['acct_no']);
    foreach ($transactions as $val) {
    ?>
    <tr class="LightGrey">
        <td><?php echo "{$val['remarks']}"?></td>
        <td><?php echo "{$val['t_timestamp']}"?></td>
        <?php
        //echo substr($val['transaction_type'], 2, 1);
        if(substr($val['transaction_type'], 2, 1) == 'O'){
          echo "
              <td>-</td>
              <td>dHK&#36;{$val['amount']}</td>
              ";
        }else{
          echo "
              <td>HK&#36;{$val['amount']}</td>
              <td>-</td>              
              ";
        }
        ?>       
    </tr>
    <?php
    }
    ?>
    <tr>
      <td></td>
      <td></td>
      <td><b>Total Balance:</b></td>
      <td><?php echo "HK&#36;{$value['balance']}"?></td>
    </tr>
</table>
</div>
<?php
}
?>

<!--<div class="note">
        <h3>Note:</h3>
        <ol>
            <li>All transactions made outside service hour (Monday to Friday after 9pm, Saturday after 5:55pm, Sunday and public holidays whole day) will be shown on the transaction summary by next business day.</li>
        </ol>
</div>-->
</div>
</div>
</div>

<script type="text/javascript"> 
  q = $('#contents3')[0];
  $.each(q.children, function(c,v){
    v.hidden = true;
    asd = v;
    $("#sup"+v.id)[0].hidden = true;
  });
</script>