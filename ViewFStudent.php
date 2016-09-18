<?php 	
	session_start();
	
	include "bookMongerdb.php";
	include "BookBankerMenu.php";
	if(!isset($_SESSION['status']))
		header("location:exit.php");
 ?>
<form action="ViewFStudentDetails.php" method="post">
<?php	

	$reg=$_REQUEST['txtRegNo'];
	$objStudent=new cDbase();
	$sql="select * from Student where RegNo like '".$reg."'";
	$res=$objStudent->sel($sql);
	$row=mysql_fetch_array($res);//or die;
	if(!$row)
		{
		print "Invalid Register Number";
		print "<br> Click <a href=ViewFstudentDetails.php>here</a> to go back";
		}
	else
	{
		print "<center>";
		print "<h1><label>Details Of ".$row[1]."</h1></label>";
		
		print "<table>";
		print "<tr>";
		print "<td>Register Number</td>";
		print "<td>:</td>";
		print "<td>".$row[0]."</td>";
		print "</tr>";
		
		print "<tr>";
		print "<td>Name</td>";
		print "<td>:</td>";
		print "<td>".$row[1]."</td>";
		print "</tr>";
		
		$obj=new cDbase();
		$sql1="select * from Semester where SemId like'".$row[2]."'";
		$res1=$obj->sel($sql1);
		$row1=mysql_fetch_array($res1);
		$sql1="select * from Batch where BatchCode like '".$row1[1]."'";
		$res1=$obj->sel($sql1);
		$row2=mysql_fetch_array($res1);
		$sql1="select * from Program where PgmId like '".$row2[1]."'";
		$res1=$obj->sel($sql1);
		$row2=mysql_fetch_array($res1);
		$sql1="select * from Department where DeptId like '".$row2[2]."'";
		$res1=$obj->sel($sql1);
		$row3=mysql_fetch_array($res1);
		
		
		print "<tr>";
		print "<td>Department</td>";
		print "<td>:</td>";
		print "<td>".$row3[1]."</td>";
		print "</tr>";
		
		print "<tr>";
		print "<td>Program</td>";
		print "<td>:</td>";
		print "<td>".$row2[1]."</td>";
		print "</tr>";
		
		print "<tr>";
		print "<td>Batch</td>";
		print "<td>:</td>";
		print "<td>".$row1[1]."</td>";
		print "</tr>";
		
		print "<tr>";
		print "<td>Present Semester</td>";
		print "<td>:</td>";
		print "<td>".$row[2]."</td>";
		print "</tr>";
		
		print "<tr>";
		print "<td>Email</td>";
		print "<td>:</td>";
		print "<td>".$row[3]."</td>";
		print "</tr>";
		
		print "<tr>";
		print "<td></td>";
		print "<td></td>";
		print "<td><input type=submit name=btnCancel id=btnCancel value=Cancel></td>";
		print "</tr>";
		
		print "</table>";
		print "</center>";	
}


?>
</form>
<?php include "footer.php"?>