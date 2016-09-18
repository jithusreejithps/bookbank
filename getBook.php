<?php
include "bookMongerdb.php";
$obj=new cDbase(); 
$sql="select * from Books";
$res =$obj->sel($sql); 
echo "<option value=0>---Select Book---</option>";
while($row = mysql_fetch_array($res)) 
{		
    echo "<option value=$row[0]>$row[1]</option>";
}
?>