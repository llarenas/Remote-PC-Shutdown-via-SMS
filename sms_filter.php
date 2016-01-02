<?php
include 'header.php';
include 'conn.php';
?>






<html>
<html>

<link rel="logo_full.png" href="logo_full.png" />
</center>	
<title > System Control</title></form></table>
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;

<div style="background-color:gray; border-top-left-radius:1em; border-top-right-radius:1em; border:5px ridge Darkgray; width:auto; height:auto; radio:40;">
 &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;<font size="5" color="white">  User Information	</font><center>



 <?php
 
 //connection
                                  include 'conn.php';
								  
				//--------------------------------------
	echo "<div style='clor:Black; font-size:12; '>";
	$per_page = 6;
	
	$result = mysql_query("SELECT * FROM  faculty_info");
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
	<th style='background-color:gray;hiegth:auto;width:150px; border:2px ridge gray; color:black; '>Name</th>
	<th style='background-color:gray; hiegth:auto;width:150px; border:2px ridge gray; color:black;'>Last Name</th>
	<th style='background-color:gray; hiegth:auto;width:150px;border:2px ridge gray;color:black; '>Position</th>
	<th style='background-color:gray; hiegth:auto;width:250px;border:2px ridge gray; color:black;'>Address </th>
	<TH style='background-color:gray;width:70px; border:2px ridge gray;color:black; '> Remove </th>
	<TH style='background-color:gray; width:70px;border:2px ridge gray; color:black;'> Update </th>
	</tr>";
	
	for ($i = $start; $i < $end; $i++)
   {
	
	if ($i == $total_results) { break; }
	
	echo "<tr>";
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




</div>




</html>
</body>
</center>
 <font size="5"  color="Black"> 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


   <div style="background-color:lightgray; border:5px ridge darkgray; width:auto; height:auto; radio:40;">

</center>&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;<font style="color:Black;">Add New User	</font>     <center>
<form method="POST" action="save.php">
<table title="Register New User" style="background-color:lightgray; border:-2px ridge lightgray; width='auto' height='auto' border='5'">               
		<tr title="Register New User">	
       
	 <td style="background-color:lightgray; border:2px ridge lightgray; "><input style="background-color:lightgray; height:26px; width:auto;border:-2px ridge white; "autocomplete="off"type="text" name="name" id="name" title="Type your name " value="" placeholder="Name" required></td>
        
		  <td style="background-color:lightgray; border:2px ridge lightgray; "><input style="background-color:lightgray; height:26px; width:auto; border:-2px ridge gray; "autocomplete="off"type="text" name="lname" id="lname" title="Type your last name " value="" placeholder="Last name" required></td>
     
	<td style="background-color:lightgray; border:2px ridge lightgray; "><input type="text" style="background-color:lightgray; height:26px; width:auto; border:-2px ridge gray; "autocomplete="off" name="position" id="position" title="Type your Position " value="" placeholder="Position" required></td>
    
	<td style="background-color:lightgray; border:2px ridge lightgray; "><Textarea type="text" style="background-color:lightgray; height:26px; width:400; border:-2px ridge gray; " autocomplete="off"title="Type your address Ex.(Gargato, Hinigaran Neg Occ.)" name="address" id="address" value="" placeholder="Address" required></textarea></td>
       
	   <td style="background-color:lightgray; border:2px ridge lightgray; ">+63<input type="text" style="background-color:lightgray; height:26px; width:auto;border:-2px ridge green; "autocomplete="off" title="Type your mobile number Ex.(09#########)" placeholder="Phone Number" name="mobile_number" id="mobile_number" value="" required></td>
              <td style="background-color:lightgray; border:0px ridge lightgray; ">
			  
			  <button title="Save record" name="MN" style="background-color:lightgray; border:0px;">
					    <img src="image/d.png" style=" width:26; height:26;">
						</button>
 <button type="reset" title="Clear all" onclick="myFunction()" style="background-color:lightgray; border:0px;">
    <img src="image/f.png" style=" width:26; height:26;">
 </button>
			  </td>


		
<script>
function myFunction() {
    alert(" Data was Reset.");
}
</script>
			  
			  
			  
			  
			  
			  
			  
			  


                                                                                                                                                                                                                                          
<br>
<br>

<body style="background-color:white; with:10px left:2 border:10px ridge blue; ">

</form></table>

</body>
</html>

</div></div></div>
<div><a style="font-size:0px;"><?php include "footer.php"; ?></div>

