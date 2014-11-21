<font class="title2">Online Mortgage Application Form</font>

<?php
if(isset($_POST['mortgageRequestSent'])){
//addLoanRecord($address, $title, $tel, $mobile, $email);
$address = "{$_POST['RoomOrFlat']}, {$_POST['Flat']}, {$_POST['Floor']}, {$_POST['Block']}, {$_POST['Building']}, {$_POST['Estate']}, {$_POST['StreetNo']}, {$_POST['StreetName']}, {$_POST['HomeDistrict']}";
$title = "{$_POST['title']}";
$email = "{$_POST['EmailAddress']}";
$tel = "{$_POST['ResideTelNo']}";
$mobile = "{$_POST['PagerMobile']}";
$staffName = $db->addLoanRecord($address, $title, $tel, $mobile, $email);
echo "
<div class='stdBox'>
<p>
Thank you for you interest in our loans and mortgages. Your request will be handled by our staff member
<b>{$staffName}</b> and you will be contacted soon.
</p>
</div>
";
}
?>

<form method="POST" action="" name="" autocomplete="off"> 
        <div class='stdBox'>
            <h3>Project loans</h3>
            <p>Project loans are for a specific project and financial intermediation approach, which is an international, a form of long-term loans, project loans for short.</p>

            <h3>Working capital loans</h3>
            <p>Working capital loan is to meet the producers and traders in the production process in the short-term funding needs, to ensure normal production and business activities of loans issued.</p>

            <h3>Chattel financing</h3>
            <p>"Chattel financing business" refers to the right of companies to chattel or goods owned or third-party legal owner of arrival / pledge, chattel or corporate or bank the right to regulate credit cargo business.</p>

            <h3>Order Financing</h3>
            <p>An enterprise buyer with good credit product orders, in mature technology, production capacity is guaranteed and can provide effective security conditions and provide special loans from banks for the purchase of materials production enterprises, enterprises after receipt of payment to repay the loan immediately business.</p>

            <h3>Revolving loan</h3>
            <p>Revolving loan is a personal housing credit business cycle refers to the commodity housing mortgage customers to the bank, you can get a certain amount of the loan, customers can be divided into sub withdrawals within the mortgage term, recycling, the amount does not exceed the available single with money, simply fill out the withdrawal form the customer, without special approval again, usually one hour you can withdraw cash.</p>
        </div>           
        <br>
        <table width="99%" border="0" cellpadding="3">
                <tbody><tr>
                    <td><font class="CONTENT">
                    Note: Applicants should be residents of the
                    Hong Kong Special Administrative Region, aged 18 or above.
                    </font></td>
                </tr>
        </tbody>
        </table>
        <table border="0" cellpadding="3" width="99%">
                <tbody><tr>
                        <td class="MiddleGrey" colspan="2"><font class="CONTENT">Please fill
                        in the following information to apply for more specific information online.</font></td>
                </tr>
                <tr>
                        <td class="MiddleGrey" colspan="2"><font class="BlackTitle">Applicant Personal Information</font></td>
                </tr>
                <tr class="LightGrey" valign="top">
                        <td width="40%"><font class="CONTENT">Title:</font></td>
                        <td> 
                            <input type="radio" name="title" value="Mr." checked> 
                            <font class="CONTENT">Mr. </font> 
                            <input type="radio" name="title" value="Miss"> 
                            <font class="CONTENT">Miss.</font> 
                            <input type="radio" name="title" value="Mrs."> 
                            <font class="CONTENT">Mrs.</font>
                            <input type="radio" name="title" value="Ms."> 
                            <font class="CONTENT">Ms.</font>
                        </td>
                </tr>
                <tr class="LightGrey" valign="top">
                        <td><font class="CONTENT">Surname*:</font></td>
                        <td><font class="CONTENT"><?php echo "{$_SESSION['lastn']}"?></font></td>
                </tr>
                <tr class="LightGrey" valign="top">
                        <td><font class="CONTENT">Given Name*:</font></td>
                        <td><font class="CONTENT"><?php echo "{$_SESSION['firstn']}"?></font></td>
                </tr>
                <tr class="LightGrey" valign="top">
                        <td><font class="CONTENT">Age*:</font></td>
                        <td><font class="CONTENT"><?php echo "{$_SESSION['age']}"?></font></td>
                </tr>
                <tr>
                        <td class="LightGrey"><font class="CONTENT">Residential Address*:</font></td>
                        <td class="LightGrey" valign="TOP"><?php echo "{$_SESSION['addr']}"?></td>
                </tr>
                <tr>

                        <td align="right" class="LightGrey"><font class="CONTENT"> 
                        <input type="radio" name="RoomOrFlat" value="0" checked="checked"> Room &nbsp;
                        &nbsp; 
                        <input type="radio" name="RoomOrFlat" value="1"> Flat</font></td>
                        <td class="LightGrey" valign="TOP">
                        <font class="CONTENT"> 
                        <input type="text" name="Flat"  autocomplete="off" size="5" maxlength="5" value=""> 
                        Floor 
                        <input type="text" name="Floor" autocomplete="off" size="5" maxlength="3" value=""> 
                        Block
                        <input type="text" name="Block" autocomplete="off" size="5" maxlength="5" value=""> 
                        </font>
                        </td>
                </tr>
                <tr>
                        <td align="right" class="LightGrey"><font class="CONTENT">Building</font></td>
                        <td class="LightGrey" valign="TOP"><font class="CONTENT"> <input type="text" name="Building" autocomplete="off" size="30" maxlength="35" value=""> </font></td>
                </tr>
                <tr>
                        <td align="right" class="LightGrey"><font class="CONTENT">Estate / Court</font></td>
                        <td class="LightGrey" valign="TOP"><input type="text" name="Estate" autocomplete="off" size="30" maxlength="35" value=""></td>
                </tr>
                <tr>
                        <td align="right" class="LightGrey"><font class="CONTENT">Street No.</font></td>
                        <td class="LightGrey" valign="TOP"><font class="CONTENT"> <input type="text" name="StreetNo" onkeypress="return disableEnterKey(event)" autocomplete="off" size="5" maxlength="5" value=""> Street Name <input type="text" name="StreetName" onkeypress="return disableEnterKey(event)" autocomplete="off" size="25" maxlength="30" value=""> </font></td>
                </tr>
                <tr>
                        <td class="LightGrey" align="right"><font class="CONTENT">District</font></td>
                        <td class="LightGrey" valign="TOP"><font class="SELECT"> <font class="CONTENT"> <select name="HomeDistrict">
<option value="09~~HONG KONG ISLAND">-----HONG KONG ISLAND-----</option>
<option value="06~~Aberdeen">Aberdeen</option>
<option value="00~~Causeway Bay">Causeway Bay</option>
<option value="07~~Central">Central</option>
<option value="79~~Central Mid Level">Central Mid-Level</option>
<option value="08~~Chai Wan">Chai Wan</option>
<option value="01~~East Point">East Point</option>
<option value="20~~Happy Valley">Happy Valley</option>
<option value="21~~Kennedy Town">Kennedy Town</option>
<option value="02~~North Point">North Point</option>
<option value="22~~Pokfulam">Pokfulam</option>
<option value="23~~Quarry Bay">Quarry Bay</option>
<option value="24~~Repulse Bay">Repulse Bay</option>
<option value="25~~Sai Ying Pun">Sai Ying Pun</option>
<option value="03~~Shaukiwan">Shaukiwan</option>
<option value="26~~Shek Tong Tsui">Shek Tong Tsui</option>
<option value="27~~Stanley">Stanley</option>
<option value="28~~Tai Hang">Tai Hang</option>
<option value="29~~Tai Koo Shing">Tai Koo Shing</option>
<option value="04~~The Peak">The Peak</option>
<option value="30~~Wah Fu Estate">Wah Fu Estate</option>
<option value="05~~Wanchai">Wanchai</option>
<option value="31~~Wong Chuk Hang">Wong Chuk Hang</option>
<option value="16~~KOWLOON">-----KOWLOON-----</option>
<option value="69~~Cha Kwo Ling">Cha Kwo Ling</option>
<option value="32~~Cheung Sha Wan">Cheung Sha Wan</option>
<option value="33~~Choi Hung">Choi Hung</option>
<option value="34~~Ho Man Tin">Ho Man Tin</option>
<option value="35~~Hung Hom">Hung Hom</option>
<option value="36~~Kowloon Bay">Kowloon Bay</option>
<option value="11~~Kowloon City">Kowloon City</option>
<option value="37~~Kowloon Tong">Kowloon Tong</option>
<option value="12~~Kwun Tong">Kwun Tong</option>
<option value="38~~Lai Chi Kok">Lai Chi Kok</option>
<option value="70~~Lai King">Lai King</option>
<option value="39~~Lam Tin">Lam Tin</option>
<option value="40~~Lei Yue Mun">Lei Yue Mun</option>
<option value="41~~Lok Fu">Lok Fu</option>
<option value="42~~Ma Tau Kok">Ma Tau Kok</option>
<option value="43~~Meifoo Sun Chuen">Meifoo Sun Chuen</option>
<option value="13~~Mongkok">Mongkok</option>
<option value="44~~Ngau Tau Kok">Ngau Tau Kok</option>
<option value="45~~San Po Kong">San Po Kong</option>
<option value="46~~Sau Mau Ping">Sau Mau Ping</option>
<option value="14~~Sham Shui Po">Sham Shui Po</option>
<option value="47~~Shek Kip Mei">Shek Kip Mei</option>
<option value="48~~So Uk Estate">So Uk Estate</option>
<option value="49~~Tai Kok Tsui">Tai Kok Tsui</option>
<option value="50~~To Kwa Wan">To Kwa Wan</option>
<option value="10~~Tsim Sha Tsui">Tsim Sha Tsui</option>
<option value="51~~Tsz Wan Shan">Tsz Wan Shan</option>
<option value="52~~Wang Tau Hom">Wang Tau Hom</option>
<option value="53~~Wong Tai Sin">Wong Tai Sin</option>
<option value="54~~Yau Tong">Yau Tong</option>
<option value="55~~Yau Yat Chuen">Yau Yat Chuen</option>
<option value="15~~Yau Ma Ti">Yau Ma Ti</option>
<option value="19~~NEW TERRITORIES">-----NEW TERRITORIES-----</option>
<option value="56~~Castle Peak">Castle Peak</option>
<option value="57~~Fan Ling">Fan Ling</option>
<option value="77~~Hung Shui Kiu">Hung Shui Kiu</option>
<option value="58~~Kwai Chung">Kwai Chung</option>
<option value="73~~Ma On Shan">Ma On Shan</option>
<option value="74~~Ma Wan">Ma Wan</option>
<option value="59~~Sai Kung">Sai Kung</option>
<option value="72~~Sham Tseng">Sham Tseng</option>
<option value="60~~Shatin">Shatin</option>
<option value="61~~Sheung Shui">Sheung Shui</option>
<option value="62~~Tai Po">Tai Po</option>
<option value="75~~Tin Shui Wai">Tin Shui Wai</option>
<option value="80~~Tseung Kwan O">Tseung Kwan O</option>
<option value="71~~Tsing Yi">Tsing Yi</option>
<option value="17~~Tsuen Wan">Tsuen Wan</option>
<option value="63~~Tuen Mun">Tuen Mun</option>
<option value="76~~Tung Chung">Tung Chung</option>
<option value="78~~Wo Sang Wai">Wo Sang Wai</option>
<option value="18~~Yuen Long">Yuen Long</option>
<option value="68~~OUTLYING ISLANDS">-----OUTLYING ISLANDS-----</option>
<option value="66~~Cheung Chau">Cheung Chau</option>
<option value="64~~Discovery Bay">Discovery Bay</option>
<option value="65~~Lamma Island">Lamma Island</option>
<option value="67~~Peng Chau">Peng Chau</option>
<option value="NIL" selected="selected"> </option>

                        </select> </font> </font></td>
                </tr>
<tr>
        <td align="LEFT" class="LightGrey"><font class="CONTENT">Residential Tel. No.:</font></td>
        <td class="LightGrey" valign="TOP"><input type="text" name="ResideTelNo" autocomplete="off" size="15" maxlength="13"</td>
</tr>
<tr>
        <td align="LEFT" class="LightGrey"><font class="CONTENT">Mobile Phone/Pager No.:</font></td>
        <td class="LightGrey" valign="TOP"><input type="text" name="PagerMobile" autocomplete="off" size="15" maxlength="13"</td>
</tr>
<tr>
        <td class="LightGrey"><font class="CONTENT">e-mail Address:</font></td>
        <td class="LightGrey"><input type="text" name="EmailAddress" autocomplete="off" size="35" maxlength="35"</td>
</tr>
        </tbody></table>
        <input type="text" id="#selectedPage" name="selectedPage" value="mortgage" hidden>
        <input name="mortgageRequestSent" value="1" hidden>
        <button id="button" class="bigButton" type="submit">Submit</button>
</form>