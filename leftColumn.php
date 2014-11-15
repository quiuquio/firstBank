<div id="leftcolumn">
        <div id="accordian">
        <ul>
            <li>
                <h3><span class="icon-dashboard"></span>Account</h3>
                <ul>
                    <li><a href="#">Select account</a></li>
                    <li><a href="#">List Transactions</a></li>
                    <li><a href="#">Saving account</a></li>
                    <li><a href="#">User settings</a></li>
                </ul>
            </li>
            <!-- class="active" will keep this LI open by default -->
            <li class="active">
                <h3><span></span>Paymets</h3>
                <ul>
                    <li><a href="#">Make a payment</a></li>
                    <li><a href="#">Set up recurring payments (Bills...)</a></li>
                </ul>
            </li>
            <li>
                <h3><span></span>Financial Tools</h3>
                <ul>
                    <li><a href="#">Market Tracker</a></li>
                    <li><a href="#">Current Prices</a></li>
                </ul>
            </li>
            <li>
                <h3><span></span>Loans</h3>
                <ul>
                    <li><a href="#">What here?</a></li>
                    <li><a href="#">And here? No idea :D</a></li>
                </ul>
            </li>
            <!--<li>
                <h3><span class="icon-calendar"></span>Calendar</h3>
                <ul>
                    <li><a href="#">Current Month</a></li>
                    <li><a href="#">Current Week</a></li>
                    <li><a href="#">Previous Month</a></li>
                    <li><a href="#">Previous Week</a></li>
                    <li><a href="#">Next Month</a></li>
                    <li><a href="#">Next Week</a></li>
                    <li><a href="#">Team Calendar</a></li>
                    <li><a href="#">Private Calendar</a></li>
                    <li><a href="#">Settings</a></li>
                </ul>
            </li>-->
            <!--<li>
                <h3><span class="icon-heart"></span>Favourites</h3>
                <ul>
                    <li><a href="#">Global favs</a></li>
                    <li><a href="#">My favs</a></li>
                    <li><a href="#">Team favs</a></li>
                    <li><a href="#">Settings</a></li>
                </ul>
            </li>-->
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
    })
})

</script>
</div>