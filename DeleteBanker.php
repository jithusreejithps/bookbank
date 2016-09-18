<?php 	
	
	include "bookMongerdb.php";
	$rno=$_REQUEST['txtRegNo'];
	$objDelete=new cDbase();
	$qry1="delete from BookBanker where RegNo like '".$rno."'";			
	$objDelete->idu($qry1);
	header("location:ViewBankerDetails.php");
?>




