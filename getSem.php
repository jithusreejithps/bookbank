<?php
include "bookMongerdb.php";
$q = $_GET['q']; //intval($_GET['q']);
$obj=new cDbase(); 
$sql="select * from Semester where BatchCode='".$q."'";
$res =$obj->sel($sql); 
echo "<option value=0>---Select Semester---</option>";
while($row = mysql_fetch_array($res)) 
	{		
    echo "<option value=$row[0]>$row[0]</option>";
	}
?>