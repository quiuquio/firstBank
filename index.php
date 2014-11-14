<?php
require_once('session.php');
echo    '
        <link rel="stylesheet" type="text/css" href="styles/main.css">
        <link media="screen" href="styles/jquery.msg.css" rel="stylesheet" type="text/css">
        ';
echo    '
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery.center.js"></script>
        <script type="text/javascript" src="js/jquery.msg.js"></script>
        ';
echo "<div id='wrapper'>";
require('header.php');
require('leftColumn.php');
require('main.php');
require('rightColumn.php');
require('footer.php');
echo "</div>";
?>