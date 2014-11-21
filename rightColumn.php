<div id="rightcolumn">
    <?php require("tradingInfo.php");?>
    <div id="targetAdvertisemnet">     
        <?php
            if(isset($_SESSION)){
                //var_dump($_SESSION);
                $p  = rand(0,sizeof($_SESSION['tad']));
                echo $_SESSION['tad'][$p];
            }
        ?>
    </div>
</div>