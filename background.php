<?php
//starter.php - Served by your web server
//A very basic PHP script for starting a background process

$logFile = 'save.php';
$command = '%comspec% /c '; 
$command.= 'php'.dirname(__FILE__).'/save.php';
$command.= ' > "'.$logFile.'" 2>&1';

$WshShell = new COM("WScript.Shell");
$oExec = $WshShell->Run($command, 1, false);

?>