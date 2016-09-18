<?php 
session_start();
	include "bookMongerdb.php";
	
	include "FacultyMenu.php";
	
	if(!isset($_SESSION['status']))
		header("location:exit.php");
?>
<form action="ViewFStudentDetails.php" method="post">
<center>
<h1>STUDENT DETAILS</h1>
<br>
</center>
</form>
<center>
<br>
<table border="1">
<tr>

	<th>	Register Number	</th>
    <th>	Name	</th>
    <th>	Semester	</th>
    <th></th>
    

</tr>
<?php
	$obj=new cDbase();			
    $res1=$obj->sel("select * from Student");
	$row1=mysql_fetch_row($res1);
	while($row1)
	{
		print "<tr>";
		print "<td><a href=ViewFStudent.php?txtRegNo=$row1[0]> $row1[0]</a></td>";		
		print "<td>$row1[1]</td>";
		print "<td>$row1[2]</td>";
		print "<td><a href=DeleteFStudent.php?txtRegNo=$row1[0]>Delete</a></td>";
		print "</tr>";
		$row1=mysql_fetch_row($res1);
	}
?>
</table>
<br>
<br>
<?php include "footer.php"?>
