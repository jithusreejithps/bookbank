<?php 	
session_start();
 ?>
<form>
<?php
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
		header("location:ViewSemCourseDetails.php");
	}
	else
	{
		$semid=$_REQUEST['txtSem'];
		$obj=new cDbase();
		$sql="select * from SemCourse where SemId like '".$semid."'";
		$res=$obj->sel($sql);
		$row=mysql_fetch_row($res);
		if(!$row)
		{
			print "Invalid Semester Id";
			print "<br> Click <a href=ViewSemCourseDetails.php>here</a> to go back";
		}
		else
		{	
			print "<center>";
			print "<h1><label>Courses Of semester ".$row[0]."</h1></label><br>";
			print "<table>";
			
			$res1=$obj->sel("select * from SemCourse where SemId like '".$semid."'");
			while($row1=mysql_fetch_row($res1))
			{
				$res2=$obj->sel("select Name from Course where Cid like '".$row1[1]."'");
				while($row2=mysql_fetch_row($res2))
				{
					print "<tr>";
					print "<td>".$row2[0]."</td>";
					print "</tr>";
				}
			}
			
			print "<tr>";
			print "<td><br><a href=ViewSemCourseDetails.php>Back</a></td>";
			print "</tr>";
			print "</table>";	
			print "</center>";	
		}
	}
}
?>
</form>
<?php include "footer.php"?>