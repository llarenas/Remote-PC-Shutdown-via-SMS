<?php
require("conn.php");
$id =$_REQUEST['id'];

$result = mysql_query("SELECT * FROM faculty_info WHERE id  = '$id'");
$test = mysql_fetch_array($result);
if (!$result) 
		{
		die("Error: Data not found..");
		}
				$mobile_number=$test['mobile_number'] ;
				$name= $test['name'] ;	
                 $lname = $test['lname'];				
				$position=$test['position'] ;
				$address=$test['address'] ;

if(isset($_POST['save']))
{	
                    
		          $mobile_number=$_POST['mobile_number'] ;
				$name= $_POST['name'] ;	
                 $lname = $_POST['lname'];				
				$position=$_POST['position'];
				$address=$_POST['address'];

	mysql_query("UPDATE faculty_info SET mobile_number ='$mobile_number', name ='$name',
		 lname ='$lname', position ='$position' , address ='$address' WHERE id = '$id'")
				or die(mysql_error()); 
	echo "Saved!";
	
	header("Location: index.php");	
echo"onload=' myFunction()'";	
}

?>
<?php
include 'header.php';
?>
</center><br>
<div style="background-color:gray; border-top-left-radius:1em; border-top-right-radius:1em; border:5px ridge Darkgray; width:auto; height:auto; radio:40;">
 <font size="5" color="white">  User Information	</font><center>




 <?php
 
 //connection
                                  include 'conn.php';
								  
				//--------------------------------------
	echo "<div style='clor:Black; font-size:12; '>";
	$per_page = 6;
	
	$result = mysql_query("SELECT * FROM faculty_info");
	$total_results = mysql_num_rows($result);
	$total_pages = ceil($total_results / $per_page);

	if (isset($_GET['page']) && is_numeric($_GET['page']))
	{
		$show_page = $_GET['page'];
		
		if ($show_page > 0 && $show_page <= $total_pages)
		{
			$start = ($show_page -1) * $per_page;
			$end = $start + $per_page; 
		}
		else
		{
			$start = 0;
			$end = $per_page; 
		}		
	}
	else
	{
	
		$start = 0;
		$end = $per_page; 
	}
	
	
	for ($i = 1; $i <= $total_pages; $i++)
	{
		echo "<a style='background-color:; border:2px ridge darkgreen; '  href='sms_filter.php?page=$i'><b>$i</b></a>";
		
	}

	echo "</table>";
		echo "<table title='User Information' style='background-color:; border:3px ridge white; cellpadding:26;'>";
		echo "<tr> <th style='background-color:gray; border:2px ridge gray;color:black; '>Phone number</th>
	<th style='background-color:gray; border:2px ridge gray; color:black; '>Name</th>
	<th style='background-color:gray; border:2px ridge gray; color:black;'>Last Name</th>
	<th style='background-color:gray; border:2px ridge gray;color:black; '>Position</th>
	<th style='background-color:gray; border:2px ridge gray; color:black;'>Address </th>
	<TH style='background-color:gray; border:2px ridge gray;color:black; '> Remove </th>
	<TH style='background-color:gray; border:2px ridge gray; color:black;'> Update </th>
	</tr>";
	
	for ($i = $start; $i < $end; $i++)
{
		
	if ($i == $total_results) { break; }

	echo '<tr>';
		echo '<td style="background-color:white; border:-1px ridge blue; ">' .  mysql_result($result, $i, 'mobile_number') . '</td>';
		echo '<td style="background-color:white; border:-1px ridge blue; ">' .  mysql_result($result, $i, 'name') . '</td>';
		echo '<td style="background-color:white; border:-1px ridge blue; ">' .  mysql_result($result, $i, 'lname') . '</td>';
		echo '<td style="background-color:white; border:-1px ridge blue; ">' . mysql_result($result, $i, 'position') . '</td>';
		echo '<td style="background-color:white; border:-1px ridge blue; ">' . mysql_result($result, $i, 'address') . '</td>';
		echo '<td style="background-color:lightgray; border:-1px ridge blue; "  title="Do want to delete this.? the info was gone."><a href="delete.php?id='  . mysql_result($result, $i, 'id'). '"><center><img src="image/DeleteRed.png" style="border:3px; border-color:red;" alt="some_text" width="25" height="25"></center></a></td>';
	echo '<td style="background-color:lightgray; border:-1px ridge blue; color:white; "  title="Do you want to change the user data..?"><a href="view.php?id='  . mysql_result($result, $i, 'id'). ' color:white;"><center><img src="image/yazilim.png" style="border:3px; border-color:red;" alt="some_text" width="25" height="25"></center></a></td>';
	
		echo "</tr>";	
	} 
	
echo "</tr>";
	// close table>
	echo "</table>"; 

	
	echo"</p>";
    ?>

</div>
</center></div></div><br>
 <div style="background-color:lightgray; border:4px ridge darkgray; width:auto; height:auto; radio:40;">

<font size="5"style="color:Black;">Update User	</font>     <center>

			 
	<br>

<div title="Updating the data"style="background-color:lightgray; border:-1px ridge lightgray; width:auto; height:auto; radio:40;">

	<br><br>

<body background="colourback_4.jpg">
<form method="post">
<table style="background-color:lightgray;   ">
	<tr>
		<td> </td>
		 <td style="background-color:lightgray; border:2px ridge lightgray; "><input required title="Change Phone number.?"autocomplete="off" type="numeric" style="width:auto;height:26; font-size:14; border:-2px; background-color:lightgray; color:Black; border-color:gray;" name="mobile_number" value="<?php echo $mobile_number ?>"/></td>
	
		<td></td>
		 <td style="background-color:lightgray; border:2px ridge lightgray; "><input required Title="Change Firstname.?" autocomplete="off" type="text" style="width:auto;height:26; font-size:14;color:Black;background-color:lightgray; border:-2px;"name="name" value="<?php echo $name ?>"/></td>
	
		<td></td>
		 <td style="background-color:lightgray; border:2px ridge lightgray; "><input required Title="Change Lastname.?"autocomplete="off" type="text"style="width:auto;height:26;font-size:14; color:Black;background-color:lightgray; border:-2px;" name="lname" value="<?php echo $lname ?>"/></td>
	
		<td> </td>
		 <td style="background-color:lightgray; border:2px ridge lightgray; "><input required Title="Change Position.?"autocomplete="off" type="text"style="width:auto;height:26;font-size:14; color:Black;background-color:lightgray; border:-2px;" name="position" value="<?php echo $position ?>"/></td>
	
		<td> </td>
		 <td style="background-color:lightgray; border:2px ridge lightgray; "><input required Title="Change Address.?"autocomplete="off" type="text"style="width:400px;height:26; font-size:14;color:Black; background-color:lightgray;border:-2px; " name="address" value="<?php echo $address ?>"/></td>
       
 <td style="background-color:lightgray; border:1px ridge lightgray ; "><center>&nbsp;<button  title="Save update data"type="submit" name="save">
 <img src="image/d.png" alt="some_text" width="26" height="26">

	</button ><td style="background-color:lightgray; border:1px ridge lightgray ; "><center>&nbsp;<button title="Reset all data" type="submit" name="save">
 <img src="image/f.png" alt="some_text" width="26" height="26">

	</button>
</center></td></td>
</form></td>
	</tr>
</table>
</div><script>
function myFunction() {
    alert(" Data was Updated.");
}
</script>
</body>
</html>
