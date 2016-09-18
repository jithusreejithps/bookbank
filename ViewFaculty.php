<?php 	
session_start();
ob_start(); ?>

<?php
			
		if(!isset($_SESSION['status']))
		{
		header("location:exit.php");
		} 	
		else
		{
		include "bookMongerdb.php";
		include "FacultyMenu.php";
		$FacultyId='admin';
		$objFaculty=new cDbase();
		$sql="select * from Faculty where Fid like '".$FacultyId."'";
		$res=$objFaculty->sel($sql);
		$row=mysql_fetch_array($res);
		if(!$row)
		{
			print "Invalid Faculty Id";
			print "<br> Click <a href=ViewFaculty.php>here</a> to go back";
		}
		else
		{
			print "<center>";
			print "<h1><label>Details Of ".$row[1]."</h1></label>";
			print "</center>";
			print "<table>";
			
			print "<tr>";
			print "<td>Faculty Id</td>";
			print "<td>:</td>";
			print "<td>".$row[0]."</td>";
			print "</tr>";
			
			print "<tr>";
			print "<td>Faculty Name</td>";
			print "<td>:</td>";
			print "<td>".$row[1]."</td>";
			print "</tr>";
			
			$sql1="select Name from Department where DeptId like '".$row[2]."'";
			$res1=$objFaculty->sel($sql1);
			$row1=mysql_fetch_array($res1);	
			
			print "<tr>";
			print "<td>Department</td>";
			print "<td>:</td>";
			print "<td>".$row1[0]."</td>";
			print "</tr>";
			
			print "<tr>";
			print "<td>E-Mail Id</td>";
			print "<td>:</td>";
			print "<td>".$row[3]."</td>";
			print "</tr>";
			
			print "<tr>";
			print "<td>Password</td>";
			print "<td>:</td>";
			print "<td><a href=ChangeFPwd.php>Change Password</a></td>";
			print "</tr>";
			print "</table>";
		}
	}
?>

<?php include "footer.php"?>