<?php
mysql_query("Delete from inbox") or die (mysql_error());
header("Location:index.php");
?>