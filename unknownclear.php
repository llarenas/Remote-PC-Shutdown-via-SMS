<?php
include'conn.php';
$id=$_GET ['id'];
mysql_query("delete from receiver") or die (mysql_error());
header('location:go.php');


?>