<?php
class Content{
    function homePage(){
        $retval = <<<EOS
<h1>Welcome $user.<h1>
EOS;
    }
}
?>