<?php
include 'header.php';
?></center>
<div style='background-color:lightgray; border:2px ridge gray; width:auto; height:auto; radio:40;'>

<font size="5" color="black">Unknownymous message</font><center>
<?php
 
 //connection
																		                                                                     include 'conn.php';
	
	$per_page = 26;
	
	$result = mysql_query("SELECT * FROM receiver");
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
		echo "<table style='background-color:lightgray; border:1px ridge gray ; cellpadding:26;'>";
		echo "<tr> <th style='background-color:lightgray; border:1px ridge gray ; '>Unregistered number </th>
				<th style='background-color:lightgray; border:1px ridge gray ; '>Text</th>
				<th style='background-color:lightgray; border:1px ridge gray; '>Delete</th>
	</tr>";
	
	
	for ($i = $start; $i < $end; $i++)
{
	
	if ($i == $total_results) { break; }
	
	echo "<tr>";
		echo '<td >' .  mysql_result($result, $i, 'number') . '</td>';
		echo '<td style="background-color:; border:2px ridge gray; "><center>' .  mysql_result($result, $i, 'Text') . '	</td>';	
echo '<td style="background-color:; border:1px ridge gray ; "><a href="Delete1.php?id='  . mysql_result($result, $i, 'id'). '"><center><img src="image/DeleteRed.png" style="border:3px; border-color:red;" alt="some_text" width="25" height="25"></a></td>';
	
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
