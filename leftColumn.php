<div id="leftcolumn">
        <form name="menu" id="menuForm">
            <input type="submit" id="selectedPage" name="selectedPage" value="" hidden>
        </form>
        <div id="accordian">
        <ul>
            <li>
                <h3><span class="icon-dashboard"></span>Account</h3>
                <ul>
                    <li id="selectAccount"><a href="#">Select account</a></li>
                    <li id="accountSummary"><a href="#">Account Summary</a></li>
                    <li id="listTransactions"><a href="#">List Transactions</a></li>
                </ul>
            </li>
            <!-- class="active" will keep this LI open by default -->
            <li class="active">
                <h3><span></span>Paymets</h3>
                <ul>
                    <li id="makePayments"><a href="#">Make a payment</a></li>
                    <li id="3rdPartyTransfer"><a href="#">Third Party transfer</a></li>
                    <li id="billPayment"><a href="#">Bill payment</a></li>
                    <li id="recurringPayments"><a href="#">Timed payments</a></li>
                </ul>
            </li>
            <li>
                <h3><span></span>Financial Tools</h3>
                <ul>
                    <li id="financialTracker"><a href="#">Market Tracker</a></li>
                    <li id="currentPrices"><a href="#">Current Prices</a></li>
                </ul>
            </li>
            <li>
                <h3><span></span>Loans</h3>
                <ul>
                    <li id="mortgage"><a href="#">Mortgage</a></li>
                    <li><a href="#">What here?</a></li>
                    <li><a href="#">And here? No idea :D</a></li>
                </ul>
            </li>
        </ul>
    </div>
    
<script type="text/javascript">
    $(document).ready(function(){
    $("#accordian h3").click(function(){
        //slide up all the link lists
        $("#accordian ul ul").slideUp();
        //slide down the link list below the h3 clicked - only if its closed
        if(!$(this).next().is(":visible"))
        {
            $(this).next().slideDown();
        }
    });

    /*$('#selectAccount').click(function(evt){
        var form = $("#menuForm")[0]; // we need to use jquery to acces the next functions
        form.setAttribute("action", "index.php");
        form.setAttribute("method", "POST");
        form.setAttribute('value','selectAccount');
        form.submit();
    });*/
    var menuButtons = $("#accordian ul li ul li"); //select all buttons in menu, but only the buttons.
    $.each(menuButtons, function(key, value){
        $('#'+value.id).click(function(evt){
            var form = $("#menuForm")[0]; // we need to use jquery to acces the next functions
            form.setAttribute("action", "index.php");
            form.setAttribute("method", "POST");
            var input = $("#selectedPage")[0];
            input.setAttribute('value', value.id);
            //form.submit();
            input.click();
        });
    });
})

</script>
</div>