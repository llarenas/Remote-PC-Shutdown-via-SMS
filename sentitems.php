<?php
include 'header.php';
?>
<?php
include 'conn.php';
while($row=file_exists($sql))
{
 "<div id='load_tweets'>";
}
?>
</center>
<div style='background-color:lightgray; border:2px ridge gray; width:auto; height:auto; radio:40;'>

<font size="5" color="black">Sent items</font><center>
<center>
<?php
 
 //connection
				 include 'conn.php';
	
	$per_page = 26;
	
	$result = mysql_query("SELECT * FROM outbox");
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
		echo "<a style='background-color:gray; border:0px ridge darkgray; '  href='senttime.php?page=$i'><b>$i</b></a>";
		
	}

	echo "</table>";
		echo "<table>";
		echo "<tr> <th style='background-color:gray; border:1px ridge gray; '>Receiver</th>
				<th style='background-color:gray; border:1px ridge gray; '>Massage</th>
					<th style='background-color:gray; border:1px ridge gray; '>Status</th>
				
				
	</tr>";
	
	
	for ($i = $start; $i < $end; $i++)
{
	
	if ($i == $total_results) { break; }

	echo "<tr>";
		echo '<td>' .  mysql_result($result, $i, 'receiver') . '</td>';
		echo '<td style="background-color:; border:2px ridge gray; ">' .  mysql_result($result, $i, 'msg') . '<br>-------<br>' .  mysql_result($result, $i, 'senttime') . '</td>';
		echo '<td style="background-color:; border:2px ridge gray; "><center>'. mysql_result($result, $i,'status') . '</td>';
		
		
		echo "</tr>";	
	} 
	
echo "</tr>";
	// close table>
	echo "</table>"; 
 

	
	echo"</p>";
    ?>
	</div>
</div>
</body>
