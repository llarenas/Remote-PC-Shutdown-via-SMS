<?php
include 'conn.php';
$id = $_GET ['id'];
mysql_query("Delete from outbox") or die (mysql_error());
header ('location: sentitems.php');
?>