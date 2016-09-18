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

<form action="ViewSemCourse.php" method="post">
<center>
<h2>SEMESTER COURSE DETAILS</h2>
<table>
<tr>
	<td>	Semester Id 	</td>
    <td>    :	</td>
    <td>	<input type=text name="txtSem" id="txtSem" />		</td>
	<td> 	<input type=submit name="btnView" id="btnView" value="View Details" /> 		</td>  
    <td>	<input type=submit name="btnCancel" id="btnCancel" value="Cancel" />	</td>
</tr>
</table>
</center>
</form>
<center>
<table border="2">
<tr>
	<th>	Sem Id	</th>
	<th>	Course Name	</th>
	<th>	Batch	</th>
	<th>	Program </th>
	<th>	Department </th>
    <th></th>   
</tr>

<?php
	$obj=new cDbase();			
    $res=$obj->sel("select * from SemCourse");
	$row=mysql_fetch_row($res);
	while($row)
	{
		print "<tr>";
		print "<td>$row[0]</td>";	
		$res1=$obj->sel("select * from Course where Cid='$row[1]'");
		$row1=mysql_fetch_row($res1);	
		print "<td>$row1[1]</td>";
		$res3=$obj->sel("select BatchCode from Batch where PgmId='$row1[2]'");
		$row3=mysql_fetch_row($res3);
		print "<td>$row3[0]</td>";
		$res2=$obj->sel("select * from Program where PgmId='$row1[2]'");
		$row2=mysql_fetch_row($res2);
		print "<td>$row2[1]</td>";
		$res4=$obj->sel("select Name from Department where DeptId='$row2[2]'");
		$row4=mysql_fetch_row($res4);
		print "<td>$row4[0]</td>";
		print "<td><a href=EditSemCourse.php?cid=$row[1]>Edit</a></td>";
		print "<td><a href=DeleteSemCourse.php?cid=$row[1]>Delete</a></td>";
		print "</tr>";
		$row=mysql_fetch_row($res);
	}
}
?>
</table>
</form>
<?php include "footer.php"?>
