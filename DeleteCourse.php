<?php 	
	 
	include "bookMongerdb.php";
	$cid=$_REQUEST['courseid'];
	$objDelete=new cDbase();
	$qry1="delete from Course where Cid like '".$cid."'";			
	$objDelete->idu($qry1);
	header("location:ViewCourseDetails.php");
?>




