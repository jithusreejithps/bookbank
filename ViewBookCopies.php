<?php 	
	session_start();
	if(!isset($_SESSION['status']))
	{
		header("location:exit.php");
	} 
	else
	{
		
		include "bookMongerdb.php";
		include "FacultyMenu.php";
?>
<form>
<?php
	
	if(isset($_REQUEST['btnCancel']))
	{
		header("location:ViewBookCopyDetails.php");
	}
	else
	{
		$bno=$_REQUEST['txtBookNo'];
		$objBook=new cDbase();
		$sql="select * from BookCopies where ISBN like '".$bno."'";
		$res=$objBook->sel($sql);
		$row=mysql_fetch_array($res);
		if(!$row)
		{
			print "Invalid Book Number";
			print "<br> Click <a href=ViewBookCopyDetails.php>here</a> to go back";
		}
		else
		{
			print "<center>";
			print "<h1><label>Details Of ".$row[1]."</h1></label>";
			print "</center>";
			print "<table>";
			
			while($row)
			{
			print "<tr>";
			print "<td>Book Copy Number</td>";
			print "<td>:</td>";
			print "<td>".$row[0]."</td>";
			print "</tr>";
			$row=mysql_fetch_array($res);
			}

			print "<tr>";
			print "<td></td>";
			print "<td><a href=ViewBookCopyDetails.php>Back</a></td>";
			print "</tr>";
			print "</table>";		
		}
	}
}

?>
</form>
<?php include "footer.php"?>