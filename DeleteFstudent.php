<?php
include "bookMongerdb.php";
$regno=$_REQUEST['txtRegNo'];
$obj=new cDbase();			
$obj->idu("delete from Student where RegNo like '".$regno."'");
header("location:ViewFstudentDetails.php");
?>