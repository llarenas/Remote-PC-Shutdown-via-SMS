<?php
include "conn.php";

//mysql_query("Delete from inbox") or die (mysql_error());
header("Location:sms_filter.php");

if (isset($_POST['MN']))
{
echo $mobile_number=substr($_POST['mobile_number'],1);
$name=$_POST['name'];
$lname=$_POST['lname'];
$position=$_POST['position'];
$address=$_POST['address'];
$contact_number=$_POST['contact_number'];
$stado=$_POST['stado'];
mysql_query("Insert into  faculty_info (name, lname, position, address,mobile_number,stado) values ('$name', '$lname', '$position', '$address','$mobile_number','Registered')") or die(mysql_error());
header('Location:index.php');
}
$sql = mysql_query('Select * from inbox') or die (mysql_error());
$count3 = mysql_num_rows($sql);
$result = mysql_query($sql);
while($row = mysql_fetch_array($sql))
{
     $tagapasa = $row['sender'];
     $mensahi = $row['msg'];	 
}
$sql2 = mysql_query("Select * from  faculty_info where mobile_number='$tagapasa'") or die (mysql_error());
$count2 = mysql_num_rows($sql2);
$result2 = mysql_query($sql2);
$count2;
while($row=mysql_fetch_array($sql2))
{
  $mobile_number = $row['mobile_number'];
  $stado = $row['stado'];
  $status= $row['status'];
}
if($count3 != 0)
{
		if($count2 != 0)
		{	
				if($mensahi == 'Off' || $mensahi == 'off' || $mensahi == 'OFF' || $mensahi == '0ff')
				{	
                mysql_query("Insert into outbox (receiver, msg, senttime, status) values ('$tagapasa', 'Your computer is now booting down','$senttime','send')") or die(mysql_error());							
				echo "<a style='background-color:red; border:4px ridge green; width:100; height:260; '><font size='5' color='white'> Power Down</font></a>";
				exec('shutdown.bat');
				mysql_query("Delete from inbox") or die (mysql_error());
				
				}
				else
				{
				echo "<font size='3' color='white'> Invalid Key Word  </font>";		        
				mysql_query("Insert into outbox (receiver, msg, senttime, status) values ('$tagapasa', 'Your keyword is invalid please check and try again.','$senttime','send')") or die(mysql_error());
				mysql_query("Delete from inbox") or die (mysql_error());
						
				}
				
		}
else
{
mysql_query("Insert into outbox (receiver, msg, senttime, status) values ('$tagapasa', 'You are not registered to the system.','$senttime','send')") or die(mysql_error());
echo "<a style='background-color:orange; border:4px ridge green; width:90; height:40; '><font size='3' color='white'> Not Registered </font></a>";
mysql_query ("insert into receiver (number,Text) values ('$tagapasa','$mensahi')") or die (mysql_error());
mysql_query("Delete from inbox") or die (mysql_error());
				
}


}
else
{
echo"No Text";	
}


?>	

