<form method="POST" action="" name="" autocomplete="off">
    <table cellpadding="3" width="99%">
        <tbody><tr>
            <td class="DarkGrey">
            <font class="Title2">
                Change of Address/Telephone/Email
            </font>
            </td>
        </tr>
    </tbody></table>
    <table width="99%" border="0" cellpadding="3">
        <tbody><tr>
            <td class="MiddleGrey"><font class="BlackTitle">Name:</font></td>
            <td colspan="3" class="LightGrey"><font class="Content"> <?php echo'$user_full_name';?></font></td>
        </tr>
        <tr>
          <td colspan="4">&nbsp;</td>
      </tr>
        <tr>
          <td colspan="4" class="MiddleGrey">
            <font class="Content">Below is your personal
                information recorded in the bank.
        </td>
      </tr>
        <tr>
            <td colspan="4" class="MiddleGrey"><font class="BlackTitle">Phone
            Number</font></td>
        </tr>
        <tr>
            <td class="LightGrey"><font class="Content">Mobile / Pager:</font></td>
            <td colspan="3" class="LightGrey"><font class="Content"> <?php echo'$user_mobile';?>
            </font></td>
        </tr>
        <tr>
            <td nowrap="" class="LightGrey"><font class="Content">Residential Tel.
            No. 1:</font>&nbsp;&nbsp;&nbsp;</td>
            <td class="LightGrey"><font class="Content"> <?php echo'$user_residential_phone_1';?> </font></td>
            <td class="LightGrey"><font class="Content">Residential Tel. No. 2:</font></td>
            <td class="LightGrey"><font class="Content"> <?php echo'$user_residential_phone_2';?> </font></td>
        </tr>
        <tr>
            <td class="LightGrey"><font class="Content">Office Tel. No. 1:</font></td>
            <td class="LightGrey"><font class="Content"> <?php echo'$user_office_phone_1';?> </font></td>
            <td class="LightGrey"><font class="Content">Office Tel. No. 2:</font></td>
            <td class="LightGrey"><font class="Content"> <?php echo'$user_office_phone_2';?> </font></td>
        </tr>
        <tr>
          <td colspan="4">&nbsp;</td>
      </tr>
        <tr>
          <td colspan="4" class="MiddleGrey"><font class="BlackTitle">Address</font></td>
      </tr>
        <tr>
          <td class="LightGrey"><font class="Content">Residential:</font></td>
          <td colspan="3" class="LightGrey"><font class="Content">
            <?php echo'$user_address';?>
            Example from Sandy: GUANG ZHOU SHI LI WAN QU DUO BAO LU,63 HAO 16 HAO LOU, 402 FANG,   CHINA. </font></td>
      </tr>
      
        <tr>
          <td class="LightGrey"><font class="Content">Office:</font></td>
          <td colspan="3" class="LightGrey"><font class="Content">
             <?php echo'$user_office_address';?>
             </font></td>
      </tr>
      
        <tr>
            <td colspan="4">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="4" class="MiddleGrey"><font class="Content">To change
              the e-mail address, please fill in and submit the below information:</font></td>
      </tr>
        <tr>
            <td colspan="4" class="MiddleGrey"><font class="BlackTitle">e-Mail Address</font></td>
        </tr>
        <tr>
            <td class="LightGrey"><font class="Content">e-Mail Address:</font></td>
            <td colspan="3" class="LightGrey"><input type="text" name="email" onkeypress="return disableEnterKey(event)" autocomplete="off" size="35" maxlength="35" value="<?php echo'$user_email';?>"></td>
        </tr>
    </tbody></table>

    <br>
    <table width="99%" border="0" cellpadding="3">
      <tbody><tr>
        <td colspan="2" class="MiddleGrey"><font class="CONTENT"><b>Use of Personal Data in Direct Marketing</b> </font></td>
      </tr>
      <tr>
        <td colspan="2" class="LightGrey"><font class="CONTENT">The Bank may use your personal data in direct marketing, and may also provide
        your personal data to other members of the First ank Group (but not other third parties) for their use in direct marketing.</font></td>
      </tr>
      <tr valign="top">
        <td valign="top" width="3%" class="LightGrey"><input type="checkbox" name="dmUseTickbox" value="Y"></td>
        <td width="97%" class="LightGrey"><font class="CONTENT">Check this box if you <b>do not</b> wish the Bank to use your personal data in direct marketing.</font></td>
      </tr>
      <tr valign="top">
        <td valign="top" width="3%" class="LightGrey"><input type="checkbox" name="3rdMemUseTickbox" value="Y"></td>
        <td width="97%" class="LightGrey"><font class="CONTENT">Check this box if you <b>do not</b> wish the Bank to provide your personal data to any other members of the First Bank Group for their use in direct marketing.</font></td>
      </tr>
      <tr>
        <td colspan="2" class="LightGrey"><font class="CONTENT"><b>Your choice above to check or not to check any of the boxes represents your present
        choice whether or not to receive direct marketing contact or information which shall become effective from the date the Bank approves this
        application. This replaces any choice or request regarding direct marketing communicated by you to the Bank prior to this application, unless
        this application is withdrawn or rejected for whatever reason.</b> Please <a href="#" onclick=""><font class="ContentLink">contact us</font></a>
        if you want to know your choice prior to this application.<br><br>
        Please note that your above choice applies to the direct marketing of the classes of products, services and/or subjects as set out in the Bank’s
        <a href="#" target="ChangeInfo" onclick=""><font class="ContentLink">
        Notice to Customers and Other Individuals relating to the Personal Data (Privacy) Ordinance</font></a>, 
        including, for example, First Bank Credit Card
        promotions and special offers provided by merchants. Please also refer to the Notice on the kinds of personal 
        data which may be used in direct
        marketing and the classes of persons to which your personal data may be provided for them to use in direct 
        marketing.<br><br>
        <b>However, if you are a Private Banking customer of the Bank, your choice above does not apply to direct 
        marketing contact or information in
        connection with Private Banking services of the Bank and any existing choice or request that you have 
        communicated to the Bank in this regard
        shall prevail. If you wish to opt out from direct marketing contact or information in connection with Private 
        Banking services of the Bank, please
        contact your Relationship Manager.</b></font></td>     
      </tr>
      <tr>
          <td><input type="submit" value="Submit Form"></td>
      </tr>
    </tbody>
    </table>
    <br>
    <table width="99%" border="0" cellspacing="2" cellpadding="3">
      <tbody><tr>
        <td colspan="2" valign="top"><font class="CONTENT">Notes:</font></td>
      </tr>
      <tr>
        <td><font class="Content">1.</font></td>
        <td><font class="Content">After we receive your request, it will take 
        3 to 5 working days to process the request.</font></td>
      </tr>
      <tr>
        <td valign="top"><font class="Content">2.</font></td>
        <td><font class="Content">Please refer to our <a href="#" target="ChangeInfo" onclick="openCommonDotcomURL('PIB605', 'eng');return false;"><font class="ContentLink">Notice to Customers and Other Individuals relating to the Personal Data (Privacy) Ordinance</font></a>.</font></td>
      </tr>
      
      <tr>
        <td valign="top"><font class="Content">3.</font></td>
        <td><font class="Content">The email address you provided above will be the major email address which our Bank will use for most of the communications. This will also be used for receiving the email reminder on the day of e-statement/e-Advice delivery.</font></td>
      </tr>
      
      <tr>
        <td valign="top"><font class="CONTENT"><font color="red">#</font></font></td>
        <td><font class="CONTENT"><font color="red">This hyperlink may allow you to leave FIrst Bank Limited website. The website accessed through this hyperlink may not provide you with any regulatory protections. First Bank Limited has no control over the linked website and is not liable for your use of the hyperlinked website.
                </font></font></td>
      </tr>
    </tbody></table>
</form>