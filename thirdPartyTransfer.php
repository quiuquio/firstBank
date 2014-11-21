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
            <td class="LightGrey" height="25"><font class="CONTENT">Beneficiary name:</font></td>
            <td class="LightGrey" height="25">
                <input type="text" name = "beneficiaryname" />
            </td>
        </tr>
        <tr>
            <td class="LightGrey" colspan="2" height="25"><font class="CONTENT">To Account:</font></td>
        </tr>
        <tr>
                <td class="LightGrey">
                <table border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                        <tr>
                            <td><font class="CONTENT">
                            <font class="CONTENT">Bank Code - Payee Account:</font></font></td>
                        </tr>
                </tbody></table>
                </td>
                <td class="LightGrey">
                <font class="CONTENT"><br>                
                <input type="text" maxlength="3" id="bankCode" name="bCode"/> -
                <input type="text" name="targetDes" autocomplete="off" size="16" maxlength="11" value=""><br>
                (Please input number only and omit '-' and spaces.<br> For First Bank accounts the Bank Code is not required.)</font>
                </td>
        </tr>


        <tr>
            <td class="LightGrey"><font class="CONTENT">Amount:</font></td>
            <td class="LightGrey"><font class="SELECT">
            HK$ <input type="text" name="debitAmountInput" autocomplete="off" size="14" maxlength="14" value=""></td>
        </tr>

        <tr>
            <td class="LightGrey">
            <table border="0" cellspacing="0" cellpadding="0">
                    <tbody><tr>
                            <td>
                            <input type="radio" name="WhenToPay" value="1" checked="checked">
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
                            <input type="radio" name="WhenToPay" value="0">
                            <font class="CONTENT">Transfer Date</font></td>
                    </tr>
                </tbody>
            </table>
            </td>
            <td class="LightGrey"><font class="SELECT">
                <select name="effDate">
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
            <td class="LightGrey">
            <input type="text" name="remark" autocomplete="off" size="40" maxlength="60" value="">
            </td>
        </tr>
        <tr>
            <td class="LightGrey" valign="top"><font class="CONTENT">Message for Recipient:</font></td>
            <td class="LightGrey">
            <textarea id="msg4R"></textarea>
            </td>
        </tr>    
        </tbody></table>
        <input type="text" id="#selectedPage" name="selectedPage" value="3rdPartyTransfer" hidden>
        <input type="text" id="#confirmed" name="confirmed" value="yes" hidden>
        <button id="button" class="bigButton" type="submit" disabled>Submit</button>
        <label for="button" class="bigButton" id="btnLabel">(Use facial recognition to enable payment.)</label>
        <?php 
            if(isset($_POST['confirmed'])){
                if ($_POST['WhenToPay'] == 0 ){
                    if($_POST['bCode'] !="" ){
                        echo $db->addTimedTransfer($_POST['source'], $_POST['targetDes'], "", $_POST['debitAmountInput'], $_POST['effDate'], "fixed", $_POST['remark'], 1, 1) ? "Transaction scheduled." : "Transcation not scheduled.";
                    }
                    else{
                        echo $db->addTimedTransfer($_POST['source'], $_POST['targetDes'], "", $_POST['debitAmountInput'], $_POST['effDate'], "fixed", $_POST['remark'], 0, 1) ? "Transaction scheduled." : "Transcation not scheduled.";
                    }
                }else{
                    if($_POST['bCode'] !="" ){
                        echo $db->mTransfer($_POST['source'], $_POST['targetDes'], $_POST['debitAmountInput'], $_POST['remark'], TRUE) ? "Transaction successful." : "Transcation failed.";
                        //echo $db->mTransfer($_POST['source'], 123456789011, 123, "", TRUE) ? "Transaction successful." : "Transcation failed.";        
                    }else{
                        echo $db->mTransfer($_POST['source'], $_POST['targetDes'], $_POST['debitAmountInput'], $_POST['remark'], FALSE) ? "Transaction successful." : "Transcation failed.";
                    }
                }
            }else{
                echo "";
            }

        ?>
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

<script type="text/javascript" src="js/FCClientJS.js"></script>
<form name="menu" id="menuForm">
    <input type="submit" id="selectedPage" name="selectedPage" value="" hidden>
</form>
<div style="text-align:center; display:block">
    <video id="video" width="640" height="480" autoplay></video>
    <button id="snap" class="sexyButton">Snap Photo</button>
    <input id="userName" type="text" name="username" value="<?php echo $_POST['user_name']?>" hidden>
    <input id="userLabel"type="text" name="label" value="bank user" hidden>
    <canvas id="canvas" width="640" height="480" hidden></canvas>
</div>
<div id="trainingResult"></div>

<!-- Messages for this page -->
<div id="domMessage" style="display:none;"> 
    <h1>We are processing your request.  Please be patient.</h1> 
</div>
<div id="errorInFacialLogin" style="display:none;"> 
    <h1>
        We were not able to recognize you from the last snapshot. Please try again or proceed with the traditional login.
    </h1> 
    <input class="unblockButton" type="submit" onclick="window.location.reload();" value="Unblock">
</div>


<script>
    // Put event listeners into place
    window.addEventListener("DOMContentLoaded", function() {
        // Grab elements, create settings, etc.
        $('.unblockButton').click(function() { 
            $.unblockUI(); 
        });  

        var canvas = document.getElementById("canvas"),
            context = canvas.getContext("2d"),
            video = document.getElementById("video"),
            videoObj = { "video": true },
            errBack = function(error) {
                console.log("Video capture error: ", error.code); 
            };

        // Put video listeners into place
        if(navigator.getUserMedia) { // Standard
            navigator.getUserMedia(videoObj, function(stream) {
                video.src = stream;
                video.play();
            }, errBack);
        } else if(navigator.webkitGetUserMedia) { // WebKit-prefixed
            navigator.webkitGetUserMedia(videoObj, function(stream){
                video.src = window.webkitURL.createObjectURL(stream);
                video.play();
            }, errBack);
        } else if(navigator.mozGetUserMedia) { // WebKit-prefixed
            navigator.mozGetUserMedia(videoObj, function(stream){
                video.src = window.URL.createObjectURL(stream);
                video.play();
            }, errBack);
        }

        // Trigger photo take
        document.getElementById("snap").addEventListener("click", function() {
            context.drawImage(video, 0, 0, 640, 480);
            var dataUrl = canvas.toDataURL('image/jpeg', 1.0);
            var u = "<?php echo "{$_SESSION['unickname']}"?>";
            var l = "<?php echo "{$_SESSION['firstn']} {$_SESSION['lastn']}"?>";
            var usr = {name: u, label: l};
            //trainFacialRecognition([dataURItoBlob(dataUrl)], usr);
            login(dataUrl, usr);
        });

    }, false);
    
</script>
<script type="text/javascript">
    //Facial recognition important vars;
    var apiKey = "759d6252abc641d3a1b59d35e985adeb";
    var apiSecret = "80cd6120f1b3432cb38d4c21803e2c95";
    var storeNamespace = "banktestspace";

    function dataURItoBlob(dataURI) {
        var binary = atob(dataURI.split(',')[1]);
        var array = [];
        for (var i = 0; i < binary.length; i++) {
            array.push(binary.charCodeAt(i));
        }
        return new Blob([new Uint8Array(array)], { type: 'image/jpeg' });
    }

    function login(image, usr) {
        $.blockUI({ message: $('#domMessage') });
        var client = new FCClientJS( apiKey, apiSecret);

        //client.facesRecognize('guido', 'http://farm1.static.flickr.com/41/104498903_bad315cee0.jpg', null, {namespace: "banktestspace"}, callback);

        var blob = dataURItoBlob(image);
        console.log("files:", blob);

        //the 'file' field must be an array!!! Hurray!
        client.facesRecognize(usr.name, null, [blob], {namespace: "banktestspace"}, 
            function(evt){
                evt = parseHelp(evt);
                asd = evt;
                console.log(evt);
                if(evt.photos[0].tags.length == 0){
                    $.unblockUI();
                    $.blockUI({message: $('#errorInFacialLogin')});
                    console.log("FAIL!!! data:", evt);
                }
                else if (evt.photos[0].tags[0].uids.length > 0 && evt.photos[0].tags[0].uids[0].confidence > 45) {
                    $.unblockUI();
                    //$_SESSION['user'] = user.name;
                    //console.log("Succes!!! data:", evt);
                    loginSuccess(evt);
                } else {
                    $.unblockUI();
                    $.blockUI({message: $('#errorInFacialLogin')});
                    console.log("FAIL!!! data:", evt);
                    //loginFail(evt);
                }
            });
    }

    function trainFacialRecognition(imgArray, usr){
        var client = new FCClientJS( apiKey, apiSecret);
        client.facesDetect(null, imgArray, {}, 
            function(evt){
                evt = parseHelp(evt);
                asd1 = evt;
                if( evt.status == "success" &&
                    evt.photos[0].tags.length > 0
                    ){
                    var tids = [];
                    evt.photos.forEach(function(p){
                        tids.push(p.tags[0].tid);
                    });
                    alert("facesDetect success");
                    //client.tagsSave( tids, user_name+"@banktestspace",...
                    client.tagsSave( tids, usr.name+"@banktestspace", {label: usr.label}, 
                        function(evt){
                            evt = parseHelp(evt);
                            asd2 = evt;
                            if(evt.status == "success"){
                                alert("tagsSave: succes");
                                client.facesTrain(usr.name+"@banktestspace", null, 
                                    function(evt){
                                        alert("facesTrain success");
                                        evt = parseHelp(evt);
                                        asd3 = evt;
                                        $("#trainingResult").append("<p>"+JSON.stringify(evt)+"</p>");
                                    }
                                );
                            }
                            else{
                                evt = parseHelp(evt);
                                $("#trainingResult").append("<p>"+JSON.stringify(evt)+"</p>");
                                alert("Something unexpected happened: cod_02");
                            }
                        }
                    );
                }
                else{
                    evt = parseHelp(evt);
                    trainingFail(evt);
                }
            }
        );
    }

    function loginSuccess(){
        $('#button').removeAttr('disabled');
        $('#btnLabel').html("Payment sumission is now enabled");
        /*var form = $("#menuForm")[0]; // we need to use jquery to acces the next functions
        form.setAttribute("action", "index.php");
        form.setAttribute("method", "POST");
        var input = $("#selectedPage")[0];
        input.setAttribute('value', "facialsuccess");
        //form.submit();
        input.click();*/
    }

    function parseHelp(ob){
        if(typeof ob != "object"){
            return JSON.parse(ob);
        }else{
            return ob;
        }
    }

    function trainingFail(data){
        alertHandling('trainingResult', 'alert-error', 'We could not train the model from your pictures'+JSON.stringify(data));
    }

    function alertHandling(id, type, message){
      $('#'+id).html('<div class="alert '+type+'"><a class="close" data-dismiss="alert">x</a><span>'+message+'</span></div>')
    }
</script>






<?php
//var_dump($_POST);
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