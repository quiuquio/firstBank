<?php
require_once('htdocs/firstBank/db.php');
$db = new DB();
$db->checkTransactions();
$db->performTTransfer();

?>
