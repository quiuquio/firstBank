<div id="rightcolumn">
    <a href="#" title="Realtime information about selected equities, comodities, bonds and Foreign Exchange are available for you.">
    <?php require("tradingInfo.php");?>
    </a>
    <div id="targetAdvertisemnet">     
        <?php
            if(isset($_SESSION) and isset($_SESSION['tad'])){
                //var_dump($_SESSION);
                $p  = rand(0,sizeof($_SESSION['tad'])-1);
                echo $_SESSION['tad'][$p];
            }
        ?>
    </div>
</div>