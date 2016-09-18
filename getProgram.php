<?php
include "bookMongerdb.php";
$q = $_GET['q']; //intval($_GET['q']);
$obj=new cDbase(); 
$sql="select * from Program where DeptId='".$q."'";
$res =$obj->sel($sql); 
echo "<option value=0>---Select Program---</option>";
while($row = mysql_fetch_array($res)) 
	{
		//echo "<option value=1>AAA</option>";
    echo "<option value=$row[0]>$row[1]</option>";
	}
?>
