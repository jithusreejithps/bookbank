<?php 
	include "bookMongerdb.php";
	if(isset($_REQUEST['txtBookNo']))
	{	
		$bno=$_REQUEST['txtBookNo'];
		$objDelete1=new cDbase();
		$qry1="delete from BookCopies where ISBN ='".$bno."'";			
		$objDelete1->idu($qry1);
		$qry1="delete from BookTxn where ISBN='".$bno."'";			
		$objDelete1->idu($qry1);
		$qry1="delete from Books where ISBN='".$bno."'";
    	$objDelete1->idu($qry1);
	}
	header('location:ViewFBookDetails.php');	
?>
