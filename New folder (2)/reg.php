<?php
mysql_select_db('sms_control',mysql_connect('localhost', 'root', ''))or die('error');


$name=$_POST['name'];
$lname=$_POST['lname'];
$position=$_POST['position'];
$address=$_POST['address'];
$contact_number=$_POST['contact_number'];
$stado=$_POST['stado'];


echo $mobile_number=substr($_POST['mobile_number'],1);
$sql="INSERT INTO contact(name, lname, position, address, contact_number,stado) VALUES ( '$name', '$lname', '$position', '$address', '+63$contact_number','Register')";
$result=mysql_query($sql);
if(!$result)
{
echo "error";
}else
{
header('refresh:1;save.php');
}
?>