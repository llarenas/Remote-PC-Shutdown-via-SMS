<?php 
mysql_connect("localhost", "root", "") or die(mysql_error());
mysql_select_db("sms_control") or die(mysql_error());
          $id=$_GET["id"]; 
          if($is=="add") { 
           $name=$_POST['name'];
$lname=$_POST['lname'];
$position=$_POST['position'];
$address=$_POST['address'];
$contact_number=$_POST['contact_number'];
$stado=$_POST['stado'];
$sql="Insert into contact (name, lname, position, address,mobile_number,stado) values ('$name', '$lname', '$position', '$address','+63$mobile_number','Registered')";

           $result=mysql_query($sql,$connection) or die(mysql_error()); 
            header("location: index.php"); 
            
          } elseif($mode=="update") { 
             $lname=$_POST['lname'];
$position=$_POST['position'];
$address=$_POST['address'];
$contact_number=$_POST['contact_number'];
$stado=$_POST['stado'];
$sql="update contact set name='$name', lname='$lname', position='$position', address='$address',mobile_number='$mobile_nimber',stado='$stado') values ('$name', '$lname', '$position', '$address','+63$mobile_number','Registered')";
            //echo $sql; 
            $result=mysql_query($sql,$connection) or die(mysql_error()); 
            header("location: index.php"); 
          } 
          ?> 
		  
// Javascript File Script.js 
function goDel() 
{ 
    var recslen =  document.forms[0].length; 
    var checkboxes="" 
    for(i=1;i<recslen;i++) 
    { 
        if(document.forms[0].elements[i].checked==true) 
        checkboxes+= " " + document.forms[0].elements[i].name 
    } 
    
    if(checkboxes.length>0) 
    { 
        var con=confirm("Are you sure you want to delete"); 
        if(con) 
        { 
            document.forms[0].action="delete.php?recsno="+checkboxes 
            document.forms[0].submit() 
        } 
    } 
    else 
    { 
        alert("No record is selected.") 
    } 
} 

function selectall() 
{ 
//        var formname=document.getElementById(formname); 

        var recslen = document.forms[0].length; 
        
        if(document.forms[0].topcheckbox.checked==true) 
            { 
                for(i=1;i<recslen;i++) { 
                document.forms[0].elements[i].checked=true; 
                } 
    } 
    else 
    { 
        for(i=1;i<recslen;i++) 
        document.forms[0].elements[i].checked=false; 
    } 
} 
