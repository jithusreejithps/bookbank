<?php 
	include "bookMongerdb.php";
	if(isset($_REQUEST['txtBatchNo']))
	{
		$batchNo=$_REQUEST['txtBatchNo'];
		$objDelete=new cDbase();
		$qry1="delete from Semester where BatchCode like '".$batchNo."'";			
		$objDelete->idu($qry1);
		mysql_error($qry1) or die(mysql_error);
		$qry2="delete from Batch where BatchCode like '".$batchNo."'";			
		$objDelete->idu($qry2);
		mysql_error($qry2) or die(mysql_error);
	}
	header("location:ViewBatchDetails.php");
?>

