<?php 	
	include "StudMenu.php";
	session_start();
	if(!isset($_SESSION['status']))
	{
		header("location:exit.php");
	}
	else
	{
	print "<h3>Invalid Semester</h3>";
	print " <h3> Click <a href =SemBookSearch.php> here </a> to Retry";
	}
?>	
<?php include "footer.php"?>
