<?php
session_start();
session_unset();
echo '<link rel="stylesheet" type="text/css" href="styles/main.css">';
echo    '<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="js/jquery.blockUI.js"></script>';
echo "<div id='wrapper'>";
require('header.php');
require('leftColumn.php');
require('main.php');
require('rightColumn.php');
require('footer.php');
echo "</div>";
?>