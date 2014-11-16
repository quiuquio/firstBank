<?php
require_once('session.php');
echo    '
        <link rel="stylesheet" type="text/css" href="styles/main.css">
        <link rel="stylesheet" type="text/css" href="styles/jquery-ui.min.css">
        <link rel="stylesheet" type="text/css" href="styles/jquery-ui.structure.min.css">
        <link rel="stylesheet" type="text/css" href="styles/jquery-ui.theme.min.css">
        ';
echo    '
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/jquery.blockUI.js"></script>
        <script src="https://code.jquery.com/jquery-migrate-1.2.1.js"></script>
        ';
?>
<script>
  $(function() {
    $( document ).tooltip();
  });
  </script>
<?php
echo "<div id='wrapper'>";
require('header.php');
require('leftColumn.php');
require('main.php');
require('rightColumn.php');
require('footer.php');
echo "</div>";
?>