<div id="rightcolumn">
    <?php require("tradingInfo.php");?>
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