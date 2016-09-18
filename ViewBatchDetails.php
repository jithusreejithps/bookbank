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
<h2>BATCH DETAILS</h2>
<table border="2">
<tr>

	<th>	Batch Code	</th>
    <th>	Program	</th>
	<th>	Start Date	</th>
	<th>	End Date	</th>
    <th>	Status	</th>
    <th></th>   

</tr>

<?php
	$objView=new cDbase();			
    $res1=$objView->sel("select * from Batch");
	$row1=mysql_fetch_row($res1);
	while($row1)
	{
		print "<tr>";
		print "<td>$row1[0]</td>";	
		$res2=$objView->sel("select Name from Program where PgmId='$row1[1]'");
		$row2=mysql_fetch_row($res2);	
		print "<td>$row2[0]</td>";
		print "<td>$row1[2]</td>";
		print "<td>$row1[3]</td>";
		print "<td>$row1[4]</td>";
		print "<td><a href=EditBatch.php?txtBatchNo=$row1[0]>Edit</a></td>";
		print "<td><a href=DeleteBatch.php?txtBatchNo=$row1[0]>Delete</a></td>";
		print "</tr>";
		$row1=mysql_fetch_row($res1);
	}
}
?>
</table>
</center>
</form>
<?php include "footer.php"?>
