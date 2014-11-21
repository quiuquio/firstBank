<header>
    <div class="logoContainer left">
        <img src="imgs/e-banking32.gif">
    </div>
    <h1 id="welcomeMessage">
       <!--<span class="logo"><span class="logo_first">First</span><span class="logo_Bank">Bank</span></span>-->
       <p> Welcome <?php
            if (isset($_SESSION["uid"]) && $_SESSION["login"]==1) {
                echo "{$_SESSION['firstn']}";
            }
            else{
                echo " to First Bank";
            }
     ?> </p>
    </h1>
    <?php
     if (isset($_SESSION["uid"]) && $_SESSION["login"]==1) {
    ?>
    <div id="sessionInfo">
        <p>User: <a href="#" id="userSettings"><?php echo "{$_SESSION['firstn']} {$_SESSION['lastn']}";?></a></p>
        <p>Last login date: <?php echo "{$_SESSION['lastlogin']}";?></p>
        <!--<p>Status: <?php echo '$ServiceStatus';?></p>-->
        <form id="logoutForm" name="logoutForm" method="POST" action="index.php">
            <input type="submit" name="logout" value="logout">
        </form>
    </div>
    <?php 
    }
    ?>
    <script type="text/javascript">
        $('#userSettings').click(function(evt){
            var form = $("#menuForm")[0]; // we need to use jquery to acces the next functions
            form.setAttribute("action", "index.php");
            form.setAttribute("method", "POST");
            var input = $("#selectedPage")[0];
            input.setAttribute('value', "userSettings");
            //form.submit();
            input.click();
        });
    </script>
</header>