<?php
require_once('session.php');
echo '<link rel="stylesheet" type="text/css" href="styles/main.css">';
echo    '
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery.blockUI.js"></script>
        <script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>
        ';
echo "<div id='wrapper'>";
require('header.php');
require('leftColumn.php');
require('main.php');
require('rightColumn.php');
require('footer.php');
echo "</div>";
?>