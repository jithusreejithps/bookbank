<?php 	
	
	include "bookMongerdb.php";
	$cid=$_REQUEST['cid'];
	$objDelete=new cDbase();
	$qry1="delete from SemCourse where Cid like '".$cid."'";			
	$objDelete->idu($qry1);
	header("location:ViewSemCourseDetails.php");
?>




