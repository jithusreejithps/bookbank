<?php
include "bookMongerdb.php";
$q = $_GET['q']; //intval($_GET['q']);
$obj=new cDbase(); 
$res1=$obj->sel("select * from Semester where BatchCode='".$q."'"); 
$row1=mysql_fetch_array($res1);
$res2=$obj->sel("select * from Student where SemId='".$row1[0]."'");
echo "<option value=0>---Select Banker---</option>";
while($row2=mysql_fetch_array($res2)) 
{		
    echo "<option value=$row2[0]>$row2[1]</option>";
}
?>