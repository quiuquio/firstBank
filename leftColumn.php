<div id="leftcolumn">
        <div id="accordian">
        <ul>
            <li>
                <h3><span class="icon-dashboard"></span>Account</h3>
                <ul>
                    <li><a href="#">List Transactions</a></li>
                    <li><a href="#">Saving account</a></li>
                    <li><a href="#">Bill payment</a></li>
                    <li><a href="#">Electronic Transfer</a></li>
                </ul>
            </li>
            <!-- class="active" will keep this LI open by default -->
            <li class="active">
                <h3><span class="icon-tasks"></span>Paymets</h3>
                <ul>
                    <li><a href="#">Make a payment</a></li>
                    <li><a href="#">Urgent</a></li>
                    <li><a href="#">Overdues</a></li>
                    <li><a href="#">Recurring</a></li>
                    <li><a href="#">Settings</a></li>
                </ul>
            </li>
            <li>
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
            </li>
            <li>
                <h3><span class="icon-heart"></span>Favourites</h3>
                <ul>
                    <li><a href="#">Global favs</a></li>
                    <li><a href="#">My favs</a></li>
                    <li><a href="#">Team favs</a></li>
                    <li><a href="#">Settings</a></li>
                </ul>
            </li>
        </ul>
    </div>

<!-- prefix free to deal with vendor prefixes -->
<script src="http://thecodeplayer.com/uploads/js/prefixfree-1.0.7.js" type="text/javascript" type="text/javascript"></script>

<!-- jQuery -->
<script src="http://thecodeplayer.com/uploads/js/jquery-1.7.1.min.js" type="text/javascript"></script>    

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