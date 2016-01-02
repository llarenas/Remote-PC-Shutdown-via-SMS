<?php
include 'conn.php';
if (isset($_POST['MN']))
{
echo $mobile_number=substr($_POST['mobile_number'],0);
$name=$_POST['name'];
$lname=$_POST['lname'];
$position=$_POST['position'];
$address=$_POST['address'];
$contact_number=$_POST['contact_number'];
$stado=$_POST['stado'];
mysql_query("Insert into  faculty_info (name, lname, position, address,mobile_number,stado) values ('$name', '$lname', '$position', '$address','+63$mobile_number','Registered')") or die(mysql_error());
header('Location:index.php');
}
$sql = mysql_query('Select * from inbox') or die (mysql_error());
$count3 = mysql_num_rows($sql);
$result = mysql_query($sql);
while($row = mysql_fetch_array($sql))
{
$receivedtime=$row['receivedtime'];
     $tagapasa = $row['sender'];
     $mensahi = $row['msg'];	 
}
$sql2 = mysql_query("Select * from  faculty_info where mobile_number='$tagapasa'") or die (mysql_error());
$count2 = mysql_num_rows($sql2);
$result2 = mysql_query($sql2);
$count2;
while($row=mysql_fetch_array($sql2))
{
$mobile_number=$row['mobile_number'];
  $stado = $row['stado'];
  $status= $row['status'];
   $name= $row['name'];
   $lname=$row['lname'];
}
if($count3 != 0)
{
		if($count2 != 0)
		{	
				if($mensahi == 'Off' || $mensahi == 'off' || $mensahi == 'OFF' || $mensahi == '0ff' || $mensahi == 'oFf' || $mensahi == 'ofF' || $mensahi == 'oFF' || $mensahi == 'OfF')
				{	
				
                mysql_query("Insert into outbox (receiver, msg, senttime, status) values ('$tagapasa', 'Your computer is now booting down','$senttime','send')") or die(mysql_error());							
				echo "<a style='background-color:red; border:4px ridge green; width:100; height:260; '><font size='5' color='white'> Power Down</font></a>";
				mysql_query("INSERT INTO user (reciever, msg, senttime, number) values 
				('$name $lname','Ang nag patay ka computer.','$receivedtime','$tagapasa')") or die (mysql_error());
                exec ('shutdown.vbs');
				exec ('shutdown.bat');
				mysql_query("Delete from inbox") or die (mysql_error());
				
				}
				else
				{
				echo "<font size='3' color='white'> Invalid Key Word  </font>";		        
				mysql_query("Insert into outbox (receiver, msg, senttime, status) values ('$tagapasa', 'Sorry, you have entered an invalid keyword. Please check and try again.','$senttime','send')") or die(mysql_error());
				mysql_query("INSERT INTO user (reciever, msg, senttime, number) values 
				('$name $lname','Indi amo iya key word.','$receivedtime','$tagapasa')") or die (mysql_error());
				mysql_query("Delete from inbox") or die (mysql_error());
						
				}
				
		}
else
{
mysql_query("Insert into outbox (receiver, msg, senttime, status) values ('$tagapasa', 'You are not registered to the system.','$senttime','send')") or die(mysql_error());
echo "<a style='background-color:orange; border:4px ridge green; width:90; height:40; '><font size='3' color='white'> Not Registered </font></a>";
mysql_query ("insert into receiver (number,Text) values ('$tagapasa','$mensahi')") or die (mysql_error());
mysql_query("INSERT INTO user (reciever, msg, senttime, number) values 
				('$name $lname','Wala pasa sa ka rehistro sa system.','$receivedtime','$tagapasa')") or die (mysql_error());
mysql_query("Delete from inbox") or die (mysql_error());
				
}


}
else
{
echo"No Text";	
}


?>	





