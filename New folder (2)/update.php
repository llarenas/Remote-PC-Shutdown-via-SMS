
<?php 
include 'conn.php';
$id=$_POST['id'];
$result=mysql_query("SELECT * FROM  contact where id='$id'");
while($row=mysql_fetch_array($result))
{
$id=$row['id'];
$name=$row['name'];
$lname=$row['lname'];
$position=$row['position'];
$address=$row['address'];
$mobile_number=$row['mobile_number'];
}
echo "
<form  action='update2.php' method='post'>
<table>
</table>
<tr><td><input type='HIDDEN' name='id' value='$id'></td></tr>
<tr><td>Name</td><td><input type='text'  name='name' value='$name'></td></tr>
<tr><td>Last name</td><td><input type='text'  name='lname' value='$lname'></td></tr>
<tr><td>Position</td><td><input type='text'  name='position' value='$position'></td></tr>
<tr><td>Address</td><td><input type='text'  name='address' value='$address'></td></tr>
<tr><td>Mibile number</td><td><input type='text'  name='mobile_number' value='$mobile_number'></td></tr>
<tr><td><input type='submit' name='sumbit' id='submit' value='Submit'></td></tr>
</table>
	</form>";
	?>