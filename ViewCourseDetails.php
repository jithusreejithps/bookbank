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

<form action="#" method="post">
<center>
<h2>COURSE DETAILS</h2>
<table border="2">
<tr>
	<th>	Course Id	</th>
    <th>	Course Name	</th>
    <th>	Program	 </th>
    <th></th>   
</tr>

<?php
	$objCourse=new cDbase();			
    $res=$objCourse->sel("select * from Course");
	$row=mysql_fetch_row($res);
	while($row)
	{
		print "<tr>";
		print "<td>$row[0]</td>";		
		print "<td>$row[1]</td>";
		$res1=$objCourse->sel("select Name from Program where PgmId='$row[2]'");
		$row1=mysql_fetch_row($res1);
		print "<td>$row1[0]</td>";
		print "<td><a href=EditCourse.php?courseid=$row[0]>Edit</a></td>";
		print "<td><a href=DeleteCourse.php?courseid=$row[0]>Delete</a></td>";
		print "</tr>";
		$row=mysql_fetch_row($res);
	}
}
?>
</table>
</form>
<?php include "footer.php"?>
