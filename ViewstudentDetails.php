<?php 
	include "bookMongerdb.php";
	include "BookBankerMenu.php";
	session_start();
	if(!isset($_SESSION['status']))
		header("location:exit.php");
?>
<form action="ViewStudentDetails.php" method="post">
<center>
<h1>STUDENT DETAILS</h1>
<br>
<table>
<tr>

	<td>	Register Number 	</td>
    <td>    :	</td>
    <td>	<input type=text name="txtRegNo" id="txtRegNo" />		</td>
	<td> 	<input type=submit name="btnView" id="btnView" value="View Details" /> 		</td>  
    <td>	<input type="submit" name="btnCancel" id="btnCancel" value="Cancel" />	</td>
</tr>
</table>
</center>
</form>
<center>
<br><br>
<table border="1">
<tr>

	<th>	Register Number	</th>
    <th>	Name	</th>
    <th>	Semester	</th>
  <!--  <th></th>-->
    

</tr>
<?php
	if(isset($_REQUEST['btnView']))
	{
		$reg=$_REQUEST['txtRegNo'];
		header("location:ViewStudent.php?txtRegNo=$reg");
	}
	else
	{
	$obj=new cDbase();			
    $res1=$obj->sel("select * from Student where SemId like '".$_SESSION['sem']."'");
	$row1=mysql_fetch_row($res1);
	while($row1)
	{
		print "<tr>";
		print "<td><a href=ViewStudent.php?txtRegNo=$row1[0]> $row1[0]</a></td>";		
		print "<td>$row1[1]</td>";
		print "<td>$row1[2]</td>";
		//print "<td></td>";//.<a href=deletestudent.php?txtRegNo=$row1[0]>Delete</a></td>";
		print "</tr>";
		$row1=mysql_fetch_row($res1);
	}
	}
?>
</table>
<br>
<br>
<?php include "footer.php"?>
