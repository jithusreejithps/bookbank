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

<form action="ViewBanker.php" method="post">
<center>
<h2>BANKER DETAILS</h2>
<table>
<tr>
	<td>	Register Number 	</td>
    <td>    :	</td>
    <td>	<input type=text name="txtRegNo" id="txtRegNo" />		</td>
	<td> 	<input type=submit name="btnView" id="btnView" value="View Details" /> 		</td>  
    <td>	<input type=submit name="btnCancel" id="btnCancel" value="Cancel" />	</td>
</tr>
</table>
<br />
</center>
</form>
<center>
<table border="2">
<tr>
	<th>	Register Number	</th>
    <th>	Name	</th>
	 <th>	Batch	</th>
    <th></th>   
</tr>

<?php
	$objView=new cDbase();			
    $res1=$objView->sel("select * from BookBanker");
	$row1=mysql_fetch_row($res1);
	while($row1)
	{
		print "<tr>";
		print "<td><a href=ViewBanker.php?txtRegNo=$row1[0]> $row1[0]</a></td>";	
		$res2=$objView->sel("select Name from Student where RegNo='$row1[0]'");
		$row2=mysql_fetch_row($res2);	
		print "<td>$row2[0]</td>";
		$res2=$objView->sel("select SemId from Student where RegNo='$row1[0]'");
		$row2=mysql_fetch_row($res2);
		$res3=$objView->sel("select BatchCode from Semester where SemId='$row2[0]'");
		$row3=mysql_fetch_row($res3);
		print "<td>$row3[0]</td>";
		print "<td><a href=EditBanker.php?txtRegNo=$row1[0]>Edit</a></td>";
		print "<td><a href=DeleteBanker.php?txtRegNo=$row1[0]>Delete</a></td>";
		print "</tr>";
		$row1=mysql_fetch_row($res1);
	}
}
?>
</table>
</form>
<?php include "footer.php"?>
