
<?php
include 'header.php';
?></center>
<div style='background-color:lightgray; border:2px ridge gray; width:auto; height:auto; radio:40;'>

<font size="5" color="black">Log</font><center>
<?php
 
 //connection
																		                                                                     include 'conn.php';
	
	$per_page = 26;
	
	$result = mysql_query("SELECT * FROM user");
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
		echo "<a style='background-color:; border:0px ridge darkgreen; '  href='go.php?page=$i'><b>$i</b></a>";
		
	}

	
	echo "</table>";
		echo "<table style='background-color:white; border-top-left-radius:2em;  border-bottom-right-radius:1em; hiegth:auto; border:1px ridge white ; cellpadding:26;'>";
		echo "<tr> <th style='background-color:lightgray; hiegth:auto; border-top-left-radius:2em;  width:200px; border:1px ridge gray ; '>User</th>
				<th style='background-color:lightgray;hiegth:auto;width:250px; border:1px ridge gray ; '>Event</th>
				<th style='background-color:lightgray;hiegth:auto;width:150px; border:1px ridge gray; '>Senttime</th>
				<th style='background-color:lightgray; border:1px ridge gray; '>Remove</th>
	</tr>";
	
	
	for ($i = $start; $i < $end; $i++)
{
	
	if ($i == $total_results) { break; }
	
	echo "<tr>";
		echo '<td style="background-color:black; border:2px ridge blue ; color:white;">' .  mysql_result($result, $i, 'reciever') . '<br>' .  mysql_result($result, $i, 'number') . '<br></td>';
		echo '<td style="background-color:; border:2px ridge green; ">&nbsp;&nbsp;' .  mysql_result($result, $i, 'msg') . '	</td>';	
		echo '<td style="background-color:; border:2px ridge green; "><center>' .  mysql_result($result, $i, 'senttime') . '	</td>';	
        echo '<td style="background-color:darkred; border:2px ridge blue ; border-bottom-right-radius:1em;"><center><a style="
		 text-decoration:none;  color:white; position:center;"
		href="Delete2.php?id='  . mysql_result($result, $i, 'id'). '">
		Delete</a></center></td>';
	
		echo "</tr>";	
	} 

echo "</tr>";
	// close table>
		
	echo "</table>"; 
	
	// pagination
	
	echo"</p>";
    ?>
	</div>
</div>
<div><a style="font-size:0px;"><?php include "footer.php"; ?></div>