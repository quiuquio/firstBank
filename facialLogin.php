<script type="text/javascript" src="js/FCClientJS.js"></script>
<form name="menu" id="menuForm">
    <input type="submit" id="selectedPage" name="selectedPage" value="" hidden>
</form>
<div style="text-align:center; display:block">
    <video id="video" width="640" height="480" autoplay></video>
    <button id="snap" class="">Try to login</button>
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
    <input class="unblockButton" type="submit" value="Unblock">
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
                var usr = {name: $("#userName").val(), label: $("#userLabel").val()};
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
                        console.log("Succes!!! data:", evt);
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
            var form = $("#menuForm")[0]; // we need to use jquery to acces the next functions
            form.setAttribute("action", "index.php");
            form.setAttribute("method", "POST");
            var input = $("#selectedPage")[0];
            input.setAttribute('value', "facialsuccess");
            //form.submit();
            input.click();
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
