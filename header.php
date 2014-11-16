<header>
    <h1 id="welcomeMessage">
       <span class="logo"><span class="logo_first">First</span><span class="logo_Bank">Bank</span></span> 
       <p> Welcome <?php echo '$user_name';?>. </p>
    </h1>
    <div id="sessionInfo">
        <p>User: <a href="#" id="userSettings"><?php echo '$Username';?></a></p>
        <p>Login date: <?php echo '$UserLoginTime';?></p>
        <p>Status: <?php echo '$ServiceStatus';?></p>
    </div>
    <form name="logoutForm" method="POST" action="index.php">
        <input type="submit" name="logout" value="logout">
    </form>
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