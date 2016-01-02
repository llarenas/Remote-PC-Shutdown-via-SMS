<?php
if(isset($_GET["pasa"]))
{
	$pasa=$_GET["pasa"];
}
?>
<?php
include "conn.php";

$sql="SELECT * FROM inbox where sender='$pasa'";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result)){
$id=$row['id'];
echo $sender=$row['sender'];
$msg=$row['msg'];
}

$sql1="INSERT INTO outbox(receiver, msg) VALUES ('$sender','Your computer is not Booting down because you are not registered in the system!')";

//mysql_query ("delete from inbox") or die (mysql_error());
//header("Location:index.php");


?>