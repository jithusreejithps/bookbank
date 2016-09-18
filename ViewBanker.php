
<form>
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
	if(isset($_REQUEST['btnCancel']))
	{
		header("location:ViewBankerDetails.php");
	}
	else
	{
		$RegNo=$_REQUEST['txtRegNo'];
		$objBanker=new cDbase();
		$sql="select * from BookBanker where RegNo like '".$RegNo."'";
		$res=$objBanker->sel($sql);
		$row=mysql_fetch_row($res);
		if(!$row)
		{
			print "Invalid Register Number";
			print "<br> Click <a href=ViewBankerDetails.php>here</a> to go back";
		}
		else
		{
			$res1=$objBanker->sel("select * from Student where RegNo='$row[0]'");
			$row1=mysql_fetch_row($res1);	
			print "<center>";
			print "<h1><label>Details Of ".$row1[1]."</h1></label>";
			print "</center>";
			print "<table>";
			
			print "<tr>";
			print "<td>Register Number</td>";
			print "<td>:</td>";
			print "<td>".$row[0]."</td>";
			print "</tr>";
			
			print "<tr>";
			print "<td>Banker Name</td>";
			print "<td>:</td>";
			print "<td>".$row1[1]."</td>";
			print "</tr>";
			
			print "<tr>";
			print "<td>Semester</td>";
			print "<td>:</td>";
			print "<td>".$row1[2]."</td>";
			print "</tr>";
			
			$res2=$objBanker->sel("select BatchCode from Semester where SemId='$row1[2]'");
			$row2=mysql_fetch_row($res2);	
			
			print "<tr>";
			print "<td>Batch Code</td>";
			print "<td>:</td>";
			print "<td>".$row2[0]."</td>";
			print "</tr>";
			
			$res3=$objBanker->sel("select PgmId from Batch where BatchCode='$row2[0]'");
			$row3=mysql_fetch_row($res3);
			$res4=$objBanker->sel("select * from Program where PgmId='$row3[0]'");
			$row4=mysql_fetch_row($res4);	
			
			print "<tr>";
			print "<td>Program Name</td>";
			print "<td>:</td>";
			print "<td>".$row4[1]."</td>";
			print "</tr>";

			$res5=$objBanker->sel("select Name from Department where DeptId='$row4[2]'");
			$row5=mysql_fetch_row($res5);
			
			print "<tr>";
			print "<td>Department Name</td>";
			print "<td>:</td>";
			print "<td>".$row5[0]."</td>";
			print "</tr>";
			
			print "<tr>";
			print "<td>From Date</td>";
			print "<td>:</td>";
			print "<td>".$row[1]."</td>";
			print "</tr>";
			
			print "<tr>";
			print "<td>To Date</td>";
			print "<td>:</td>";
			print "<td>".$row[2]."</td>";
			print "</tr>";

			print "<tr>";
			print "<td></td>";
			print "<td><a href=ViewBankerDetails.php>Back</a></td>";
			print "</tr>";
			print "</table>";		
		}
	}
}
?>
</form>
<?php include "footer.php"?>