<?php
session_start();
session_unset();
echo '<link rel="stylesheet" type="text/css" href="styles/main.css">';
echo "<div id='wrapper'>";
require('header.php');
require('leftColumn.php');
require('main.php');
require('rightColumn.php');
require('footer.php');
echo "</div>";
?>