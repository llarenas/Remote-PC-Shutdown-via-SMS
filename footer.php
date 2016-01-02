
<script type="text/javascript" src="loader nisa.js">

</script>
<script type="text/javascript">
var auto_refresh = setInterval(
function ()
{
$('#load_tweets').fadeOut('fast').load('save.php').fadeIn("fast");
}, 1000);
</script>

<center>
<center>
<div title="Status of the system" id="load_tweets">
</div><?php

include 'conn.php';
while($row=file_exists($sql))
{
 "<div id='load_tweets'>";
}
?>