<?php

mysql_connect('localhost','root','') or die ('ERROR');
mysql_select_db('sms_control') or die ('wrong database');
 
 if (isset($_GET['id']) && is_numeric($_GET['id']))
 {

 $id = $_GET['id'];
 
 $result = mysql_query("DELETE FROM faculty_info WHERE id=$id")
 or die(mysql_error()); 
 
  header("Location:sms_filter.php");
 }
 else
 {
 
 

 header("Location:index.php");

 }
 
?>