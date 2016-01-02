<?php
 include 'conn.php';
//Get values from form
$name=$_POST['name'];
$lname=$_POST['lname'];
$position=$_POST['position'];
$address=$_POST['address'];
$mobile_number=$_POST['mobile_number'];
$id=$_POST['id'];
//Insert data into mysql
$sql="update  contact set name='$name', lname='$lname',position='$position',address='$address' ,mobile_number='$mobile_number', where id='$id' ";
$result=mysql_query($sql);
if($result)
{
header("location:index.php");
}
?>