<?php 	
	
	include "bookMongerdb.php";
	$bno=$_REQUEST['txtBookNo'];
	$objDelete=new cDbase();
	$qry1="delete from BookAssignment where ISBN like '".$bno."'";			
	$objDelete->idu($qry1);
	header("location:ViewBkAssignDetails.php");
?>




